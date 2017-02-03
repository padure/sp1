@extends("main.base")
@section("content")
<div class="col-md-12 meserii whiteclass">
<h3>Orar Modificat</h3>
</div>
<embed src="{{asset("documents/orar-modificat.pdf")}}?#zoom=85" 
                   type='application/pdf'width="100%" height="900px"/>


@endsection