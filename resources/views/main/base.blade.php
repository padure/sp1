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
        <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/w3.css') }}" rel="stylesheet" type="text/css">
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
					<a href="{{URL("/")}}"> <img src="{{ asset ( $logoname["logo"]->valuevariable ) }}"></a>
					<div class="name-site">
                                            {{$logoname["namesite"]->valuevariable}}
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
                                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Regulamente</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{URL("regulamente/regulament-intern-activitate-scoala")}}">Regulamentul intern de activitate al școlii profesionale</a></li>
                                                    <li><a href="{{URL("regulamente/regulament-activitate-consiliu-admin")}}">Regulamentul de activitate al consiliului de administrație</a></li>
                                                    <li><a href="{{URL("regulamente/regulament-consiliu-elevi")}}">Regulamentul consiliului elevilor</a></li>
                                                    <li><a href="{{URL("regulamente/regulament-modul-cazare")}}">Regulamentul privind modul și condițiile de cazare</a></li>
                                                    <li><a href="{{URL("regulamente/regulament-activitate-camine")}}">Regulamentul de activitate a căminurilor</a></li>
                                               </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Admiterea</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{URL("admitere/regulamentul-admitere")}}">Regulamentul de admitere</a></li>
                                                    <li><a href="{{URL("admitere/plan-inmatriculare")}}">Planul de înmatriculare</a></li>
                                               </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Parteneriate</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{URL("parteneriate/parteneri-educationali")}}">Parteneri educaționali</a></li>
                                                    <li><a href="{{URL("parteneriate/parteneri-nationali")}}">Parteneri naționali</a></li>
                                                    <li><a href="{{URL("parteneriate/parteneri-internationali")}}">Parteneri internaționali</a></li>
                                                    <li><a href="{{URL("parteneriate/agenti-economici")}}">Agenți economici</a></li>
                                               </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Elevi</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{URL("elevi/absolventi")}}">Elevi absolvenți</a></li>
                                                    <li><a href="{{URL("https://goo.gl/forms/UX6yP9FPyJtcf0xi2")}}">Chestionar pentru elevi</a></li>
                                               </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Galerie</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{URL("galerie/activitati-extracurs")}}">Activitați extracurs</a></li>
                                                    <li><a href="{{URL("galerie/decada-meseriilor")}}">Decada meseriilor</a></li>
                                                    <li><a href="{{URL("galerie/alte-activitati")}}">Alte activitați</a></li>
                                               </ul>
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
                <div class="row posts">
			<div class="col-md-12 content">
				<div class="col-md-10 main-posts">
                                    @yield("content")
				</div>
				<div class="col-md-2 right-menu">
						<h3>Menu</h3>
						<ul>
							<li><a href="#">Activitati lunare</a></li>
							<li class="right-orar"><a>Orar</a></li>
                                                        <ul class="orar">
                                                            <li><a href="">Orar</a></li>
                                                            <li><a href="">Orar modificat</a></li>
                                                        </ul>
							<li><a href="#">Forum</a></li>
							<li><a href="#">Intrebari și raspunsuri</a></li>
						</ul>
                                </div>
                            <div class="col-md-2 my-link pull-right">
                                
                                     <h3>Link-uri utile</h3>
						<ul>
							<li><a href="{{URL("http://ctice.md/ctice2013/")}}">Ctice</a></li>
							<li><a href="{{URL("http://www.edu.gov.md/")}}">Ministerul Educatiei al RM</a></li>
							<li><a href="{{URL("http://www.aee.edu.md/")}}">Agenţia Naţională pentru Curriculum şi Evaluare</a></li>
							<li><a href="{{URL("http://ctice.md/ctice2013/")}}">About</a></li>
						</ul>               
				</div>
			</div>
		</div>
		<div class="partnership">
                    <div>
                        <a href="{{URL("http://www.edu.gov.md/")}}"><img src="{{ asset ( "images/partnership/03_logo.png" ) }}"  /></a>
                    </div>
                    <div>
                       <a href="{{URL("http://www.edu.gov.md/")}}"><img src="{{ asset ( "images/partnership/COMPANII TIC.jpg" ) }}" /></a>
                    </div>
                    <div>
                        <a href="{{URL("http://www.edu.gov.md/")}}"><img src="{{ asset ( "images/partnership/tricon.png" ) }}" /></a>
                    </div>
                    <div>
                        <a href="{{URL("http://www.edu.gov.md/")}}"><img src="{{ asset ( "images/partnership/andy.png" ) }}" /></a>
                    </div>
                    <div style="border-right: 1px solid transparent;">
                       <a href="{{URL("http://www.edu.gov.md/")}}"><img src="{{ asset ( "images/partnership/usaid-logo.jpeg" ) }}" /></a>
                    </div>
		</div>
		<div class="row posts">
			<div class="col-md-12 block footer">
                            <address>Scoala Profesională Nr.1 Cahul</address>
                        </div>
		</div>
    </body>
    <script>
        $(document).ready(function(){
             $(".right-orar").click(function(){
                $(".orar").toggle();
    });
});
    </script>
</html>