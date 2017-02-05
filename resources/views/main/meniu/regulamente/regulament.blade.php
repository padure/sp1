@extends("main.base")
@section("content")
<div class="col-md-12 meserii whiteclass">
    @if(!empty($post) && count($post) > 0)
        <h3>{{$post->nume}}</h3>
        <embed src="{{asset($post->link)}}?#zoom=110" 
                   type='application/pdf'width="100%" height="900px"/>
    @else
        <h1>Nu s-a gasit acest regulament</h1>
    @endif
</div>

@endsection