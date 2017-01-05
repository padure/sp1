@extends("admin.base")
@section("content")
<div class="content">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading text-center">Adauga un admin</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" id="registerother">
                    {!! csrf_field() !!}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Numele</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            <strong id="nameeror" class="text-danger"></strong>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Adresa Email</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            <strong id="emaileror" class="text-danger"></strong>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Parola</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="password">
                            <strong id="passworderor" class="text-danger"></strong>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" id="addAdmin" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Se adauga">
                                Adauga
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <div class="content">
        @if(!empty($admins) && count($admins)>0)
            <table class="table">
                <tr>
                    <th>Nume:</th>
                    <th>Email:</th>
                    <th>Rol:</th>
                    <th>Setari:</th>
                </tr>
            @foreach($admins as $i)
                <tr id="admin{{$i->id}}">
                    <td>{{$i->name}}</td>
                    <td>{{$i->email}}</td>
                    <td>
                        @if($i->confirmed==1)
                            Activat
                        @else
                            Dezactivat
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-danger" id="{{$i->id}}" name="deleteadmin">Sterge</button>
                    </td>
                </tr>
            @endforeach
        </table>
        @endif
    </div>
    <div class="modal fade" id="confirm_email" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center">Adaugat!!</h4>
            </div>
            <div class="modal-body text-center">
                <h2 class="calibri" style="margin: 0px 0px 15px 0px;">Pe acest email a fost trimis un mesaj</h2>
                <button class="btn btn-default" data-dismiss="modal">Ok</button>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" id="delete_admin" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center">Sterge admin</h4>
            </div>
            <div class="modal-body text-center">
                <h2 class="calibri" style="margin: 0px 0px 15px 0px;" id="mesajdelete"></h2>
                <button class="btn btn-default" data-dismiss="modal">Ok</button>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" id="comfirm_delete" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center">Sterge admin</h4>
            </div>
            <div class="modal-body text-center">
                <h2 class="calibri" style="margin: 0px 0px 15px 0px;">Sigur doriti sa stergeti acest admin?</h2>
                <button class="btn btn-default" id="yesdelete">Da</button>
                <button class="btn btn-primary" data-dismiss="modal">Nu</button>
            </div>
          </div>
        </div>
    </div>
<script>
    $(document).ready(function() {
        $("button[name=deleteadmin]").on("click",function(){
            var id=$(this).attr("id");
            $("#comfirm_delete").modal();
            $("#yesdelete").attr("idadmin",id);
        });
        $("#yesdelete").on("click",function(){
            $("#comfirm_delete").modal("hide");
            var id=$(this).attr("idadmin");
            $.ajax({  
                type: 'POST',  
                url: "{{URL('/admin/deleteadmin')}}", 
                data: 
                    { 
                        id:id
                    },
                success: function(data) {
                    if(data===true){
                        $("#mesajdelete").html("Adminul a fost sters");
                        $("#admin"+id).remove();
                    }else{
                        $("#mesajdelete").html("Dvs. nu puteti sterge admini");
                    }
                    $("#delete_admin").modal();
                    
                }
            });
        });
	$('#registerother').submit(function(e) {
            e.preventDefault();
            $("#nameeror").html();
            $("#emaileror").html();
            $("#passworderor").html();
            $("#addAdmin").button("loading");
            $.ajax({  
                type: 'POST',  
                url: "{{URL('/admin/registerother')}}", 
                data: 
                    { 
                        name:$("input[name=name]").val(),
                        email:$("input[name=email]").val(),
                        password:$("input[name=password]").val()
                    },
                success: function(data) {
                    $("#addAdmin").button("reset");
                    $("#nameeror").html(data.name);
                    $("#emaileror").html(data.email);
                    $("#passworderor").html(data.password);
                    if(data===false){
                        $("#mesajdelete").html("Dvs. nu puteti adauga admini");
                        $("#delete_admin").modal();
                    }
                    if(data.logat){
                        $("#confirm_email").modal();
                        $("#registerother")[0].reset();
                    }
                }
            });
	});
    });
</script>
@endsection
