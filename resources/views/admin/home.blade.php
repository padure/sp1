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
        <a href="{{URL("/admin/probleme")}}">
            <div class="problemahome patrat">
                <p class="imagehome">
                    <img src="{{asset("allimages/system/problemahome.png")}}" class="img-responsive"/>
                </p>
                <h3 class="text-center">Probleme</h3>
                <h1 class="text-center">{{$countprobleme}}</h1>
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
        <a href="{{URL("/admin/parteneriati")}}">
            <div class="parteneriatihome patrat">
                <p class="imagehome">
                    <img src="{{asset("allimages/system/parteneriatihome.png")}}" class="img-responsive"/>
                </p>
                <h3 class="text-center">Parteneriati</h3>
                <h1 class="text-center">{{$countparteneriati}}</h1>
            </div>
        </a>
    </div>
    
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <a href="{{URL("/admin/corpdidactic")}}">
            <div class="corpdidactichome patrat">
                <p class="imagehome">
                    <img src="{{asset("allimages/system/cadrudidactichome.png")}}" class="img-responsive"/>
                </p>
                <h3 class="text-center">Corp Didactic</h3>
                <h1 class="text-center">{{$countcorpdidactic}}</h1>
            </div>
        </a>
    </div>
    
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <a href="{{URL("/admin/regulamente")}}">
            <div class="regulamentehome patrat">
                <p class="imagehome">
                    <img src="{{asset("allimages/system/regulamenthome.png")}}" class="img-responsive"/>
                </p>
                <h3 class="text-center">Regulamente</h3>
                <h1 class="text-center">{{$countregulamente}}</h1>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <a href="{{URL("/admin/admiterea")}}">
            <div class="admitereahome patrat">
                <p class="imagehome">
                    <img src="{{asset("allimages/system/admitereahome.png")}}" class="img-responsive"/>
                </p>
                <h3 class="text-center">Admiterea</h3>
                <h1 class="text-center">{{$countadmiterea}}</h1>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <a href="{{URL("/admin/galerie")}}">
            <div class="galeriehome patrat">
                <p class="imagehome">
                    <img src="{{asset("allimages/system/galeriehome.png")}}" class="img-responsive"/>
                </p>
                <h3 class="text-center">Galerie</h3>
                <h1 class="text-center">{{$countgalerie}}</h1>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
        <a href="{{URL("/admin/orar")}}">
            <div class="orarhome patrat">
                <p class="imagehome">
                    <img src="{{asset("allimages/system/orarhome.png")}}" class="img-responsive"/>
                </p>
                <h3 class="text-center">Orar,</h3>
                <h3 class="text-center">Activitati lunare</h3>
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
@endsection
