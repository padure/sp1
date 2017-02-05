@extends("main.base")
@section("content")
<div class="col-md-12 activitati-extracurs whiteclass" >
    @if(!empty($post) && count($post) >0)
        <h3></h3>
        @foreach($post as $i)
            <div class="">
                 <a href="{{ asset ( $i->address ) }}" data-title="My first caption" data-lightbox="Vacation">
                      <img src="{{ asset ( $i->address ) }}" class="img-thumbnail"/>
                 </a>
             </div>
        @endforeach
   @endif
</div>
<script src="{{ asset("js/lightbox.min.js") }}"></script>
@endsection