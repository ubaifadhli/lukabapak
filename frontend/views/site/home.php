<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="<?php echo yii\helpers\Url::base()?>/css/home.css">

</head>
<body>
	<!-- navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand mb-0 h1" href="<?php echo yii\helpers\Url::base()?>">Lukabapak</a>


    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

     <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
  	 <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#now_playing">Now Playing <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="#upcoming">Upcoming <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="<?php echo yii\helpers\Url::base()?>/site/theater">Theaters <span class="sr-only">(current)</span></a>
    </div>

    <ul class="navbar-nav ml-auto">
    <div class="icon">
      <i class="material-icons">account_circle</i>
     </div>
     <li class="nav-item active">
        <a class="nav-link" href="<?php echo yii\helpers\Url::base()?>/site/login">Login <span class="sr-only">(current)</span></a>
      </li>

    </ul>
  </div>
</nav>
<!-- navbar -->


			<!-- carousel -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo yii\helpers\Url::base()?>/assets/images/car3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>OBLIVION</h5>
        <p>Oblivion takes place in 2077, on an Earth devastated by war with extraterrestrials that has caused humanity to relocate itself to Titan. </p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo yii\helpers\Url::base()?>/assets/images/car2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo yii\helpers\Url::base()?>/assets/images/car1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- carousel -->



<div class="wrapper" id="now_playing">
	<h1>Now Playing</h1>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <img src="<?php echo yii\helpers\Url::base()?>/assets/images/np1.jpg" class="img-responsive image-resize">
        <a href="" class="movie-title">EXTRACTION</a>
      </div>
      <div class="col-md-4">
        <img src="<?php echo yii\helpers\Url::base()?>/assets/images/np2.jpg" class="img-responsive image-resize">
        <a href="" class="movie-title">AVENGERS ENDGAME</a>
      </div>
      <div class="col-md-4">
        <img src="<?php echo yii\helpers\Url::base()?>/assets/images/np3.jpg" class="img-responsive image-resize">
        <a href="" class="movie-title">INCEPTION</a>
      </div>
    </div>
  </div>
</div>

<div class="wrapper" id="upcoming">
	<h1>Upcoming</h1>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <img src="<?php echo yii\helpers\Url::base()?>/assets/images/np1.jpg" class="img-responsive image-resize">
        <a href="" class="movie-title">EXTRACTION</a>
      </div>
      <div class="col-md-4">
        <img src="<?php echo yii\helpers\Url::base()?>/assets/images/np2.jpg" class="img-responsive image-resize">
        <a href="" class="movie-title">AVENGERS ENDGAME</a>
      </div>
      <div class="col-md-4">
        <img src="<?php echo yii\helpers\Url::base()?>/assets/images/np3.jpg" class="img-responsive image-resize">
        <a href="" class="movie-title">INCEPTION</a>
      </div>
    </div>
  </div>
</div>

<footer>
	<p>Created by Kelompok xxx | Lukabapak 2020</p>
</footer>


</body>
</html>
