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
        <a class="nav-link" href="<?php echo yii\helpers\Url::base()?>/site/login">Login <span class="sr-only">(current)</span></a>
      </li>

    </ul>
  </div>
</nav>
<!-- navbar -->

<div class="title">
	<h5>Choose Seat</h5>
</div>

<div class="mall">
	<h5>Galaxy Mall</h5>
	<p>Senin,25 Maret 2020</p>
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

		<tr class="row1">
			<td>1</td>
			<td><button>A1</button></td>
			<td><button>B1</button></td>
			<td><button>C1</button></td>
			<td><button>D1</button></td>
			<td><button>E1</button></td>
			<td><button>F1</button></td>
		</tr>


		<tr>
			<td>2</td>
			<td><button>A2</button></td>
			<td><button>B2</button></td>
			<td><button>C2</button></td>
			<td><button>D2</button></td>
			<td><button>E2</button></td>
			<td><button>F2</button></td>
		</tr>

		<tr>
			<td>3</td>
			<td><button>A3</button></td>
			<td><button>B3</button></td>
			<td><button>C3</button></td>
			<td><button>D3</button></td>
			<td><button>E3</button></td>
			<td><button>F3</button></td>
		</tr>

		<tr>
			<td>4</td>
			<td><button>A4</button></td>
			<td><button>B4</button></td>
			<td><button>C4</button></td>
			<td><button>D4</button></td>
			<td><button>E4</button></td>
			<td><button>F4</button></td>
		</tr>

		<tr>
			<td>5</td>
			<td><button>A5</button></td>
			<td><button>B5</button></td>
			<td><button>C5</button></td>
			<td><button>D5</button></td>
			<td><button>E5</button></td>
			<td><button>F5</button></td>
		</tr>
	</table>
</div>


 <div class="sign">
 	<table>
 		<td><div class="square"></td>
 			<td><p>Available</p></div></td>
 		<td><div class="square2"></td>
 			<td><p>Sold</p></div></td>
 	</table>

 </div>

 <
 <button class="next">NEXT</button>


 </div>

<footer>
	<p>Created by Kelompok xxx | Lukabapak 2020</p>
</footer>

</body>
</html>
