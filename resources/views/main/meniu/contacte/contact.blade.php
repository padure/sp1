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
        <div id="map" style="width:100%;height:400px;background:yellow"></div>
    </div>
</div>
<script>
function myMap() {
  var myCenter = new google.maps.LatLng(45.8947,28.1888);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 15};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
@endsection