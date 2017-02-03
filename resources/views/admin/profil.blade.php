@extends("admin.base")
@section("content")
<div class="col-md-12">
    <form class=" col-md-6"  id="nameemail">
        <div class="form-group">
            <label for="name" >Numele:</label>
            <input type="text" class="form-control" id="name" value="{{session("nameAdmin")}}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" value="{{session("emailAdmin")}}" required>
        </div>
        <a class="btn btn-default" id="submit">Salveaza</a>
    </form>
    <form class="col-md-6"  id="parola">
        <div class="form-group">
            <label>Parola veche:</label>
            <input type="text" class="form-control" id="parolaveche" required>
        </div>
        <div class="form-group">
            <label>Parola noua:</label>
            <input type="password" class="form-control" id="password" required>
        </div>
        <div class="form-group">
            <label>Repeta parola:</label>
            <input type="password" class="form-control" id="repeatpassword" required>
        </div>
        <a class="btn btn-default" id="changepassword">Salveaza</a>
    </form>
</div>
<script>
    $(document).ready(function(){
        $("#changepassword").on("click",function(){
            $("#parolaveche").css("border-color","#ccc");
            $("#password").css("border-color","#ccc");
            $("#repeatpassword").css("border-color","#ccc");
            $.ajax({
                type:"post",
                url:"{{URL('/admin/profil')}}",
                data:{
                    parolaveche:$("#parolaveche").val(),
                    password:$("#password").val(),
                    repeatpassword:$("#repeatpassword").val()
                },
                success:function(data){
                    if(data===true){
                        alert("Parola a fost schimbata");
                        location.reload();
                    }else{
                        if(data["parolaveche"]){
                            $("#parolaveche").css("border-color","red");
                        }
                        if(data["password"]){
                            $("#password").css("border-color","red");
                        }
                        if(data["repeatpassword"]){
                            $("#repeatpassword").css("border-color","red");
                        }
                    }
                }
            });
            
        });
        $('#submit').on("click",function (e) {
            e.stopPropagation();
            $.ajax({
                type:"post",
                url:"{{URL('/admin/changename')}}",
                data:{
                    name:$("#name").val(),
                    email:$("#email").val()
                },
                success:function(){
                    location.reload();
                }
            });
        });
    });
</script>
@endsection