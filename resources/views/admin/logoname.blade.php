@extends("admin.base")
@section("content")
<div class="col-md-6">
    <p id='curentname'>
        @if(count($post['namesite'])>0)
            <b>Nume:</b> {{$post['namesite']->valuevariable}}
        @else
            <b>Siteul nu are nume</b>
        @endif
    </p>
    <input type="text" maxlength="50" name="namesite" class="form-control" placeholder="Numele siteului" id='inputnamesite'/>
    <br>
    <button class="btn btn-primary" id='namesite' data-loading-text="<i class='fa fa-spinner fa-spin'></i> Se salveaza">Salveaza</button>
</div>
<div class="col-md-6">
    <p id='curentlogo'>
        @if(count($post['logo'])>0)
            <img src='{{asset($post['logo']->valuevariable)}}' class='img-responsive'/>
        @else
            <b>Siteul nu are logo</b>
        @endif
    </p>
    <form id="upload" enctype="multipart/form-data" class="col-md-4">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label class="file">
            <a class='btn btn-info' id="logosite" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Se incarca">Incarca logo</a>
            <input type="file" name="file" style="display:none;"><br>
        </label>
        <p id="imageeror" class="text-danger"></p>
    </form>
</div>
<script>
    $(document).ready(function(){
        $("#upload").on("submit",function(e){
            e.preventDefault();
            $("#logosite").button("loading");
            $("#imageeror").html("");
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{URL('/admin/uploadlogo')}}",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data.succes===true){
                        $("#curentlogo").html("<img src='{{asset('/')}}"+data.image+"' class='img-responsive'/>");
                    }else{
                        $("#imageeror").html("fisierul nu este imagine");
                    }
                    $("#logosite").button("reset");
                }
            });
        });
        $("#upload").on("change", function() {
            $("#upload").submit();
        });
        $("#namesite").on("click",function(){
            var nume=$("#inputnamesite").val();
            if(nume.length>0){
                $("#inputnamesite").css("border-color","#ccc");
                $("#namesite").button("loading");
                $.ajax({
                    type:"post",
                    url:"{{URL('/admin/savenamesite')}}",
                    data:{
                        nume:nume
                    },
                    success: function(data){
                        $("#curentname").html("<b>Nume:</b> "+data);
                        $("#inputnamesite").val("");
						$("#namesite").button("reset");
                    }
                });
                
                
                
            }else{
                $("#inputnamesite").css("border-color","red");
                $("#inputnamesite").focus();
            }
        });
    });
</script>
@endsection