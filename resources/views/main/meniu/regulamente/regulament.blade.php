@extends("main.base")
@section("content")
    <style>  
        .content-part {
    background-color:green;
    margin: 10px;
    color:white;
    text-align:center;
}
</style>
<h3>Regulament</h3>
<div class="container flexslider">
    
<div class="row slides">
    <div class="col-md-4"> <div class="content-part"> 1 </div> </div>
    <div class="col-md-4"> <div class="content-part"> 2 </div> </div>
    <div class="col-md-4"> <div class="content-part"> 3 </div> </div>
    <div class="col-md-4"> <div class="content-part"> 4 </div> </div>
    <div class="col-md-4"> <div class="content-part"> 5 </div> </div>
</div>
    
</div>
<script>
	$('.flexslider').flexslider({
    selector: ".slides > div.col-md-4",
    animation: "slide",
    animationLoop: true,
    itemWidth: 100,
    maxItems: 3,
    start: function(slider){
        slider.resize();
    }
});
</script>
@endsection