@extends("main.base")
@section("content")

<h3>Regulamentul consiliului elevilor</h3>
<embed src="{{asset("documents/regulamentul_consiliului_elevilor.pdf")}}?#zoom=120" 
                   type='application/pdf'width="100%" height="900px"/>
@endsection