@extends("admin.base")
@section("content")
    <p class="text-right">
        <button class="btn btn-primary" data-toggle="modal" data-target="#add_parteneriat" id="addpart">
            <span class="glyphicon glyphicon-plus"></span>
            Adauga parteneriat
        </button>
    </p>
    @if(!empty($post) && count($post)>0)
        <table class="table table-bordered">
            <tr>
                <th style="width: 150px;">Logo parteneriat</th>
                <th>Adresa parteneriat</th>
                <th style="width: 250px;">Setari</th>
            </tr>
            @foreach($post as $i)
                <tr>
                    <td>
                        <img src="{{asset($i->image)}}" class="img-responsive"/>
                    </td>
                    <td>
                        <a href="{{$i->link}}" target="_blank">{{$i->link}}</a>
                    </td>
                    <td>
                        <a class="btn btn-info" link="{{$i->link}}" logo="{{$i->image}}" name="modparteneriat" idmod="{{$i->id}}"> 
                            <span class="glyphicon glyphicon-cog"></span>
                            Modifica
                        </a>  
                        <a class="deleteevent btn btn-danger" name="deleteparteneriat" id="{{$i->id}}"> 
                            <span class="glyphicon glyphicon-remove"></span>
                            Sterge
                        </a>  
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <h1 class="text-center">Nu sunt parteneriati</h1>
    @endif
    <div class="modal fade" id="add_parteneriat" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center">Parteneriat</h4>
            </div>
            <div class="modal-body text-center">
                <input type="text" name="linkp" class="form-control" placeholder="Linkul catre parteneriat" style="margin-bottom: 10px;"/>
                <form id="upload" enctype="multipart/form-data" style="width: 30%;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label class="file">
                        <img src="{{asset("allimages/system/upload.png")}}" class="img-responsive" id="imageparteneriat" style="cursor:pointer;"/>
                        <input type="file" name="file" style="display:none;"><br>
                    </label>
                    <p id="imageeror" class="text-danger"></p>
                </form>
                <button class="btn btn-primary" id="saveparteneriat" name="savemod" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Se salveaza">Salveaza</button>
                <button class="btn btn-default" data-dismiss="modal">Anuleaza</button>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" id="comfirm_delete_parteneriat" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center">Sterge parteneriat</h4>
            </div>
            <div class="modal-body text-center">
                <h2 class="calibri" style="margin: 0px 0px 15px 0px;">Sigur doriti sa stergeti acest partener?</h2>
                <button class="btn btn-default" id="yesdelete">Da</button>
                <button class="btn btn-primary" data-dismiss="modal">Nu</button>
            </div>
          </div>
        </div>
    </div>
<script>
    $(document).ready(function(){
        $("a[name=deleteparteneriat]").on("click",function(){
            var id=$(this).attr("id");
            $("#yesdelete").attr("iddel",id);
            $("#comfirm_delete_parteneriat").modal();
        });
        $("#yesdelete").on("click",function(){
            var id=$(this).attr("iddel");
            $.ajax({
                type:'post',
                url:"{{URL('/admin/delparteneriat')}}",
                data:{
                    id:id
                },
                success:function(){
                    location.reload();
                }
            });
        });
        image="";
        $("a[name=modparteneriat]").on('click',function(){
            $("button[name=savemod]").attr("id","modparteneriat");
            $("button[name=savemod]").attr("idmod",$(this).attr("idmod"));
            image=$(this).attr("logo");
            $("#imageparteneriat").attr("src","{{asset('/')}}"+image);
            $("input[name=linkp]").val($(this).attr("link"));
            $("#add_parteneriat").modal();
        });
        $("button[name=savemod]").on('click',function(){
            var link=$("input[name=linkp]").val();
            var logo=image;
            var permit=true;
            if(link.length===0){
                $("input[name=linkp]").css("border-color","red");
                $("input[name=linkp]").focus();
                permit=false;
            }else{
                $("input[name=linkp]").css("border-color","#ccc");
            }
            if(logo.length<2){
                $("#imageparteneriat").css("border","1px solid red");
                permit=false;
            }else{
                $("#imageparteneriat").css("border","none");
            }
            if(permit===true){
                $("button[name=savemod]").button("loading");
                if($("button[name=savemod]").attr("id")==="saveparteneriat")
                {
                    $.ajax({
                        type:'post',
                        url:"{{URL('/admin/saveparteneriat')}}",
                        data:{
                            link:link,
                            logo:logo
                        },
                        success:function(){
                            location.reload();
                        }
                    });
                }else{
                    $.ajax({
                        type:'post',
                        url:"{{URL('/admin/modparteneriat')}}",
                        data:{
                            id:$("button[name=savemod]").attr("idmod"),
                            link:link,
                            logo:logo
                        },
                        success:function(){
                            location.reload();
                        }
                    });
                }
            }
        });
        $("#addpart").on("click",function(){
            anuleazaparteneriat();
        });
        function anuleazaparteneriat(){
            $("button[name=savemod]").attr("id","saveparteneriat");
            $("#imageparteneriat").attr("src",'{{asset("/allimages/system/upload.png")}}');
            $("input[name=linkp]").val("");
            image="";
            $("input[name=linkp]").css("border-color","#ccc");
            $("#imageparteneriat").css("border","none");
        }
        
        $('#upload').on('submit',(function(e) {
            e.preventDefault();
            $("#imageparteneriat").attr("src",'{{asset("/allimages/system/loader.gif")}}');
            var formData = new FormData(this);
            formData.append("image",image);
            $("#imageeror").html("");
            $.ajax({
                type:'POST',
                url: "{{URL('/admin/uploadimageparteneriat')}}",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data.succes===true){
                        image=data.image;
                        $("#imageparteneriat").attr("src",'{{asset("/")}}'+data.image);
                    }else{
                        $("#imageeror").html("A aparut o eroare la incarcare");
                        if(image.length>=2){
                            $("#imageparteneriat").attr("src",'{{asset("/")}}'+image);
                        }else{
                            $("#imageparteneriat").attr("src",'{{asset("/allimages/system/upload.png")}}');
                        }
                    }
                },
                error:function(){
                    $("#imageeror").html("A aparut o eroare la incarcare");
                    if(image.length>=2){
                        $("#imageparteneriat").attr("src",'{{asset("/")}}'+image);
                    }else{
                        $("#imageparteneriat").attr("src",'{{asset("/allimages/system/upload.png")}}');
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