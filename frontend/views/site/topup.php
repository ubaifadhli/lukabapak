<!DOCTYPE html>
<html>
<head>
	<title>Top Up</title>
</head>
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!-- icon -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--css  -->
	<link rel="stylesheet" type="text/css" href="<?php echo yii\helpers\Url::base()?>/css/topup.css">


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


<form action="<?php echo yii\helpers\Url::base()?>/site/process-topup" method="get">
<div class="margin">

	<h3>Top Up</h3>
	<h5>Top Up ke</h5>


<div class="balance">
	<h3>M-Bapak</h3>
	<p>Saldo Rp500.000</p>
</div>

<!-- <div class="min-topup">
	<h5>Pilih Nominal Top Up</h5>
	<table>
		<tr>
			<td><button>Rp50.000</button></td>
			<td><button>Rp100.000</button></td>
			<td><button>Rp150.000</button></td>
		</tr>
	</table>
</div> -->

<div class="nominal">
	<p>Atau masukkan nominal disini</p>
	<div class="minimal">
		<input type="text" name="balance" placeholder="Minimal Rp10.000">
	</div>
</div>


	<div class="payment-method">
		<h5>Pillih Pembayaran</h5>
		<table>
			<tr>
				<td><a href="#" class="btn btn-lg btn-outline-dark" data-toggle="button">ATM</a></td>
				<td><a href="#" class="btn btn-lg btn-outline-dark" data-toggle="button">Internet / Mobile Banking</a></td>
			</tr>
		</table>
	</div>

	<div class="final">
		<button>TOP UP</button>
	</div>
</form>

</div>



<footer>
	<p>Created by Kelompok xxx | Lukabapak 2020</p>
</footer>


</body>
</html>
