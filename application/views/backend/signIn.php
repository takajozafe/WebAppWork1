<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$vals = array(
	'img_path'      => './captcha/',
	'img_url'       => '../captcha/',
	'font_path'     => './commons/fonts/cs-prakas/cs-prakas.ttf',
	'img_width'     => '150',
	'img_height'    => 30,
	'expiration'    => 7200,
	'word_length'   => 5,
	'font_size'     => 16,
	'img_id'        => 'captcha-image',
	'pool'          => '0123456789ABCDEFGHIGKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',

	// White background and border, black text and red grid
	'colors'        => array(
	'background' 	=> array(51, 51, 51),
	'border' 		=> array(51, 51, 51),
	'text'	 		=> array(255, 255, 255),
	'grid' 			=> array(51, 51, 51)
	)
);

$cap = create_captcha($vals);
$data = array(
	'captcha_time'  => $cap['time'],
	'ip_address'    => $this->input->ip_address(),
	'word'          => $cap['word']
);

$query = $this->db->insert_string('captcha', $data);
$this->db->query($query);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" context="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">

    <title><?php echo TITLE_BACKEND ?></title>

    <link href="<?php echo base_url('commons/css/core/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('commons/css/core/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('commons/css/backend/signIn.css') ?>" rel="stylesheet">

    <script src="<?php echo base_url('commons/js/core/angular.min.js') ?>"></script>
    <script src="<?php echo base_url('commons/js/core/angular-cookies.js') ?>"></script>
    <script src="<?php echo base_url('commons/js/core/angular-translate.min.js') ?>"></script>
    <script src="<?php echo base_url('commons/js/core/angular-sanitize.min.js') ?>"></script>
    <script src="<?php echo base_url('commons/js/core/app.js') ?>"></script>
    <script src="<?php echo base_url('commons/js/core/jquery-3.2.1.slim.min.js') ?>" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('commons/js/core/popper.min.js') ?>" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('commons/js/core/bootstrap.min.js') ?>" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <script> var restApiBaseURL = "<?php echo API_URL ?>"; </script>
    <script src="<?php echo base_url('commons/js/core/constant.js') ?>"></script>
  </head>
<body>

	<span ng-app="app" ng-controller="SignInController" class="ng-cloak" ng-init="init()">
		<div class="site-wrapper">
			<div class="site-wrapper-inner">
				<div class="cover-container">
					<main role="main" class="inner cover">
						<div class="alert alert-danger" role="alert" ng-show="loginError">{{ 'LOGIN_FAILED' | translate }}</div>
						<div class="alert alert-danger" role="alert" ng-show="captchaError">{{ 'WRONG_CAPTCHA' | translate }}</div>

						<form class="container" id="needs-validation" novalidate>
							<div class="form-group row">
								<label for="username" class="col-sm-2 col-form-label text-white">{{ 'USERNAME' | translate }}</label>
								<div class="col-sm-10">
									<input type="text" ng-model="username" class="form-control" id="username" placeholder="{{ 'TEXT_ENTER_USERNAME' | translate }}" required>
									<div class="invalid-feedback">{{ 'TEXT_ENTER_USERNAME' | translate }}</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="password" class="col-sm-2 col-form-label text-white">{{ 'PASSWORD' | translate }}</label>
								<div class="col-sm-10">
									<input type="password" ng-model="password" class="form-control" id="password" placeholder="{{ 'TEXT_ENTER_PASSWORD' | translate }}" required>
									<div class="invalid-feedback">{{ 'TEXT_ENTER_PASSWORD' | translate }}</div>
								</div>
							</div>

							<div class="form-group row">
							<span class="col-sm-2 col-form-label"></span>
								<div class="col-sm-10">
									<input type="text" ng-model="captcha" class="form-control" id="captcha" placeholder="{{ 'TEXT_ENTER_CAPTCHA' | translate }}" required>
									<div class="invalid-feedback">{{ 'TEXT_ENTER_CAPTCHA' | translate }}</div>
									<?php echo $cap['image']; ?>
								</div>
							</div>

							<div class="form-group row">
								<span class="col-sm-2 col-form-label"></span>
									<div class="col-sm-10">
									<button type="submit" ng-click="submit()" class="btn btn-success">{{ 'LOGIN' | translate }}</button>
									</div>
							</div>
						</form>
					</main>
					
					<footer class="mastfoot">
						<div class="inner">
							<p class="footer">เปลี่ยนภาษา: <a href="javascript: void(0)" ng-click="changeLanguage('th')">ภาษาไทย</a> | <a href="javascript: void(0)" ng-click="changeLanguage('en')">English</a></p> 
						</div>
					</footer>
				</div>
			</div>
		</div>
	</span>

	<script>
	(function() {
	'use strict';

	window.addEventListener('load', function() {
		var form = document.getElementById('needs-validation');
		form.addEventListener('submit', function(event) {
		if (form.checkValidity() === false) {
			event.preventDefault();
			event.stopPropagation();
		}
		form.classList.add('was-validated');
		}, false);
	}, false);
	})();
	</script>

<script src="<?php echo base_url('commons/js/core/sha512.min.js') ?>"></script>
<script src="<?php echo base_url('commons/js/backend/services/language.service.js') ?>"></script>
<script src="<?php echo base_url('commons/js/backend/services/signin.service.js') ?>"></script>
<script src="<?php echo base_url('commons/js/backend/controllers/signInController.js') ?>"></script>

</body>
</html>