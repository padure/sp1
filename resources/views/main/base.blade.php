<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SP1 Cahul</title>
        <script src="{{ asset("js/jquery.min.js") }}"></script>
        <script src="{{ asset("js/bootstrap.min.js") }}"></script>
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
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Despre noi</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Misiune și viziune</a></li>
                                                    <li><a href="#">Plan de dezvoltare școlară</a></li>
                                                    <li><a href="#">Organigrama instituției</a></li>
                                                    <li><a href="#">Administrația</a></li>
                                                    <li><a href="#">Corpul didactic</a></li>
                                               </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Regulamente</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Regulamentul intern de activitate al școlii profesionale</a></li>
                                                    <li><a href="#">Regulamentul de activitate al consiliului de administrație</a></li>
                                                    <li><a href="#">Regulamentul consiliului elevilor</a></li>
                                                    <li><a href="#">Regulamentul privind modul și condițiile de cazare</a></li>
                                                    <li><a href="#">Regulamentul de activitate a căminurilor</a></li>
                                               </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Admiterea</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Regulamentul de admitere</a></li>
                                                    <li><a href="#">Planul de înmatriculare</a></li>
                                               </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Parteneriate</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Parteneri educaționali</a></li>
                                                    <li><a href="#">Parteneri naționali</a></li>
                                                    <li><a href="#">Parteneri internaționali</a></li>
                                                    <li><a href="#">Agenți economici</a></li>
                                               </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Elevi</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Elevi absolvenți</a></li>
                                                    <li><a href="#">Chestionar pentru elevi</a></li>
                                               </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >Galerie</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Activitați extracurs</a></li>
                                                    <li><a href="#">Decada meseriilor</a></li>
                                                    <li><a href="#">Alte activitați</a></li>
                                               </ul>
                                        </li>
					<li><a href="#">Contacte</a></li>
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