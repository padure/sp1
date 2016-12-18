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
</style>
    <div class="content">
        <div class="col-md-10 eventcreator" id="eventcreator">
            <div class="form-group" id="title">
                <input type="text" name="title" class="form-control" placeholder="Scrie un titlu">
            </div>
            <div class="col-md-4" style="padding-left: 0px !important;">
                <img src="{{asset("images/studenti2.jpg")}}" class="img-responsive"/>
            </div>
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
                if(permit===true){
                    $("#saveEvent").button("loading");
                    $.ajax({  
                        type: 'POST',  
                        url: '{{ URL("/admin/saveevent") }}', 
                        data: 
                            { 
                                title:title,
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