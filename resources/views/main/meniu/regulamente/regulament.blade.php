@extends("main.base")
@section("content")
<div class="col-md-12 meserii whiteclass">
<h3>Regulamentul intern de activitate al școlii profesionale</h3>
</div>
<embed src="{{asset("documents/regulament_intern.pdf")}}?#zoom=120" 
                   type='application/pdf'width="100%" height="900px"/>
@endsection