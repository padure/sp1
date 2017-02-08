<!DOCTYPE html> 
<html> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SP1 Cahul</title>
        <script src="{{ asset("js/jquery.min.js") }}"></script>
        <script src="{{ asset("js/bootstrap.min.js") }}"></script>
        <script src="{{ asset("js/myjs.js") }}"></script>
        <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet" >
        <link href="{{ asset("css/style.css") }}" rel="stylesheet" >
        <link href="{{ asset("css/bootstrap-theme.min.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ asset("css/w3.css") }}" rel="stylesheet" type="text/css">
        
        
	<link href="{{ asset("css/lightbox.min.css") }}" rel="stylesheet">
        <!--Parteneriati -->
        <link href="{{ asset("css/flexisel.css") }}" rel="stylesheet">
        <script src="{{ asset("js/jquery.flexisel.js") }}"></script>
        
        <!--Icons -->
        <link rel="stylesheet" href="{{ asset("css/font-awesome.min.css") }}">
        <!-- token-->
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <script type="text/javascript">
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
        </script>
        
    </head>
    <body>
        <div class="container main">
            <div class="row">
                <div class="col-md-12">
                        <div class="logo">
                            <?php
                                $logoname=  App\Logoname::getInfo(); 
                            ?>
                                <a href="{{URL("/")}}"> 
                                    @if(!empty($logoname["logo"]))
                                        <img src="{{ asset ( $logoname["logo"]->valuevariable ) }}">
                                    @else
                                        home
                                    @endif
                                </a>
                                <div class="name-site">
                                    @if(!empty($logoname["namesite"]))
                                        {{$logoname["namesite"]->valuevariable}}
                                    @endif
                                </div>
                        </div>
                </div>
            </div>
		<!-- menu top-->
            <div class="row my-nave">
		<nav class="navbar navbar-inverse col-md-12" style=" margin-bottom: 0px;">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				  </button>
				  <a class="navbar-brand actives" href="{{URL("/")}}">HOME</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
                                    <ul class="nav navbar-nav">
					<li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Meserii</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{URL("/meserii/operator-suport-tehnic")}}">Operator pentru suport tehnic al calculatoarelor</a></li>
                                                    <li><a href="{{URL("/meserii/controleor-produse-alimentare")}}">Controlor produse alimentare</a></li>
                                                    <li><a href="{{URL("/meserii/bucatar-chelner")}}">Bucatar/Chelner</a></li>
                                                    <li><a href="{{URL("/meserii/croitor-confectioner")}}">Croitor confecționer înbrăcăminte la comandă - cusător</a></li>
                                                    <li><a href="{{URL("/meserii/cofetar")}}">Cofetar</a></li>
                                               </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Despre noi</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{URL("/despre-noi/misiune-viziune")}}">Misiune și viziune</a></li>
                                                    <li><a href="{{URL("/despre-noi/plan-dezvoltare-scoala")}}">Plan de dezvoltare școlară</a></li>
                                                    <li><a href="{{URL("/despre-noi/organigrama-institutiei")}}">Organigrama instituției</a></li>
                                                    <li><a href="{{URL("/despre-noi/administratia")}}">Administrația</a></li>
                                                    <li><a href="{{URL("/despre-noi/corp-didactic")}}">Corpul didactic</a></li>
                                               </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Regulamente/Rapoarte</a>
                                            <?php 
                                                $regulamente=  App\Regulamente::getRegulamente();
                                            ?>
                                            @if(!empty($regulamente) && count($regulamente) >0)
                                                <ul class="dropdown-menu">
                                                    @foreach($regulamente as $i)
                                                        <li>
                                                            <a href="{{URL("regulamente/".$i->id)}}">
                                                                {{$i->nume}}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                               </ul>
                                            @endif
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Admiterea</a>
                                            <?php 
                                                $admiterea= App\Admiterea::getAdmiterea();
                                            ?>
                                            @if(!empty($admiterea) && count($admiterea) >0)
                                                <ul class="dropdown-menu">
                                                    @foreach($admiterea as $i)
                                                        <li>
                                                            <a href="{{URL("admitere/".$i->id)}}">
                                                                {{$i->nume}}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                               </ul>
                                            @endif
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Parteneriate</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{URL("parteneriate/0")}}">Parteneri educaționali</a></li>
                                                    <li><a href="{{URL("parteneriate/1")}}">Parteneri naționali</a></li>
                                                    <li><a href="{{URL("parteneriate/2")}}">Parteneri internaționali</a></li>
                                               </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Elevi</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{URL("elevi/absolventi")}}">Elevi absolvenți</a></li>
                                                    <li><a href="{{URL("https://goo.gl/forms/UX6yP9FPyJtcf0xi2")}}">Chestionar elevi absolvenți</a></li>
                                               </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Galerie</a>
                                            <?php 
                                                $galerie= App\Galerie::getGalerie();
                                            ?>
                                            @if(!empty($galerie))
                                                <ul class="dropdown-menu">
                                                    @foreach($galerie as $i)
                                                        <li>
                                                            <a href="{{URL("galerie/".$i->id)}}">
                                                                {{$i->name}}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                    <li><a href="{{URL("/video")}}">Video</a></li>
                                               </ul>
                                            @endif
                                            
                                        </li>
					<li><a href="{{URL("contacte")}}">Contacte</a></li>
				  </ul>
				</div>
			  </div> 
		</nav>
               </div>
        <?php 
            $slideshowimages=App\Slideshow::getSlideshow(); 
        ?>
        @if(!empty($slideshowimages) && count($slideshowimages)>0)
        <div class="row my-slide">
            <div class="row">
                <div id="carousel" class="carousel slide">
                <!--indicatore a slaidurilor -->
                    <ol class="carousel-indicators">
                        @for($i=0;$i < count($slideshowimages);$i++)
                            @if($i==0)
                                <li class="active" data-target="#carousel" data-slide-to="{{$i}}"></li>
                            @else
                                <li data-target="#carousel" data-slide-to="{{$i}}"></li>
                            @endif
                        @endfor	
                    </ol>
                    <!--Slaiduri-->
                    <div class="carousel-inner">
                        @foreach($slideshowimages as $i)
                            @if($i->id==$slideshowimages[0]->id)
                                <div class="item active">
                                    <img src="{{ asset ( $i->slideimage ) }}" alt="Imaginea lipseste">
                                </div>
                            @else
                                <div class="item">
                                    <img src="{{ asset ( $i->slideimage ) }}" alt="Imaginea lipseste">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <!--Sagetile de pornire a slaidului -->
                    <a href="#carousel" class="left carousel-control" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>	
                    </a>
                    <a href="#carousel" class="right carousel-control" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
        @endif  
    </div>
        <div class="container">
            <div class="row posts">
                <div class="col-md-12 content">
                    <div class="col-md-10 main-posts" id="getheight">
                        @yield("content")
                    </div>
                    <div id="setheight" class="col-md-2 col-xs-12 whiteclass" style="border-left: 1px solid #333; padding:0px;float: right;">
                        <div class="right-menu ">
                                    <h3>Menu</h3>
                                    <ul>
                                            <li><a href="{{URL("/activitati-lunare")}}">Activitati lunare</a></li>
                                            <li class="right-orar"><a style="cursor: pointer;">Orar</a></li>
                                            <ul class="orar">
                                                <li><a href="{{URL("/orar")}}">Orar</a></li>
                                                <li><a href="{{URL("/orar-modificat")}}">Orar modificat</a></li>
                                            </ul>
                                            <li><a href="{{URL("/intrebari-raspunsuri")}}">Intrebari și raspunsuri</a></li>
                                    </ul>
                        </div>
                        <div class="my-link ">
                            <h3>Link-uri utile</h3>
                            <ul>
                                <a href="{{URL("http://ctice.md/ctice2013/")}}" target="_blank">
                                    <li>Ctice</li>
                                </a>
                                <a href="{{URL("http://www.edu.gov.md/")}}" target="_blank">
                                    <li>Ministerul Educatiei al RM</li>
                                </a>
                                <a href="{{URL("http://www.aee.edu.md/")}}" target="_blank">
                                    <li>Agenţia Naţională pentru Curriculum şi Evaluare</li>
                                </a>
                                <a href="{{URL("http://ctice.md/ctice2013/")}}" target="_blank">
                                    <li>About</li>
                                </a>
                            </ul>               
                        </div>
                    </div>
                </div>
            </div>
            <!--Parteneriati -->
            <?php 
                $parteneriati=App\Parteneriati::getParteneriati(); 
            ?>
            @if(!empty($parteneriati) && count($parteneriati)>0)
                <ul id="flexiselDemo3">
                    @foreach($parteneriati as $i)
                        <li>
                            <a href="{{$i->link}}" target="_blank">
                                <img src="{{asset($i->image)}}" />
                            </a>
                        </li>   
                    @endforeach
                </ul>
            @endif
            <div class="row posts polaroid" style="float: left;width: 100%;">
                <div class="col-md-12 block footer">
                    <div class="col-md-12">
                    <address>&#169; 
                                    @if(!empty($logoname["namesite"]))
                                        {{$logoname["namesite"]->valuevariable}}
                                    @endif
                    </address>
                    
                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true" style=""></span>
                    <b>Despre</b>
                    <ul>
                        <li>R. Moldova, or.Cahul, </li>
                        <li>str. M.Solohov, 40. </li>
                        <li>0 (299) 8-10-75</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <b>Sula Valentin</b>
                        <b>Pădure Gheorghe</b>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        /*Parteneriati scroll*/
        $(window).load(function() {
            $("#flexiselDemo3").flexisel({
                visibleItems: 5,
                itemsToScroll: 1,         
                autoPlay: {
                    enable: true,
                    interval: 3000,
                    pauseOnHover: true
                }        
            });
            if($("#getheight").height()>$("#setheight").height()){
                $("#setheight").height($("#getheight").height()-15);
            }
        });
        
        $(document).ready(function() {
            $('#carousel').carousel({
                interval: 3000
            });
        });
        $(document).ready(function(){
             $(".right-orar").click(function(){
                $(".orar").toggle();
            });
        });
        
    </script>
</html>
