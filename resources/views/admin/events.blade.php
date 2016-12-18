@extends("admin.base")
@section("content")
<style>
    #paragrafs{
        padding:0px !important;
    }
    textarea{
        resize: vertical; 
        margin-top:15px;
    }
    .img-upload{
        padding: 0px !important; 
    }
    #defaultimagepreview{
        border:1px solid #ccc;
    }
    .img-upload:hover{
        opacity: 0.8;
    }
    .img-upload img{
        cursor:pointer;
    }
    .text-red{
        color:red;
    }
</style>
    <div class="content">
        <div class="col-md-10 eventcreator" id="eventcreator">
            <div class="form-group" id="title">
                <input type="text" name="title" class="form-control" placeholder="Scrie un titlu">
            </div>
            <!--Upload imagine principala -->
            <form id="upload" enctype="multipart/form-data" class="col-md-4 img-upload">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label class="file">
                    <img src="{{asset("allimages/system/upload.png")}}" class="img-responsive" id="defaultimagepreview"/>
                    <input type="file" name="file" style="display:none;"><br>
                </label>
                <p id="imageeror" class="text-red"></p>
            </form>
             <!--End Upload -->
            <div class="col-md-8" id="paragrafs" >
                
            </div>
            <div class="col-md-12" id="paragrafcontent">
                
            </div>
        </div>
        <div class="col-md-2">
            <button class="btn btn-block btn-primary" onclick="addcontinut()">1.Adauga Continut</button>
            <button class="btn btn-block btn-primary" onclick="addparagraf()">2.Adauga Paragraf</button>
            <button class="btn btn-block btn-default">3.Adauga o imagine</button>
            <button class="btn btn-block btn-default">4.Adauga 2 imagini</button>
            <button class="btn btn-block btn-default">5.Adauga 3 imagini</button>
            <button class="btn btn-block btn-primary">6.Imagine si Paragraf</button>
            <button class="btn btn-block btn-primary">7.Paragraf si Imagine</button>
        </div>
    </div>
    <div class="col-md-12" style="margin-top:15px;">
        <button class="btn btn-primary" id="saveEvent" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Se salveaza">
            Salveaza
        </button>
    </div>
    <script>
        $(document).ready(function() {
            /*Upload imagine*/
            image="";
            $('#upload').on('submit',(function(e) {
                e.preventDefault();
                $("#defaultimagepreview").attr("src",'{{asset("/allimages/system/loader.gif")}}');
                var formData = new FormData(this);
                formData.append("image",image);
                $("#imageeror").html("");
                $.ajax({
                    type:'POST',
                    url: "{{URL('/admin/defaultupload')}}",
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        if(data.succes===true){
                            image=data.image;
                            $("#defaultimagepreview").attr("src",'{{asset("/")}}'+data.image);
                        }else{
                            $("#imageeror").html("A aparut o eroare la incarcare");
                            if(image.length>=2){
                                $("#defaultimagepreview").attr("src",'{{asset("/")}}'+image);
                            }else{
                                $("#defaultimagepreview").attr("src",'{{asset("/allimages/system/upload.png")}}');
                            }
                        }
                    }
                });
            }));
            $("#upload").on("change", function() {
                $("#upload").submit();
                $("input[name=file]").val("");
            });
/*End upload imagine*/
            $("#saveEvent").on("click",function(){
                var permit=true;
                var title=$("input[name=title]").val();
                if(title.length<=1){
                    $("#title").removeClass("has-success").addClass("has-error");
                    $("input[name=title]").focus();
                    permit=false;
                }else{
                    $("#title").removeClass("has-error").addClass("has-success");
                }
                var content=[];
                $("textarea[name=content]").each(function(){
                    var length=($(this).val()).length;
                    if(length>=1){
                        content.push($(this).val());
                    }else{
                        $(this).remove();
                    }
                });
                var paragraf=[];
                $("textarea[name=paragraf]").each(function(){
                    var length=($(this).val()).length;
                    if(length>=1){
                        paragraf.push($(this).val());
                    }else{
                        $(this).remove();
                    }
                });
                if(image.length<1){
                    permit=false;
                    $("#defaultimagepreview").css("border-color","red");
                }else{
                    $("#defaultimagepreview").css("border-color","#ccc");
                }
                if(permit===true){
                    $("#saveEvent").button("loading");
                    $.ajax({  
                        type: 'POST',  
                        url: '{{ URL("/admin/saveevent") }}', 
                        data: 
                            { 
                                title:title,
                                image:image,
                                content:content,
                                paragraf:paragraf
                            },
                        success: function(data) {
                            $("#saveEvent").button("reset");
                        }
                    });
                }
            });
        });
        function addcontinut(){
           $("#paragrafs").append("<textarea class='form-control' name='content'></textarea>"); 
        }
        function addparagraf(){
           $("#paragrafcontent").append("<textarea class='form-control' name='paragraf'></textarea>"); 
        }
        
    </script>
@endsection