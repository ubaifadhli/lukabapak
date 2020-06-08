<!DOCTYPE html>
<html>
<head>
	<title>Description</title>
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!-- icon -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--css  -->
	<link rel="stylesheet" type="text/css" href="<?php echo yii\helpers\Url::base()?>/css/movie_detail.css">

</head>
<body>
	<!-- navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- <a class="navbar-brand mb-0 h1" href="<?php echo yii\helpers\Url::home()?>">Lukabapak</a> -->
  <div class="navbar-logo">
   <img src="<?php echo yii\helpers\Url::base()?>/assets/images/logo1.jpeg"> 
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
        <a class="nav-link" href="<?php echo yii\helpers\Url::base()?>/site/login">Login <span class="sr-only">(current)</span></a>
      </li>

    </ul>
  </div>
</nav>
<!-- navbar -->




<div class="box">
	<div class="imgBox">
		<h5><?php echo ($model->status_id == 1) ? 'Now Playing' : 'Upcoming'; ?></h5>
		<img src="<?php echo '/assets/images/' . $model->image_path; ?>">
	</div>
	<div class="content">
		<div class="description">
			<h4><?php echo $model->title; ?></h4>
			<p>Jenis Film : <?php echo $model->genre; ?></p>
			<p>Sutradara : <?php echo $model->director_name; ?></p>
			<p>Produksi : <?php echo $model->studio_name; ?></p>
		</div>
		<h2>Sinopsis</h2>
		<p><?php echo $model->synopsis; ?></p>
		<div class="time">
		<table>
			<tr>
				<td><p>Pesan Tiket : </p></td>
				<?php
						for($i = 0; $i < count($schedule); $i++) {
							echo '<td><a class="btn btn-dark" href="' . yii\helpers\Url::base() . '/movie-reservation/create?schedule_id=' . $schedule[0]['id'] . '">' . $schedule[$i]['date'] . '</button></td>';
						}
				?>

			</tr>
		</table>
	</div>
	</div>
</div>



<footer>
	<p>Created by Kelompok xxx | Lukabapak 2020</p>
</footer>


</body>
</html>
