@extends("admin.base")
@section("content")
<div class="col-md-12">
    <!--Orar -->
    <form id="orar" enctype="multipart/form-data" class="col-md-4">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label class="file">
            <a class='btn btn-primary' id="btnorar" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Se incarca">
                <span class="glyphicon glyphicon-cloud-upload"></span>
                Incarca orar
            </a>
            <input type="file" name="file" style="display:none;"><br>
        </label>
        <p id="orareror" class="text-danger"></p>
    </form>
    <!--Orar modificat-->
    <form id="orarmodificat" enctype="multipart/form-data" class="col-md-4">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label class="file">
            <a class='btn btn-success' id="btnorarmodificat" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Se incarca">
                <span class="glyphicon glyphicon-cloud-upload"></span>
                Incarca orar modificat
            </a>
            <input type="file" name="file" style="display:none;"><br>
        </label>
        <p id="orarmodificateror" class="text-danger"></p>
    </form>
    <div class="col-md-12">
        
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#orar").on("submit",function(e){
            e.preventDefault();
            $("#btnorar").button("loading");
            $("#orareror").html("");
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{URL('/admin/uploadorar')}}",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data.succes===true){
                        location.reload();
                    }else{
                        $("#orareror").html("fisierul nu este format PDF");
                    }
                    $("#btnorar").button("reset");
                },
                error:function(){
                    $("#orareror").html("A aparut o eroare");
                    $("#btnorar").button("reset");
                }
            });
        });
        $("#orar").on("change", function() {
            $("#orar").submit();
        });
        $("#orarmodificat").on("submit",function(e){
            e.preventDefault();
            $("#btnorarmodificat").button("loading");
            $("#orarmodificateror").html("");
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{URL('/admin/uploadorarmodificat')}}",
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data.succes===true){
                        location.reload();
                    }else{
                        $("#orarmodificateror").html("fisierul nu este format PDF");
                    }
                    $("#btnorarmodificat").button("reset");
                },
                error:function(){
                    $("#orarmodificateror").html("A aparut o eroare");
                    $("#btnorarmodificat").button("reset");
                }
            });
        });
        $("#orarmodificat").on("change", function() {
            $("#orarmodificat").submit();
        });
    });
</script>
@endsection