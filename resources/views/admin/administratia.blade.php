@extends("admin.base")
@section("content")
<style>
    #imageprof{
        cursor:pointer;
    }
</style>
    <div class="content">
        <div class="col-md-10">
            <div class="col-md-4">
                <span class="text-danger">Recomandat ca imaginea sa fie patrata</span>
                <form id="upload" enctype="multipart/form-data" class="img-upload">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label class="file">
                        <img class="img-responsive" id="imageprof" src="{{asset("allimages/system/upload.png")}}"/>
                        <input type="file" name="file"><br>
                    </label>
                    <b><p id="imageeror" class="text-danger"></p></b>
                </form>
            </div>
            <div class="col-md-8">
                <form class="form-horizontal" id="formadd">
                    <div class="form-group">
                        <input type="text" name="aname" class="form-control text-center" placeholder="Nume Prenume"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Functia:</label>
                        <div class="col-sm-9">
                            <input type="text" name="functia" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Anul nasterii:</label>
                        <div class="col-sm-9">
                            <input type="date" name="data" max="2700-12-31" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Experienta:</label>
                        <div class="col-sm-9">
                            <input type="number" name="experienta" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Grad:</label>
                        <div class="col-sm-9">
                            <input type="text" name="grad" class="form-control">
                        </div>
                    </div>
                    <a class="btn btn-primary" name="saveadministratia" id="saveormodadministrator" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Se salveaza">Salveaza</a>
                    <button class="btn btn-default pull-right" id="anuleazaadd" type="reset" onclick="location.reload();">Anuleaza</button>
                </form>
            </div>
        </div>
        <div class="col-md-12">
            <br>
            <table class="table table-striped">
                <tr>
                    <th style="width: 70px;">Poza:</th>
                    <th>Nume Prenume:</th>
                    <th>Functia:</th>
                    <th>Anul nasterii:</th>
                    <th>Experienta:</th>
                    <th>Grad:</th>
                    <th>Setari:</th>
                </tr>
                @if(!empty($post) && count($post)>0)
                    @foreach($post as $i)
                        <tr>
                            <td>
                                <img class="img-responsive" src="{{asset($i->photo)}}"/>
                            </td>
                            <td>{{$i->anume}}</td>
                            <td>{{$i->functia}}</td>
                            <td>{{date('d/m/Y', strtotime($i->anulnasterii))}}</td>
                            <td>{{$i->experienta}} ani</td>
                            <td>{{$i->grad}}</td>
                            <td>
                                <button class='btn btn-primary btn-xs' 
                                        name="modadministratia"
                                        id="{{$i->id}}"
                                        nume="{{$i->anume}}" 
                                        functia="{{$i->functia}}" 
                                        data="{{$i->anulnasterii}}"
                                        experienta="{{$i->experienta}}"
                                        grad="{{$i->grad}}"
                                        photo="{{$i->photo}}"
                                        >
                                    Modifica
                                </button>
                                <button class='btn btn-danger btn-xs' name="deleteadministratia" idadministratia="{{$i->id}}">Sterge</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
    <div class="modal fade" id="comfirm_delete_administratia" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center">Sterge administatia</h4>
            </div>
            <div class="modal-body text-center">
                <h2 class="calibri" style="margin: 0px 0px 15px 0px;">Sigur doriti sa stergeti acest profesor?</h2>
                <button class="btn btn-default" id="yesdeleteadministratia">Da</button>
                <button class="btn btn-primary" data-dismiss="modal">Nu</button>
            </div>
          </div>
        </div>
    </div>
