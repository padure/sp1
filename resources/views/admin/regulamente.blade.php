@extends("admin.base")
@section("content")
    <p class="text-danger text-center"><b>Nota:</b> Pentru modificarea regulamentului va rugam sa stergeti regulamentul vechi si sa-l adaugati din nou</p>
    <div class="col-md-6">
        <label class="text-info">Nume Regulament: </label> 
        <span class="text-info">(Ex.Regulamentul de activitate a căminurilor)</span>
        <input type="text" name="nume" class="form-control" placeholder="Nume reglament" style="margin-bottom: 10px;"/>
        <label class="text-info">Fisierul PDF: </label>
        <form id="upload" enctype="multipart/form-data" style="width: 100%;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label class="file" style="margin-bottom: 0px;">
                <input type="file" name="file"><br>
            </label>
            <p id="error" class="text-danger"></p>
            <button class="btn btn-primary" id="saveregulament" name="save" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Se adauga">
                Adauga
            </button>
        </form>
    </div>
    
    @if(!empty($post) && count($post)>0)
        <div class="col-md-12">
            <h1>Regulamentele </h1>
            @foreach($post as $i)
                <div class="col-md-12">
                    <div class="col-md-7">
                        <a target="_blank" href="{{asset($i->link)}}">
                            <p>
                                {{$i->nume}}
                            </p>
                        </a>
                    </div>
                    <div class="col-md-5">
                        <button class="btn btn-danger btn-sm" style="margin-bottom: 5px;" id="{{$i->id}}" name="delregulament">Sterge</button>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="modal fade" id="comfirm_delete_regulamente" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-center">Sterge regulament</h4>
                </div>
                <div class="modal-body text-center">
                    <h2 class="calibri" style="margin: 0px 0px 15px 0px;">Sigur doriti sa stergeti acest regulament?</h2>
                    <button class="btn btn-default" id="yesdelete">Da</button>
                    <button class="btn btn-primary" data-dismiss="modal">Nu</button>
                </div>
              </div>
            </div>
        </div>
    @endif
    
    <script>
        $("button[name=delregulament]").on("click",function(){
            var id=$(this).attr("id");
            $("#yesdelete").attr("iddel",id);
            $("#comfirm_delete_regulamente").modal();
        });
        $("#yesdelete").on("click",function(){
            var id=$(this).attr("iddel");
            $.ajax({
                type:'post',
                url:"{{URL('/admin/delregulament')}}",
                data:{
                    id:id
                },
                success:function(){
                    location.reload();
                }
            });
        });
        $("#upload").on("submit",function(e){
            e.preventDefault();
            var nume=$("input[name=nume]").val();
            var formData = new FormData(this);
            formData.append("nume",nume);
            $("#error").html("");
            $("input[name=nume]").css("border-color","#ccc");
            if(nume.length>0 && nume.length<100){
                $("#saveregulament").button("loading");
                $.ajax({
                    type:'POST',
                    url: "{{URL('/admin/addregulament')}}",
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        if(data.succes===true){
                            location.reload();
                        }else{
                            $("#error").html("A aparut o eroare la incarcare");
                        }
                        $("#saveregulament").button("reset");
                    }
                });
            }else{
                $("input[name=nume]").css("border-color","red");
                $("input[name=nume]").focus();
            }
        });
    </script>
@endsection