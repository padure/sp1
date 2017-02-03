@extends("admin.base")
@section("content")
<style>
    .name_galerie{
        border-bottom: 1px solid gray;
        width: 100%;
        float:left;
    }
    form[name=upload] img{
        cursor: pointer;
    }
    .col-sm-1{
        padding:5px;
        height: 80px;
    }
    .col-sm-1 img{
        width: 100%;
        height: 100%;
    }
    .col-sm-1 span{
        position: absolute;
        right: 5px;
        top:5px;
        color:white;
        cursor:pointer;
    }
    .col-sm-1:hover span{
        color:red;
    }
</style>
<div class="col-md-12" id="galeries">
    <button class="btn btn-primary" data-toggle="modal" data-target="#add_galerie">
        <span class="glyphicon glyphicon-plus"></span>
        Adauga galerie noua
    </button>
    @if(!empty($post) && count($post) >0)
        @foreach($post as $i)
            <h1 class="name_galerie" id="{{$i->id}}">
                <span>{{$i->name}}</span>
                <button class="btn btn-danger btn-sm pull-right" name="deletegalerie" iddel="{{$i->id}}">Sterge</button>
                <button class="btn btn-default btn-sm pull-right" name="mod" idmod="{{$i->id}}" valoare="{{$i->name}}">Modifica</button>
            </h1>
            <div class="col-md-12" id="galerie{{$i->id}}" style="width:100%; float:left;">
                <form id="upload{{$i->id}}" name="upload" enctype="multipart/form-data" class="col-sm-1">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label class="file">
                        <img src="{{asset("allimages/system/uploadplus.png")}}" class="img-responsive" style="height:75px;" title="Adauga imagini"/>
                        <input type="file" name="file[]" multiple style="display:none;"><br>
                    </label>
                </form>
                <?php $images=  App\Galerie::getImages($i->id)?>
                @foreach($images as $j)
                <div class="col-sm-1" id="photo{{$j->id}}">
                    <span class="glyphicon glyphicon-remove" name="delete" iddel="{{$j->id}}"></span>
                    <img class='img-responsive' src="{{asset($j->address)}}"/>
                </div>
                @endforeach
            </div>
        @endforeach
    @endif
