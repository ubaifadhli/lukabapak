<!DOCTYPE html>
<html>
<head>
	<title>Pay</title>
</head>
<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!-- icon -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--css  -->
	<link rel="stylesheet" type="text/css" href="<?php echo yii\helpers\Url::base()?>/css/finish_payment.css">

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
        <a class="nav-link" href="<?php echo yii\helpers\Url::base()?>/site/login">Login <span class="sr-only">(current)</span></a>
      </li>

    </ul>
  </div>
</nav>
<!-- navbar -->

<?php
	$seatCount = count($_GET['seat']);
	$totalPrice = intval($movie[0]['price']) * $seatCount;
	$scheduleID = $_GET['schedule_id'];

	$reservationFinalData = array([
		'totalPrice' => $totalPrice,
		'seatCount' => $seatCount,
		'scheduleID' => $scheduleID,
		]);
?>

<div class="title">
	<h5>Yuk Bayar!</h5>
</div>

<div class="rincian">
	<h5>Rincian Pesanan</h5>
	<p><?= $seatCount ?> Tickets</p>
</div>

<div class="saldo">

	<div class="ticket-detail">
		<span class="material-icons">
confirmation_number
</span><p class="movie-title"><?= $movie[0]['title'] ?></p>
			<p></p>
			<p><?= $schedule[0]['name'] ?></p>
			<p><?= $schedule[0]['date'] ?></p>
			<tr class="balance">
	</div>
		<h4>Balance : Rp <?= $user_balance[0]['balance'] ?></h4>
</div>

<div class="total">
 	<table>
 		<td><p class="subtotal">SUBTOTAL</p></td>
 		<td><p class="price">Rp <?= $totalPrice ?> (<?= $seatCount ?> Tickets)</p></td>
 		<!-- <td><button class="next">NEXT</button></td> -->
		<form action="<?php echo yii\helpers\Url::base()?>/movie-reservation/process-reservation/">
			<td><input type="submit" href="#"  class="next btn btn-dark" value="Next"></td>
		</form>
 	</table>

 </div>

<footer>
	<p>Created by Kelompok xxx | Lukabapak 2020</p>
</footer>

</body>
</html>
