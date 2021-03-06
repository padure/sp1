@extends("admin.base")
@section("content")
<style>
    #paragrafs{
        padding:0px !important;
    }
    textarea{
        resize: vertical; 
    }
    .img-upload img{
        cursor:pointer;
        width:100%;
        border:1px solid #ccc;
    }
    .img-upload label{
        width:100%;
    }
    .text-red{
        color:red;
    }
    .set ul{
        list-style-type: none;
        padding:0px;
    }
    .set ul li{
        padding-left:5px;
    }
    .set ul li:hover{
        background-color: #ccc;
    }
    .set{
        position: absolute;
        background-color: white;
        right: 20px;
        top: 5px;
        cursor:pointer;
    }
    .set span{
        padding: 5px;
    }
    .delete{
        float:right;
        cursor:pointer;
    }
    .wid100{
        width: 100%;
        float: left;
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
                <div class='dropdown set'>
                    <span class='dropdown-toggle glyphicon glyphicon-pencil' data-toggle='dropdown'></span>
                    <div class='dropdown-menu'>
                        <ul>
                            <li onclick='uploadimage()'>Incarca imagine</li>
                        </ul>
                    </div>
                </div>
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
            <button class="btn btn-block btn-default" onclick="addoneimage()">3.Adauga o imagine</button>
            <button class="btn btn-block btn-default" onclick="addtwoimage()">4.Adauga 2 imagini</button>
            <button class="btn btn-block btn-default" onclick="addtreimage()">5.Adauga 3 imagini</button>
            <button class="btn btn-block btn-primary" onclick="imagetext()">6.Imagine si Paragraf</button>
            <button class="btn btn-block btn-primary" onclick="textimage()">7.Paragraf si Imagine</button>
        </div>
    </div>
    <div class="col-md-12 text-center" style="margin-top:15px;float: left;">
        <button class="btn btn-primary" id="saveEvent" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Se salveaza">
            <span class="glyphicon glyphicon-floppy-saved"></span>
            Salveaza
        </button>
        <a href="{{URL('/admin/events')}}" class="btn btn-default">Inapoi</a>
    </div>
    <script>
        formid=0;
        paragrafid=0;
        $(document).ready(function() {
            /*Upload image width:100%*/
            $("body").on("submit","form[name=upload100]",(function(e) {
                e.preventDefault();
                var id=$(this).attr("id");
                var lastimage=$("#"+id+"image").attr("src");
                lastimage=lastimage.replace("{{asset('/')}}","");
                if(lastimage==="allimages/system/upload.png" || lastimage==="allimages/system/loader.gif"){
                    lastimage=null;
                }
                $("#"+id+"image").attr("src",'{{asset("/allimages/system/loader.gif")}}');
                var formData = new FormData(this);
                formData.append("image",lastimage);
                $("#"+id+"eror").html("");
                $.ajax({
                    type:'POST',
                    url: "{{URL('/admin/othersupload')}}",
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        if(data.succes===true){
                            $("#"+id+"image").attr("src",'{{asset("/")}}'+data.image);
                            $("#"+id+"input").attr("value",data.image);
                        }else{
                            $("#"+id+"image").attr("src",'{{asset("/allimages/system/upload.png")}}');
                            $("#"+id+"input").attr("value","");
                        }
                    },
                    error:function(){
                        $("#"+id+"image").attr("src",'{{asset("/allimages/system/upload.png")}}');
                        $("#"+id+"input").attr("value","");
                    }
                });
            }));
            $("body").on("change","form[name=upload100]", function() {
                $(this).submit();
                $("input[name=file]").val("");
            });
            /*Upload default imagine*/
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
                    },
                    error:function(){
                        $("#imageeror").html("A aparut o eroare la incarcare");
                        if(image.length>=2){
                            $("#defaultimagepreview").attr("src",'{{asset("/")}}'+image);
                        }else{
                            $("#defaultimagepreview").attr("src",'{{asset("/allimages/system/upload.png")}}');
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
                var save=[];
                var mode=[];
                var isimage=[];
                $('input, textarea').each(
                    function(index){  
                        var input = $(this);
                        if(input.attr('name')!=="_token" && input.attr('type')!=="file" && input.attr('name')!=="title"){
                            input.css("border-color","#ccc");
                            if(input.attr("mode")==='3' || input.attr("mode")==='4' || input.attr("mode")==='5' || input.attr("mode")==='6' || input.attr("mode")==='7'){
                                    var idcolor=(input.attr("id")).replace("input","");
                                    $("#"+idcolor+"image").css("border-color","#ccc");
                                }
                            if(input.val().length>1){
                                save[index]=input.val().replace("{{asset('/')}}","");
                                mode[index]=input.attr("mode");
                                if(input.attr("isimage")){
                                    isimage[index]=input.attr("isimage");
                                }else{
                                    isimage[index]="";
                                }
                            }else{
                                input.css("border-color","red");
                                input.focus();
                                permit=false;
                                if(input.attr("mode")==='3' || input.attr("mode")==='4' || input.attr("mode")==='5' || input.attr("mode")==='6' || input.attr("mode")==='7'){
                                    var idcolor=(input.attr("id")).replace("input","");
                                    $("#"+idcolor+"image").css("border-color","red");
                                }
                            }
                        }
                    }
                );
                var title=$("input[name=title]").val();
                if(title.length<=1){
                    $("#title").removeClass("has-success").addClass("has-error");
                    $("input[name=title]").focus();
                    permit=false;
                }else{
                    $("#title").removeClass("has-error").addClass("has-success");
                }
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
                                save:save,
                                mode:mode,
                                isimage:isimage
                            },
                        success: function(data) {
                            $("#saveEvent").button("reset");
                            window.location.href="{{URL('/admin/events')}}";
                        }
                    });
                }
            });
        });
        function sterge(id){
            $("#par"+id).remove();
            $("#but"+id).remove();
        }
        function uploadimage(){
            $("#defaultimagepreview").click();
        }
        function stergeimage(id){
            $("#imgbut"+id).remove();
            $("#form"+id).remove();
        }
        function textimage(){
            formid++;
            paragrafid++;
            $("#paragrafcontent").append("<p class='wid100' id='imgbut"+formid+"'><a class='delete' onclick='stergeimage("+formid+"); sterge("+paragrafid+");'>Sterge</a></p>");
            $("#paragrafcontent").append("<div class='col-md-12'>\n\
                                            <div class='col-md-6'>\n\
                                                <textarea class='form-control' name='paragraf' mode='7' id='par"+paragrafid+"' style='height:200px;'></textarea>\n\
                                            </div>\n\
                <form name='upload100' id='form"+formid+"' enctype='multipart/form-data' class='col-md-6 img-upload'>\n\
                    <input type='hidden' name='_token' value='{{ csrf_token() }}'>\n\
                    <label class='file'>\n\
                        <img src='{{asset('allimages/system/upload.png')}}' class='img-responsive' id='form"+formid+"image'/>\n\
                        <input type='file' name='file' style='display:none;'>\n\
                        <input type='text' mode='7' isimage='1' value='' id='form"+formid+"input' style='display:none;'>\n\
                    </label>\n\
                    <p id='form"+formid+"eror' class='text-red'></p>\n\
                </form>\n\
                </div>");
        }
        function imagetext(){
            formid++;
            paragrafid++;
            $("#paragrafcontent").append("<p class='wid100' id='imgbut"+formid+"'><a class='delete' onclick='stergeimage("+formid+"); sterge("+paragrafid+");'>Sterge</a></p>");
            $("#paragrafcontent").append("<div class='col-md-12'>\n\
                    <form name='upload100' id='form"+formid+"' enctype='multipart/form-data' class='col-md-6 img-upload'>\n\
                    <input type='hidden' name='_token' value='{{ csrf_token() }}'>\n\
                    <label class='file'>\n\
                        <img src='{{asset('allimages/system/upload.png')}}' class='img-responsive' id='form"+formid+"image'/>\n\
                        <input type='file' name='file' style='display:none;'>\n\
                        <input type='text' mode='6' value='' isimage='1' id='form"+formid+"input' style='display:none;'>\n\
                    </label>\n\
                    <p id='form"+formid+"eror' class='text-red'></p>\n\
                </form>\n\
                <div class='col-md-6'>\n\
                    <textarea class='form-control' name='paragraf' mode='6' id='par"+paragrafid+"' style='height:200px;'></textarea>\n\
                </div></div>");
        }
        function addtreimage(){
            $("#paragrafcontent").append("<p class='wid100' id='imgbut"+(formid+1)+"'><a class='delete' onclick='stergeimage("+(formid+1)+"); stergeimage("+(formid+2)+"); stergeimage("+(formid+3)+");'>Sterge</a></p>");
            for(var i=0;i<=2;i++){
                formid++;
                $("#paragrafcontent").append("<form name='upload100' id='form"+formid+"' enctype='multipart/form-data' class='col-md-4 img-upload'>\n\
                    <input type='hidden' name='_token' value='{{ csrf_token() }}'>\n\
                    <label class='file'>\n\
                        <img src='{{asset('allimages/system/upload.png')}}' class='img-responsive' id='form"+formid+"image'/>\n\
                        <input type='file' name='file' style='display:none;'>\n\
                        <input type='text' mode='5' value='' isimage='1' id='form"+formid+"input' style='display:none;'>\n\
                    </label>\n\
                    <p id='form"+formid+"eror' class='text-red'></p>\n\
                </form>");
            }
        }
        function addtwoimage(){
            $("#paragrafcontent").append("<p class='wid100' id='imgbut"+(formid+1)+"'><a class='delete' onclick='stergeimage("+(formid+1)+"); stergeimage("+(formid+2)+");'>Sterge</a></p>");
            for(var i=0;i<=1;i++){
                formid++;
                $("#paragrafcontent").append("<form name='upload100' id='form"+formid+"' enctype='multipart/form-data' class='col-md-6 img-upload'>\n\
                    <input type='hidden' name='_token' value='{{ csrf_token() }}'>\n\
                    <label class='file'>\n\
                        <img src='{{asset('allimages/system/upload.png')}}' class='img-responsive' id='form"+formid+"image'/>\n\
                        <input type='file' name='file' style='display:none;'>\n\
                        <input type='text' mode='4' value='' isimage='1' id='form"+formid+"input' style='display:none;'>\n\
                    </label>\n\
                    <p id='form"+formid+"eror' class='text-red'></p>\n\
                </form>");
            }
        }
        function addoneimage(){
            formid++;
            $("#paragrafcontent").append("<p class='wid100' id='imgbut"+formid+"'><a class='delete' onclick='stergeimage("+formid+")'>Sterge</a></p>");
            $("#paragrafcontent").append("<form name='upload100' id='form"+formid+"' enctype='multipart/form-data' class='col-md-12 img-upload'>\n\
                <input type='hidden' name='_token' value='{{ csrf_token() }}'>\n\
                <label class='file'>\n\
                    <img src='{{asset('allimages/system/upload.png')}}' class='img-responsive' id='form"+formid+"image'/>\n\
                    <input type='file' name='file' style='display:none;'>\n\
                    <input type='text' mode='3' value='' isimage='1' id='form"+formid+"input' style='display:none;'>\n\
                </label>\n\
                <p id='form"+formid+"eror' class='text-red'></p>\n\
            </form>");
        }
        function addcontinut(){
           paragrafid++;
           $("#paragrafs").append("<a class='delete' id='but"+paragrafid+"' onclick='sterge("+paragrafid+")'>Sterge</a><textarea class='form-control' name='content' mode='1' id='par"+paragrafid+"'></textarea>"); 
        }
        function addparagraf(){
           paragrafid++;
           $("#paragrafcontent").append("<a class='delete' id='but"+paragrafid+"' onclick='sterge("+paragrafid+")'>Sterge</a><textarea class='form-control' name='paragraf' mode='2' id='par"+paragrafid+"'></textarea>"); 
        }
        
    </script>
@endsection