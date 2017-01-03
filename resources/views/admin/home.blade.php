@extends("admin.base")
@section("content")
<div class="homepage">
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <a href="{{URL("/admin/events")}}">
            <div class="evenimentehome patrat">
                <p class="imagehome">
                    <img src="{{asset("allimages/system/eventhome.png")}}" class="img-responsive"/>
                </p>
                <h3 class="text-center">Evenimente</h3>
                <h1 class="text-center">{{$countevent}}</h1>
            </div>
        </a>
    </div>
    
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <a href="{{URL("/admin/slideshow")}}">
            <div class="slideshowhome patrat">
                <p class="imagehome">
                    <img src="{{asset("allimages/system/slideshowhome.png")}}" class="img-responsive"/>
                </p>
                <h3 class="text-center">Slideshow</h3>
                <h1 class="text-center">{{$countslideshow}}</h1>
            </div>
        </a>
    </div>
    
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <a href="{{URL("/admin/elevi")}}">
            <div class="elevihome patrat">
                <p class="imagehome">
                    <img src="{{asset("allimages/system/studenthome.png")}}" class="img-responsive"/>
                </p>
                <h3 class="text-center">Elevi</h3>
                <h1 class="text-center">{{$countelevi}}</h1>
            </div>
        </a>
    </div>
</div>
@endsection
