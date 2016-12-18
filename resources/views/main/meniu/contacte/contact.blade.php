@extends("main.base")
@section("content")
<h4>Contacte</h4>
<div class="col-md-12">
    <div class="col-lg-8">
        <ul>
            <p >Date de contact</p>
            <li>Adr: Dunarii 123/12</li>
            <li>Telefon: +373 299 23 233</li>
            <li>E-mail: sp1_cahul@mail.ru</li>
        </ul>
    </div>
    <div class="col-lg-4">
        <img src="{{ asset ( "images/scoala.jpg" ) }}" class="img-thumbnail">
    </div>
    <div class="col-md-12">
        <div id="map" style="width:100%;height:250px "></div>
    </div>
</div>
@endsection