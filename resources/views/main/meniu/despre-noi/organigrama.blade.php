@extends("main.base")
@section("content")
<div class="col-md-12 whiteclass"style="background-color: white;">
    <div class="misiune">
<h2>Organigrama</h2>
    </div>
</div>
<embed src="{{asset("documents/organigrama.pdf")}}?#zoom=85" 
                   type='application/pdf'width="100%" height="750px"/>
@endsection