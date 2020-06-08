<!DOCTYPE html>
<html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<head>
	<title>Theaters</title>
	<link rel="stylesheet" type="text/css" href="<?php echo yii\helpers\Url::base()?>/css/theater.css">
</head>
<script type="text/javascript">
function updateTheaterList(cityID)
{
	// alert("ok!");
	var selectElement = document.getElementById("city");
	var selectedIndex = selectElement.options[selectElement.selectedIndex].value;

	var theaterList = <?php echo json_encode($theater) ?>;
	var selectedTheaterList = [];
	var selectedTheaterIndexList = [];
	var selectedTheaterAddressList = [];

	for(let i = 0; i < theaterList.length; i++) {
		if(theaterList[i]['city_id'] == selectedIndex) {
			selectedTheaterList.push(theaterList[i]['name']);
			selectedTheaterIndexList.push(theaterList[i]['id']);
			selectedTheaterAddressList.push(theaterList[i]['address']);
		}
	}

	// var theaterSelect = document.getElementById("mall");
	// theaterSelect.options.length = 0;
	// for(let i = 0; i < selectedTheaterList.length; i++) {
	// 	theaterSelect.options[theaterSelect.options.length] = new Option(selectedTheaterList[i], i);
	// }

	var theater_ul = document.getElementById("theater");
	theater_ul.innerHTML = "";
	for(let i = 0; i < selectedTheaterList.length; i++ ) {
		var anchor = document.createElement("a");
		anchor.appendChild(document.createTextNode(selectedTheaterList[i]));
		anchor.href = "<?php echo yii\helpers\Url::base() . '/theater/view?id='; ?>" + selectedTheaterIndexList[i];
		theater_ul.appendChild(anchor);
		theater_ul.appendChild(document.createElement("br"));
		theater_ul.appendChild(document.createTextNode(selectedTheaterAddressList[i]))
		theater_ul.appendChild(document.createElement("br"));
		theater_ul.appendChild(document.createElement("br"));
	}

}
</script>
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
			 <!-- <a class="nav-item nav-link active" disabled>Now Playing <span class="sr-only">(current)</span></a>
       <a class="nav-item nav-link active" disabled>Upcoming <span class="sr-only">(current)</span></a> -->
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



<!-- <form method="get"> -->
	<select id="city" class="dropdown" onchange=" return updateTheaterList();">
		<option disabled selected value style="display:none;">-- select a city --</option>
		<?php
			for($i = 0; $i < count($city); $i++) {
				echo '<option value="' . $city[$i]['id'] . '">' . $city[$i]['name'] . '</option>';
			}
		?>
	</select>

	<!-- <select id="mall" class="mall" size="5">
	</select> -->

	<ul id="theater" class="mall"></ul>

<!-- </form> -->



<footer>
	<p>Created by Kelompok xxx | Lukabapak 2020</p>
</footer>

</body>
</html>
