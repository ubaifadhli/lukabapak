<!DOCTYPE html>
<html>
<head>
	<title>Choose Seat</title>
</head>
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!-- icon -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--css  -->
	<link rel="stylesheet" type="text/css" href="<?php echo yii\helpers\Url::base()?>/css/create_reservation.css">

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

<div class="title">
	<h5>Choose Seat : </h5>
</div>

<div class="mall">
	<h5><?= $schedule[0]['name'] ?></h5>
	<p><?= $schedule[0]['date'] ?></p>
</div>

<div class="seat">
	<table>
		<tr>
			<th></th>
			<th>A</th>
			<th>B</th>
			<th>C</th>
			<th>D</th>
			<th>E</th>
			<th>F</th>
		</tr>

		<form action="<?php echo yii\helpers\Url::base()?>/movie-reservation/finish-payment" method="get">

		<?php
			$seatCount = 0;

			for($i = 1; $i <= 5; $i++) {
				echo '<tr>';
				echo '<td>' . $i . '</td>';
				for($j = 0; $j <= 5; $j++) {
					$disabled = ($scheduleSeat[$seatCount]['availability'] == 0) ? "disabled " : "";
					echo '<td><input type="checkbox" ' . $disabled . 'name="seat[]" value="' . $scheduleSeat[$seatCount]['id'] . '"></td>'; // strval(chr(65 + $j) . $i)
					$seatCount++;
				}
				echo '</tr>';
			}
		?>



	</table>
</div>

<div class="sign">
<table>
	<tr><div></tr>
			<td><input type="checkbox" id="available">  <label for="available">Available</label></div></td>
	<tr><div></tr>
			<td><input type="checkbox" id="sold" disabled>  <label for="sold">Sold</label></div></td>
	<tr><div></tr>
			<td><input type="checkbox" id="selected" checked>  <label for="selected">Selected</label></div></td>
</table>

</div>

<div>
	<br>
	<input type="hidden" name="schedule_id" value="<?php echo $_GET["schedule_id"] ?>">
	<input type="submit" class="btn btn-dark" value="Next">

</div>

</form>

 </div>

<footer>
	<p>Created by Kelompok xxx | Lukabapak 2020</p>
</footer>

</body>
</html>
