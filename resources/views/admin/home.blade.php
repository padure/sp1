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
        <a href="{{URL("/admin/administratia")}}">
            <div class="administratiahome patrat">
                <p class="imagehome">
                    <img src="{{asset("allimages/system/administratiahome.png")}}" class="img-responsive"/>
                </p>
                <h3 class="text-center">Administratia</h3>
                <h1 class="text-center">{{$countadministratia}}</h1>
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
    
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <a href="{{URL("/admin/logoname")}}">
            <div class="logonamehome patrat">
                <p class="imagehome">
                    <img src="{{asset("allimages/system/logonamehome.png")}}" class="img-responsive"/>
                </p>
                <h3 class="text-center">Logo si nume</h3>
            </div>
        </a>
    </div>
    
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <a href="{{URL("/admin/users")}}">
            <div class="adminhome patrat">
                <p class="imagehome">
                    <img src="{{asset("allimages/system/adminhome.png")}}" class="img-responsive"/>
                </p>
                <h3 class="text-center">Admini</h3>
                <h1 class="text-center">{{$countadmin}}</h1>
            </div>
        </a>
    </div>
    
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <a href="{{URL("/admin/urna")}}">
            <div class="fisierenefolositehome patrat">
                <p class="imagehome">
                    <img src="{{asset("allimages/system/fisierenefolositehome.png")}}" class="img-responsive"/>
                </p>
                <h3 class="text-center">Fisiere nefolosite</h3>
                <h1 class="text-center">{{$countfisierenefolosite}}</h1>
            </div>
        </a>
    </div>
</div>

{{number_format( disk_free_space("/") / 1048576, 2)}} Mb Free din {{number_format( disk_total_space("/") / 1048576, 2)}}
<div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
         60%
    </div>
</div>
@endsection
