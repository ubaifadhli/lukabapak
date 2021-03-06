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
 <!--  <a class="navbar-brand mb-0 h1" href="<?php echo yii\helpers\Url::base()?>">Lukabapak</a> -->
 <div class="navbar-logo">
   <a href="<?php echo yii\helpers\Url::home()?>"><img src="<?php echo yii\helpers\Url::base()?>/assets/images/logo1.jpeg"></a> 
 </div>

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
        <a class="nav-link" href="<?php echo yii\helpers\Url::base() . isset($_SESSION['user_id']) ? '/site/profile' : '/site/login' ?>">
          <?php echo (isset($_SESSION['user_id'])) ? $_SESSION['name'] : 'Login'; ?>
          <span class="sr-only">(current)</span>
        </a>
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
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo yii\helpers\Url::base()?>/assets/images/carousel1.jpeg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo yii\helpers\Url::base()?>/assets/images/carousel2.jpeg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
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
				<a href="<?php echo yii\helpers\Url::base() . '/movie/view?id=' . $movie_nowplaying[0]['id'] ?>" class="movie-title">
        <img src="<?php echo yii\helpers\Url::base() . '/assets/images/' . $movie_nowplaying[0]['image_path']?>" class="img-responsive image-resize">
				<?php echo $movie_nowplaying[0]['title'] ?>
				</a>
				<!-- <a href="<?php //echo yii\helpers\Url::base() . '/movie/view?id=' . $movie_nowplaying[0]['id'] ?>" class="movie-title"><?php echo $movie_nowplaying[0]['title'] ?></a> -->
      </div>
      <div class="col-md-4">
				<a href="<?php echo yii\helpers\Url::base() . '/movie/view?id=' . $movie_nowplaying[1]['id'] ?>" class="movie-title">
        <img src="<?php echo yii\helpers\Url::base() . '/assets/images/'  . $movie_nowplaying[1]['image_path']?>" class="img-responsive image-resize">
        <?php echo $movie_nowplaying[1]['title'] ?>
				</a>
			</div>
      <div class="col-md-4">
				<a href="<?php echo yii\helpers\Url::base() . '/movie/view?id=' . $movie_nowplaying[2]['id'] ?>" class="movie-title">
        <img src="<?php echo yii\helpers\Url::base() . '/assets/images/'  . $movie_nowplaying[2]['image_path']?>" class="img-responsive image-resize">
        <?php echo $movie_nowplaying[2]['title'] ?>
				</a>
			</div>
    </div>
  </div>
</div>

<div class="wrapper" id="upcoming">
	<h1>Upcoming</h1>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
				<a href="<?php echo yii\helpers\Url::base() . '/movie/view?id=' . $movie_upcoming[0]['id'] ?>" class="movie-title">
        <img src="<?php echo yii\helpers\Url::base() . '/assets/images/' . $movie_upcoming[0]['image_path']?>" class="img-responsive image-resize">
        <?php echo $movie_upcoming[0]['title'] ?>
				</a>
			</div>
      <div class="col-md-4">
				<a href="<?php echo yii\helpers\Url::base() . '/movie/view?id=' . $movie_upcoming[1]['id'] ?>" class="movie-title">
        <img src="<?php echo yii\helpers\Url::base() . '/assets/images/' . $movie_upcoming[1]['image_path']?>" class="img-responsive image-resize">
        <?php echo $movie_upcoming[1]['title'] ?>
				</a>
			</div>
      <div class="col-md-4">
				<a href="<?php echo yii\helpers\Url::base() . '/movie/view?id=' . $movie_upcoming[2]['id'] ?>" class="movie-title">
        <img src="<?php echo yii\helpers\Url::base() . '/assets/images/' . $movie_upcoming[2]['image_path']?>" class="img-responsive image-resize">
        <?php echo $movie_upcoming[2]['title'] ?>
				</a>
			</div>
    </div>
  </div>
</div>

<footer>
	<p>Created by Kelompok xxx | Lukabapak 2020</p>
</footer>


</body>
</html>
