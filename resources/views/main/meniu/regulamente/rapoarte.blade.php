@extends("main.base")
@section("content")

<h3>Rapoarte</h3>
<embed src="{{asset("documents/rapoarte.pdf")}}?#zoom=120" 
                   type='application/pdf'width="100%" height="900px"/>
@endsection