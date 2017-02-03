@extends("main.base")
@section("content")

<h3>Regulamentul de activitate a căminurilor</h3>
<embed src="{{asset("documents/regulamentul_de_activitate_acaminelor.pdf")}}?#zoom=120" 
                   type='application/pdf'width="100%" height="900px"/>

@endsection