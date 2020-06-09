<!DOCTYPE html>
<html>
<head>
	<title>Schedule</title>
</head>
<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!-- icon -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--css  -->
	<link rel="stylesheet" type="text/css" href="<?php echo yii\helpers\Url::base()?>/css/theater_current_movie.css">

<body>
	<!-- navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-logo">
   <a href="<?php echo yii\helpers\Url::home()?>"><img src="<?php echo yii\helpers\Url::base()?>/assets/images/logo1.jpeg"></a> 
 </div>


    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

     <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
  	 <div class="navbar-nav">
			 <!-- <a class="nav-item nav-link active" href="#">Now Playing <span class="sr-only">(current)</span></a>
       <a class="nav-item nav-link active" href="#">Upcoming <span class="sr-only">(current)</span></a> -->
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

<div class="mall">
	<h2><?= $model->name ?></h2>
	<p><?= $model->name ?></p>
	<p>Telephone : <?= $model->telephone_number ?></p>
</div>


<div class="movieBox">
	<img src="/assets/images/<?= $movie[0]['image_path'] ?>">
<div class="information">
	<div class="movie-title">
		<p><?= $movie[0]['title'] ?></p>
	</div>

	<div class="dimension">
		<p><?= $movie[0]['screen_quality'] ?></p>
	</div>

	<div class="category">
		<p><?= $movie[0]['rating'] ?></p>
	</div>

	<div class="time">
		<a class="btn btn-outline-dark"  href="<?php echo yii\helpers\Url::base() . '/movie/view?id=' . $movie[0]['id']?>">Movie Detail</a>
	</div>
</div>


	<div class="price">
		<h5>Rp <?= $movie[0]['price'] ?></h5>
	</div>

</div>

<footer>
	<p>Created by Kelompok xxx | Lukabapak 2020</p>
</footer>


</body>
</html>
