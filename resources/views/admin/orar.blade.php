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
        @if(!empty($post["orar"]))
            <h2>
                Orar
                <button class="btn btn-danger pull-right" id="{{$post["orar"]->id}}" name="deleteorar" >
                    <span class="glyphicon glyphicon-remove"></span>
                    Sterge
                    <span class="glyphicon glyphicon-arrow-down"></span>
                </button>
            </h2>
            <embed src="{{asset($post["orar"]->valuevariable)}}?#zoom=120" 
                   type='application/pdf'width="100%" height="500px"/>
        @endif
        @if(!empty($post["orarmodificat"]))
            <h2>
                Orar modificat
                <button class="btn btn-danger pull-right" id="{{$post["orarmodificat"]->id}}" name="deleteorar" >
                    <span class="glyphicon glyphicon-remove"></span>
                    Sterge
                    <span class="glyphicon glyphicon-arrow-down"></span>
                </button>
            </h2>
            <embed src="{{asset($post["orarmodificat"]->valuevariable)}}?#zoom=120" 
                   type='application/pdf'width="100%" height="500px"/>
        @endif
    </div>
</div>
<div class="modal fade" id="comfirm_delete" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Sterge orar</h4>
        </div>
        <div class="modal-body text-center">
            <h2 class="calibri" style="margin: 0px 0px 15px 0px;">Sigur doriti sa stergeti orarul?</h2>
            <button class="btn btn-default" id="yesdelete">Da</button>
            <button class="btn btn-primary" data-dismiss="modal">Nu</button>
        </div>
      </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("button[name=deleteorar]").on("click",function(){
            var id=$(this).attr("id");
            $("#yesdelete").attr("iddel",id);
            $("#comfirm_delete").modal();
        });
        $("#yesdelete").on("click",function(){
            var id=$(this).attr("iddel");
            $.ajax({  
                type: 'POST',  
                url: "{{URL('/admin/deleteorar')}}", 
                data: 
                    { 
                        id:id
                    },
                success: function() {
                    location.reload();
                }
            });
        });
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