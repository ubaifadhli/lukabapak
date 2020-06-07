<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!-- icon -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--css  -->
	<link rel="stylesheet" type="text/css" href="<?php echo yii\helpers\Url::base()?>/css/register.css">

</head>
<body>
<!-- navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand mb-0 h1" href="#">Lukabapak</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <ul class="navbar-nav ml-auto">
    <div class="icon">
      <i class="material-icons">account_circle</i>
     </div> 
     <li class="nav-item active">
        <a class="nav-link" href="#">Login <span class="sr-only">(current)</span></a>
      </li>
     
    </ul>
  </div>
</nav>
<!-- navbar -->

	<div class="container">
		
	</div>



<div class="container">
	<div class="left"></div>
	<div class="right">
		<div class="formBox">	
			<h1 class="title1">Create your account!</h1>
            <h5 class="title2">Sign up to get latest movie in your area.</h5>
            
            <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'name') ?>

				<?= $form->field($model, 'email') ?>

				<?= $form->field($model, 'password') ?>

				<div class="form-group">
				<?= Html::submitButton('Register', ['class' => 'btn btn-primary']) ?>
			</div>
			<?php ActiveForm::end(); ?>

			<!-- <form action="" method="">
				<div class="name">
					<input type="text" name="name" placeholder="Name"><br>
				</div>
				<div class="email">
					<input type="email" name="email" placeholder="Email"><br>
				</div>
				<div class="password">
					<input type="password" name="password" placeholder="Password"><br>
				</div>
				<button name="submit" value="submit" class="orderbtn">Register</button>
			</form>	 -->
	</div>
</div>
</div>

<footer>
	<p>Created by Kelompok xxx | Lukabapak 2020</p>
</footer>

</body>
</html>