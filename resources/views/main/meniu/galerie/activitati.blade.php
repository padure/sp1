@extends("main.base")
@section("content")
<div class="col-md-12 activitati-extracurs">
   <h3>Activitati extracurs</h3>
   <div class="">
   <a href="{{ asset ( "images/extracurs/img1.jpg" ) }}" data-title="My first caption" data-lightbox="Vacation">
        <img src="{{ asset ( "images/extracurs/img1.jpg" ) }}" class="img-thumbnail"/>
   </a>
    </div>
   <div class="">
   <a href="{{ asset ( "images/extracurs/img2.jpg" ) }}" data-title="My first caption" data-lightbox="Vacation">
        <img src="{{ asset ( "images/extracurs/img2.jpg" ) }}" class="img-thumbnail"/>
   </a>
    </div>
   <div class="">
   <a href="{{ asset ( "images/extracurs/img3.jpg" ) }}" data-title="My first caption" data-lightbox="Vacation">
        <img src="{{ asset ( "images/extracurs/img3.jpg" ) }}" class="img-thumbnail"/>
   </a>
    </div>
   <div class="">
   <a href="{{ asset ( "images/extracurs/img4.jpg" ) }}" data-title="My first caption" data-lightbox="Vacation">
        <img src="{{ asset ( "images/extracurs/img4.jpg" ) }}" class="img-thumbnail"/>
   </a>
    </div>
   <div class="">
   <a href="{{ asset ( "images/extracurs/img5.jpg" ) }}" data-title="My first caption" data-lightbox="Vacation">
        <img src="{{ asset ( "images/extracurs/img5.jpg" ) }}" class="img-thumbnail"/>
   </a>
    </div>
   <div class="">
   <a href="{{ asset ( "images/extracurs/img6.jpg" ) }}" data-title="My first caption" data-lightbox="Vacation">
        <img src="{{ asset ( "images/extracurs/img6.jpg" ) }}" class="img-thumbnail"/>
   </a>
    </div>
   <div class="">
   <a href="{{ asset ( "images/extracurs/img7.jpg" ) }}" data-title="My first caption" data-lightbox="Vacation">
        <img src="{{ asset ( "images/extracurs/img7.jpg" ) }}" class="img-thumbnail"/>
   </a>
    </div>
   <div class="">
   <a href="{{ asset ( "images/extracurs/img8.jpg" ) }}" data-title="My first caption" data-lightbox="Vacation">
        <img src="{{ asset ( "images/extracurs/img8.jpg" ) }}" class="img-thumbnail"/>
   </a>
    </div>
</div>
<script src="{{ asset("js/lightbox.min.js") }}"></script>
@endsection