@extends("main.base")
@section("content")
<div class="col-md-12 whiteclass">
    <div class="misiune">
<div class="descriere-misiune">
    <div class="titlu-plan">
        <h3>Ministerul Educaţiei al Republicii Moldova</h3>
        <h2>Plan de dezvoltare</h2>
        <h2>a Şcolii profesionale nr.1</h2>
        <h2>Cahul</h2>
        <h2>(2015-2020)</h2>
    </div>
    </div>
</div>
    <embed src="{{asset("documents/plan_de_dezvoltare.pdf")}}?#zoom=111" 
                   type='application/pdf'width="100%" height="900px"/>

</div>
@endsection