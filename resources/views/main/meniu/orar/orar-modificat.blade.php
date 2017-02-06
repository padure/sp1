@extends("main.base")
@section("content")
<div class="col-md-12 meserii whiteclass">
    @if(!empty($post) && count($post) >0)
        <h3>Orar Modificat</h3>
        <embed src="{{asset($post->valuevariable)}}?#zoom=85" 
                       type='application/pdf'width="100%" height="900px"/>
    @else
        <h3>Nu este orar modificat</h3>
    @endif
</div>
@endsection