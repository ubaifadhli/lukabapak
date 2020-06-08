<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!-- icon -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--css  -->
	<link rel="stylesheet" type="text/css" href="<?php echo yii\helpers\Url::base()?>/css/login.css">

</head>
<body>
<!-- navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 <div class="navbar-logo">
   <a href="<?php echo yii\helpers\Url::home()?>"><img src="<?php echo yii\helpers\Url::base()?>/assets/images/logo1.jpeg"></a> 
 </div>

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
        <a class="nav-link" href="<?php echo yii\helpers\Url::base()?>">Login <span class="sr-only">(current)</span></a>
      </li>

    </ul>
  </div>
</nav>
<!-- navbar -->

	<div class="container">

	</div>

<div class="container">
	<div class="left">
	</div>
	<div class="right">
		<div class="formBox">
			<h1 class="title1">Welcome back!</h1>
			<h5 class="title2">Log in to get latest movie in your area.</h5>

			<div class="right">
				<br>
			<?php $form = ActiveForm::begin(); ?>
				<?= $form->field($model, 'email')->textInput(['class' => 'email', 'placeholder' => 'Email'])->label(false) ?>

				<?= $form->field($model, 'password')->passwordInput(['class' => 'password', 'placeholder' => 'Password'])->label(false) ?>

				<a href="<?php echo yii\helpers\Url::base()?>/site/register">Don't have an account yet? create a new one!</a>

				<br>

				<div class="form-group">
				<?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
			<!-- <form action="" method="POST">
				<div class="email">
					<input type="email" name="email" placeholder="Email"><br>
				</div>
				<div class="password">
					<input type="password" name="password" placeholder="Password"><br>
				</div>
				<button name="submit" value="submit" class="orderbtn">Login</button>
			</form>	 -->
	</div>
</div>
</div>


<footer>
	<p>Created by Kelompok xxx | Lukabapak 2020</p>
</footer>

</body>
</html>
