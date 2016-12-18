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
        <script src="{{ asset("https://maps.googleapis.com/maps/api/js?callback=myMap") }}"></script>
        <link href="{{ asset('adminstyle/admin.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet" >
        <link href="{{ asset("css/style.css") }}" rel="stylesheet" >
        <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css">
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
					<a href="{{URL("/")}}"> <img src="{{ asset ( "images/Logo.png" ) }}"></a>
					<div class="name-site">
						școala profesionala nr.1 cahul
					</div>
				</div>
			</div>
		</div>
		<!-- menu top-->
		<nav class="navbar navbar-inverse col-md-12">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				  </button>
				  <a class="navbar-brand active" href="{{URL("/")}}">HOME</a>
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
		<div class="row">
			<div class="block slideshoow col-md-12">
				<img src="{{ asset ( "images/font.jpg" ) }}">
			</div>
		</div>
                <div class="row posts">
			<div class="col-md-12 content">
				<div class="col-md-10 main-posts">
                                    @yield("content")
				</div>
				<div class="col-md-2 right-menu">
						<h3>Menu</h3>
						<ul>
							<li><a href="#home">Home</a></li>
							<li><a href="#news">News</a></li>
							<li><a href="#contact">Contact</a></li>
							<li><a href="#about">About</a></li>
						</ul>
				</div>
			</div>
		</div>
		<div class="partnership">
			
		</div>
		<div class="row posts">
			<div class="col-md-12 block footer">
                            <address>Scoala Profesională Nr.1 Cahul</address>
                        </div>
		</div>
    </body>
</html>