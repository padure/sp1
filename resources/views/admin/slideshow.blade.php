@extends("admin.base")
@section("content")
    <form id="uploadslideshow" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label class="file">
            <a class="btn btn-primary" id="uploadslideshowButton" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Se incarca">
                <span class="glyphicon glyphicon-upload"></span>
                Incarca imagine
            </a>
            <input type="file" name="file[]" multiple style="display:none;"><br>
        </label>
        <strong class="text-danger">Atentie!</strong> toate imaginile trebuie sa fie de o marime! Sau latimea sa fie de 4 ori mai mare ca inaltimea. Ex: 300x1200 , 400x1600 , 450x1800 px
    </form>

    @if(!empty($post) && count($post)>0)
        @foreach($post as $i)
            <div class="slideimages">
                <p class="text-right">
                    <button class="btn btn-danger" id="deleteslider{{$i->id}}" name="deleteslider">
                        <span class="glyphicon glyphicon-remove"></span>
                        Sterge
                        <span class="glyphicon glyphicon-arrow-down"></span>
                    </button>
                </p>
                <img src="{{asset($i->slideimage)}}" class="img-responsive"/>
            </div>
        @endforeach
    @else
        <h1 class="text-center">Nu sunt imagini</h1>
    @endif
    <div class="modal fade" id="comfirm_delete" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center">Sterge imagine</h4>
            </div>
            <div class="modal-body text-center">
                <h2 class="calibri" style="margin: 0px 0px 15px 0px;">Sigur doriti sa stergeti aceasta imagine?</h2>
                <button class="btn btn-default" id="yesdelete">Da</button>
                <button class="btn btn-primary" data-dismiss="modal">Nu</button>
            </div>
          </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('body').on("click","button[name=deleteslider]",function(){
                var id=$(this).attr("id").replace("deleteslider","");
                $("#comfirm_delete").modal();
                $("#yesdelete").attr("imagedel",id);
            });
            $("#yesdelete").on("click",function(){
                $("#comfirm_delete").modal("hide");
                var id=$(this).attr("imagedel");
                $.ajax({  
                    type: 'POST',  
                    url: "{{URL('/admin/deleteimageslider')}}", 
                    data: 
                        { 
                            id:id
                        },
                    success: function(data) {
                        location.reload();
                    }
                });
            });
            $('#uploadslideshow').on('submit',function(e) {
                e.preventDefault();
                $("#uploadslideshowButton").button("loading");
                var formData = new FormData(this);
                $.ajax({
                    type:'POST',
                    url: "{{URL('/admin/uploadslideshow')}}",
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        $("#uploadslideshowButton").button("reset");
                        location.reload();
                    }
                });
            });
            $("#uploadslideshow").on("change", function() {
                $("#uploadslideshow").submit();
            });
        });
    </script>
@endsection
