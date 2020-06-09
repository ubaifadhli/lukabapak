<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
</head>
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!-- icon -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--css  -->
	<link rel="stylesheet" type="text/css" href="<?php echo yii\helpers\Url::base()?>/css/profile.css">

<body>
	<!-- navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand mb-0 h1" href="#">Lukabapak</a>


    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

     <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
  	 <div class="navbar-nav">
      <a class="nav-item nav-link active" href="<?php echo yii\helpers\Url::base()?>/site/index#now_playing">Now Playing <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="<?php echo yii\helpers\Url::base()?>/site/index#upcoming">Upcoming <span class="sr-only">(current)</span></a>
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

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Edit Profile</h3>
			<table>
				<tr>
					<td><img src="<?php echo yii\helpers\Url::base()?>/assets/images/profile_picture.png"></td>
				</tr>
				<tr>	
					<td><button>Change Image</button></td>
				</tr>
			</table>	

			<table class="input-profile">
				<form action="<?php echo yii\helpers\Url::base()?>/site/edit-profile" method="get">
				<tr>
					<td><input type="text" name="name" placeholder="<?php echo $model['name'] ?>"></td>
				</tr>
				<tr>
					<td><input type="email" name="email" placeholder="<?php echo $model['email'] ?>"></td>
				</tr>
				<tr>
					<td><input disabled type="text" name="balance" placeholder="<?php echo 'Balance Rp' . $balance['balance'] ?>"></td>
					<td><a class="btn btn-dark" href="<?php echo yii\helpers\Url::base()?>/site/topup">Top Up</button></td>
				</tr>
				<tr>
					<td><input type="password" name="password" placeholder="Change Password"></td>
				</tr>
				<tr>
					<td><input type="password" name="confirm-password" placeholder="Confirm Password"></td>
				</tr>
				<tr>
					<div class="edit">
						<td><button>Edit</button></td>
					</div>
				</tr>
				</form>
			</table>
		</div>
	</div>
	<div class="title">
		<h3>Purchased Ticket</h3>
	</div>
	
			<div class="movie-image">
				<img src="<?php echo yii\helpers\Url::base()?>/assets/images/extraction.jpg">
			</div>
			<div class="border1">
				<h4>Terrace House</h4>
				<p>Kita akan mengikuti kisah Tyler Rake (Hemsworth), seorang tentara bayaran pasar gelap yang tak kenal takut. Dia sering menjalankan misi dari orang-orang besar atau berkuasa. Kala itu, sedang terjadi perseteruan antara raja narkoba India dan Banglades. Sepertinya salah satu anak dari raja narkoba tersebut telah diculik. Misi Tyler yaitu menyelamatkan Ovi, anak yang diculik tersebut.</p>
				<p><span class="material-icons">calendar_today</span>27 Mei 2020, 16:00 WIB</p>
				<p><span class="material-icons">room</span>Pakuwon Mall</p>
				<p><span class="material-icons">airline_seat_recline_normal</span>2 seats : B1</p>
			</div>
</div>


<footer>
	<p>Created by Kelompok xxx | Lukabapak 2020</p>
</footer>

</body>
</html>