<script>
    $(document).ready(function() {
        image="";
        $("button[name=modadministratia]").on("click",function(){
            var id=$(this).attr("id");
            var nume=$(this).attr("nume");
            var functia=$(this).attr("functia");
            var data=$(this).attr("data");
            var experienta=$(this).attr("experienta");
            var grad=$(this).attr("grad");
            var photo=$(this).attr("photo");
            image=$(this).attr("photo");
            $("#imageprof").attr("src","{{asset('/')}}"+photo);
            $("input[name=aname]").focus();
            $("input[name=aname]").val(nume);
            $("input[name=functia]").val(functia);
            $("input[name=data]").val(data);
            $("input[name=experienta]").val(experienta);
            $("input[name=grad]").val(grad);
            $("#saveormodadministrator").attr("name","modadministratia");
            $("#saveormodadministrator").attr("idadministrator",id);
            
        });
        $("button[name=deleteadministratia]").on("click",function(){
            var id=$(this).attr("idadministratia");
            $("#yesdeleteadministratia").attr("idadministratia",id);
            $("#comfirm_delete_administratia").modal();
        });
        $("#yesdeleteadministratia").on("click",function(){
            var id=$("#yesdeleteadministratia").attr("idadministratia");
            $.ajax({  
                    type: 'POST',  
                    url: "{{URL('/admin/deladministratia')}}", 
                    data: 
                        { 
                            id:id
                        },
                    success: function() {
                        location.reload();
                    }
                });
        });
        $("#saveormodadministrator").on("click",function(){
            var nume=$("input[name=aname]").val();
            var functia=$("input[name=functia]").val();
            var data=$("input[name=data]").val();
            var experienta=$("input[name=experienta]").val();
            var grad=$("input[name=grad]").val();
            var permit=true;
            if(image.length===0){
                $("#imageprof").css("border","1px solid red");
                permit=false;
            }else{
                $("#imageprof").css("border","0px solid red");
            }
            if(grad.length===0 || grad.length>50){
                $("input[name=grad]").css("border-color","red");
                $("input[name=grad]").focus();
                permit=false;
            }else{
                $("input[name=grad]").css("border-color","#ccc");
            }
            if(experienta<0 || experienta>999 || experienta.length===0){
                $("input[name=experienta]").css("border-color","red");
                $("input[name=experienta]").focus();
                permit=false;
            }else{
                $("input[name=experienta]").css("border-color","#ccc");
            }
            if(data.length===0 || data.length>50){
                $("input[name=data]").css("border-color","red");
                $("input[name=data]").focus();
                permit=false;
            }else{
                $("input[name=data]").css("border-color","#ccc");
            }
            if(functia.length===0 || functia.length>50){
                $("input[name=functia]").css("border-color","red");
                $("input[name=functia]").focus();
                permit=false;
            }else{
                $("input[name=functia]").css("border-color","#ccc");
            }
            if(nume.length===0 || nume.length>50){
                $("input[name=aname]").css("border-color","red");
                $("input[name=aname]").focus();
                permit=false;
            }else{
                $("input[name=aname]").css("border-color","#ccc");
            }
            if(permit===true){
                $("#saveormodadministrator").button("loading");
                if($("#saveormodadministrator").attr("name")==="saveadministratia")
                {
                    $.ajax({  
                        type: 'POST',  
                        url: "{{URL('/admin/addadministratia')}}", 
                        data: 
                            { 
                                nume:nume,
                                functia:functia,
                                data:data,
                                experienta:Math.floor(experienta),
                                grad:grad,
                                image:image
                            },
                        success: function(data) {
                            if(data===true){
                                $("#anuleazaadd").click();
                                $("#imageprof").attr("src","{{asset('allimages/system/upload.png')}}");
                                image="";
                            }
                            location.reload();
                        }
                    });
                }else{
                    $.ajax({  
                        type: 'POST',  
                        url: "{{URL('/admin/modadministratia')}}", 
                        data: 
                            { 
                                id:$("#saveormodadministrator").attr("idadministrator"),
                                nume:nume,
                                functia:functia,
                                data:data,
                                experienta:Math.floor(experienta),
                                grad:grad,
                                image:image
                            },
                        success: function(data) {
                            if(data===true){
                                $("#anuleazaadd").click();
                                $("#imageprof").attr("src","{{asset('allimages/system/upload.png')}}");
                                image="";
                            }
                            location.reload();
                        }
                    });
                }
            }
        });
        
        $('#upload').on('submit',(function(e) {
            e.preventDefault();
            $("#imageprof").attr("src",'{{asset("/allimages/system/loader.gif")}}');
            var formData = new FormData(this);
            formData.append("image",image);
            $("#imageeror").html("");
            $.ajax({
                type:'POST',
                url: "{{URL('/admin/uploadadministratia')}}",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data.succes===true){
                        image=data.image;
                        $("#imageprof").attr("src",'{{asset("/")}}'+data.image);
                    }else{
                        if(image.length>0){
                            $("#imageprof").attr("src",'{{asset("/")}}'+image);
                        }else{
                            $("#imageprof").attr("src","{{asset('allimages/system/upload.png')}}");
                        }
                        $("#imageeror").html("A aparut o eroare la incarcare");
                        
                    }
                }
            });
        }));
        $("#upload").on("change", function() {
            $("#upload").submit();
        });
    });
</script>
@endsection