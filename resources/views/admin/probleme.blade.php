@extends("admin.base")
@section("content")
<div class="content" style="font-size: 16px;">
    @if(!empty($post) && count($post)>0)
        @foreach($post as $i)
        <b>Nume :</b> {{$i->nume}}
        <b>Prenume :</b> {{$i->prenume}}
        <b>Telefon :</b> {{$i->telefon}}
        <b>Email :</b> {{$i->email}}
        <button class="btn btn-danger btn-xs" iddel="{{$i->id}}" name="delete">Sterge</button>
        <br>
        <b>Problema :</b>{{$i->problema}}
        <hr style="border-bottom: 1px solid gray;">
        @endforeach
    @else
        <h1 class="text-center">Nu sunt mesaje</h1>
    @endif
</div>
<div class="modal fade" id="comfirm_delete_problema" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Sterge problema</h4>
        </div>
        <div class="modal-body text-center">
            <h2 class="calibri" style="margin: 0px 0px 15px 0px;">Sigur doriti sa stergeti?</h2>
            <button class="btn btn-default" id="yesdelete">Da</button>
            <button class="btn btn-primary" data-dismiss="modal">Nu</button>
        </div>
      </div>
    </div>
</div>
<script>
    $("button[name=delete]").on("click",function(){
        $("#yesdelete").attr("iddel",$(this).attr("iddel"));
        $("#comfirm_delete_problema").modal();
    });
    $("#yesdelete").on("click",function(){
        var id=$(this).attr("iddel");
        $.ajax({
            type:'post',
            url:"{{URL('/admin/delproblema')}}",
            data:{
                id:id
            },
            success:function(){
                location.reload();
            }
        });
    });
</script>
@endsection