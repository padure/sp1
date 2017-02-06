@extends("main.base")
@section("content")
<div class="col-md-12 activitati-extracurs whiteclass" style="float: left;
                                                                width: 100%;
                                                                padding-bottom: 15px;">
    @if(!empty($post) && count($post) >0)
        <h3>{{$post["name"]}}</h3>
        @foreach($post["items"] as $i)
            <div class="" >
                 <a href="{{ asset ( $i->address ) }}" data-title="" data-lightbox="Vacation">
                      <img src="{{ asset ( $i->address ) }}" class="img-thumbnail" style="height: 170px;"/>
                 </a>
             </div>
        @endforeach
   @endif
</div>
<script src="{{ asset("js/lightbox.min.js") }}"></script>
@endsection 