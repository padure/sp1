@extends("main.base")
@section("content")
<div class="col-md-12 activitati-extracurs">
   <h3>Activitati extracurs</h3>
   <div class="">
   <a href="{{ asset ( "images/extracurs/img1.jpg" ) }}" data-title="My first caption" data-lightbox="Vacation">
        <img src="{{ asset ( "images/extracurs/img1.jpg" ) }}" class="img-thumbnail"/>
   </a>
    </div>
</div>
<script src="{{ asset("js/lightbox.min.js") }}"></script>
<script src="{{ asset("js/lightbox-plus-jquery.min.js") }}"></script>
@endsection