</div>
<div class="modal fade" id="add_galerie" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Adauga Galerie!</h4>
        </div>
        <div class="modal-body text-center">
            <input type="text" class="form-control" name="input_add_galerie" placeholder="Nume galerie"/><br>
            <button class="btn btn-primary" name="save_add_galerie" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Se salveaza">
                Salveaza
            </button>
            <button class="btn btn-default" data-dismiss="modal">Anuleaza</button>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="comfirm_delete_photo" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Sterge fotografie</h4>
        </div>
        <div class="modal-body text-center">
            <h2 class="calibri" style="margin: 0px 0px 15px 0px;">Sigur doriti sa stergeti acesta fotografie?</h2>
            <button class="btn btn-default" id="yesdelete">Da</button>
            <button class="btn btn-primary" data-dismiss="modal">Nu</button>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="mod_nume" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Modifica Grupa!</h4>
        </div>
        <div class="modal-body text-center">
            <input type="text" class="form-control" name="input_mod_galerie" placeholder="Grupa"/><br>
            <button class="btn btn-primary" name="save_mod_galerie" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Se salveaza">Modifica</button>
            <button class="btn btn-default" data-dismiss="modal">Anuleaza</button>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="comfirm_delete_galerie" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center"><span style="color:red; font-size:22px;">Atentie!</span></h4>
        </div>
        <div class="modal-body text-center">
            <h2 class="calibri" style="margin: 0px 0px 15px 0px; font-size:18px;">Aceasta galerie se va sterge cu tot cu imagini</h2>
            <h2 class="calibri" style="margin: 0px 0px 15px 0px;">Sigur doriti sa stergeti acesta galerie?</h2>
            <button class="btn btn-danger" id="yesdeletegalerie" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Se sterge">Sterge</button>
            <button class="btn btn-primary" data-dismiss="modal">Nu</button>
        </div>
      </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("body").on("click","button[name=deletegalerie]",function(){
            var id=$(this).attr("iddel");
            $("#yesdeletegalerie").attr("iddel",id);
            $("#comfirm_delete_galerie").modal();
        });
        $("#yesdeletegalerie").on("click",function(){
            var id=$("#yesdeletegalerie").attr("iddel");
            $.ajax({  
                type: 'POST',  
                url: "{{URL('/admin/delgalerie')}}", 
                data: 
                    { 
                        id:id
                    },
                success: function(data){
                    $("#galerie"+id).remove();
                    $("#"+id).remove();
                    $("#comfirm_delete_galerie").modal("hide");
                }
            });
        });
        $("body").on("click","button[name=mod]",function(){
            var id=$(this).attr("idmod");
            var valoare=$(this).attr("valoare");
            $("input[name=input_mod_galerie]").val(valoare);
            $("input[name=input_mod_galerie]").attr("idmod",id);
            $("#mod_nume").modal();
        });
        $("button[name=save_mod_galerie]").on("click",function(){
            var nume=$("input[name=input_mod_galerie]").val();
            var id=$("input[name=input_mod_galerie]").attr("idmod");
            $("input[name=input_mod_galerie]").css("border-color","#ccc");
            if(nume.length>=1 && nume.length<100){
                $("button[name=save_mod_galerie]").button("loading");
                $.ajax({  
                    type: 'POST',  
                    url: "{{URL('/admin/modgalerie')}}", 
                    data: 
                        { 
                            nume:nume,
                            id:id
                        },
                    success: function(data) {
                        $("input[name=input_mod_galerie]").val("");
                        $("button[name=save_mod_galerie]").button("reset");
                        $("button[idmod="+id+"]").attr("valoare",nume);
                        $("#"+id+" span").text(nume);
                        $("#mod_nume").modal("hide");
                    }
                });
            }else{
                $("input[name=input_mod_galerie]").css("border-color","red");
            }
        });
        $("body").on("click","span[name=delete]",function(){
            var id=$(this).attr("iddel");
            $("#yesdelete").attr("iddel",id);
            $("#comfirm_delete_photo").modal();
        });
        $("#yesdelete").on("click",function(){
            var id=$("#yesdelete").attr("iddel");
            $.ajax({  
                type: 'POST',  
                url: "{{URL('/admin/deleteimagegalerie')}}", 
                data: 
                    { 
                        id:id
                    },
                success: function(data) {
                    $("#photo"+data).remove();
                }
            });
            $("#comfirm_delete_photo").modal("hide");
        });
        function afiseaza(data,galerie_id){
            for(var i=0;i<data.length;i++){
                if(data[i].succes===true){
                    $("#galerie"+galerie_id).append("<div class='col-sm-1' id='photo"+data[i].id+"'>\n\
                                                        <span class='glyphicon glyphicon-remove' name='delete' iddel='"+data[i].id+"'></span>\n\
                                                        <img class='img-responsive' src='"+data[i].image+"'/>\n\
                                                    </div>");
                }
            }
        }
        $('body').on('submit','form[name=upload]',function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append("id_galerie",$(this).attr("id").replace("upload",""));
            var galerie_id=$(this).attr("id").replace("upload","");
            var a=$(this).find("img");
            a.attr("src","{{asset('allimages/system/loader.gif')}}");
            $.ajax({
                type:'POST',
                url: "{{URL('/admin/uploadgalerie')}}",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    a.attr("src","{{asset('allimages/system/uploadplus.png')}}");
                    afiseaza(data,galerie_id);
                },
                error:function(){
                    a.attr("src","{{asset('allimages/system/uploadplus.png')}}");
                }
            });
        });
        $("body").on("change","form[name=upload]",function() {
            $(this).submit();
        });
        $("button[name=save_add_galerie]").on("click",function(){
            var nume=$("input[name=input_add_galerie]").val();
            $("input[name=input_add_galerie]").css("border-color","#ccc");
            var asset='{{asset("/")}}';
            if(nume.length>=1 && nume.length<100){
                $("button[name=save_add_galerie]").button("loading");
                $.ajax({  
                    type: 'POST',  
                    url: "{{URL('/admin/addgalerie')}}", 
                    data: 
                        { 
                            nume:nume
                        },
                    success: function(data) {
                        $("#add_galerie").modal("hide");
                        $("input[name=input_add_galerie]").val("");
                        $("button[name=save_add_galerie]").button("reset");
                        $("#galeries").append("<h1 class='name_galerie' id='"+data.id+"'>\n\
                                                    <span>"+data.name+"</span>\n\
                                                    <button class='btn btn-danger btn-sm pull-right' name='deletegalerie' iddel='"+data.id+"'>Sterge</button>\n\
                                                    <button class='btn btn-default btn-sm pull-right' name='mod' idmod='"+data.id+"' valoare='"+data.name+"'>Modifica</button>\n\
                                                </h1>\n\
                                                <div class='col-md-12' id='galerie"+data.id+"' style='width:100%; float:left;'>\n\
                                                    <form id='upload"+data.id+"' name='upload' enctype='multipart/form-data' class='col-sm-1'>\n\
                                                        <input type='hidden' name='_token' value='{{ csrf_token() }}'>\n\
                                                        <label class='file'>\n\
                                                            <img src='"+asset+"allimages/system/uploadplus.png' class='img-responsive' style='height:75px;' title='Adauga imagini'/>\n\
                                                            <input type='file' name='file[]' multiple style='display:none;'><br>\n\
                                                        </label>\n\
                                                    </form>\n\
                                                </div>");
                    }
                });
            }else{
                $("input[name=input_add_galerie]").css("border-color","red");
            }
        });
    });
</script>
@endsection