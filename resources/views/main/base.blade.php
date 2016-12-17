@extends("main.include.header")
@section("header")
<div class="container main">
		<div class="row">
			<div class="col-md-12">
				<div class="logo">
					<a href="index.html"><img src="images/Logo.png"></a>
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
				  <a class="navbar-brand active" href="#">HOME</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				  <ul class="nav navbar-nav">
					<li><a href="#">Page 1</a></li>
					<li><a href="#">Page 2</a></li>
					<li><a href="#">Page 3</a></li>
					<li><a href="#">Page 4</a></li>
					<li><a href="#">Page 5</a></li>
					<li><a href="#">Page 6</a></li>
					<li><a href="#">Page 7</a></li>
					<li><a href="#">Page 8</a></li>
				  </ul>
				</div>
			  </div>
		</nav>
		<div class="row">
			<div class="block slideshoow col-md-12">
				<img src="images/font.jpg">
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