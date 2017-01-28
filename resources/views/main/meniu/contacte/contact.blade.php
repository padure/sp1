@extends("main.base")
@section("content")
<div class="col-md-12 whiteclass">
    <h4>Contacte</h4>

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
    <!-- Add Google Maps -->
<div id="googleMap" style="height:400px;filter:grayscale(90%);-webkit-filter:grayscale(90%);"></div>
</div>
<script src="{{ asset("https://maps.googleapis.com/maps/api/js") }}"></script>
<script>
var myCenter = new google.maps.LatLng(41.878114, -87.629798);
    
function initialize() {
    var mapProp = {
    center: myCenter,
    zoom: 12,
    scrollwheel: false,
    draggable: false,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};
    
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    
var marker = new google.maps.Marker({
    position: myCenter,
});
    
marker.setMap(map);
}
    
google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endsection