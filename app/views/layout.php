<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<base href="<?php c(); ?>">
		<title>Jack Marshall</title>
		<link rel="shortcut icon" href="css/favicon.png" type="image/x-icon">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php c(':/css/style.css'); ?>">
		<script src="<?php c(':/css/bootstrap-select.min.css'); ?>"></script>
		<script src="//code.jquery.com/jquery-1.9.1.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script src="<?php c(':/js/bootstrap-select.min.js'); ?>"></script>
		<script src="<?php c(':/js/stupidtable.min.js'); ?>"></script>
	</head>
	<body>
		<header class="navbar navbar-default navbar-static-top navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="/" class="navbar-brand">Jack'Marshall</a>
				</div>
				<div class="collapse navbar-collapse" id="main-nav">
					<ul class="nav navbar-nav">
<?php
if(Auth::check() && Auth::user()->rank == 'administrator') {
?>
						<li class="<?php if(sub() == 'admin') { echo 'active'; } ?>"><a href="<?php c('admin'); ?>" ><?php t('menu.admin'); ?></a></li>
<?php
}
?>
						<li class="<?php if(sub() == 'builder') { echo 'active'; } ?>"><a href="<?php c('builder'); ?>"><?php t('menu.builder'); ?></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
<?php
if(Auth::check()) {
?>
						<li><a href="<?php c(':/logout'); ?>"><?php t('menu.logout', array('login' => Auth::user()->login)); ?></a></li>
<?php
} else {
?>
						<li><a href="<?php c(':/login'); ?>"/>Connexion</a></li>
						<li><a href="<?php c(':/signin'); ?>"/>Inscription</a></li>
<?php
}
?>
					</ul>
				</div>
			</div>
		</header>
<?php
if(isset($menu) && !empty($menu)) {
?>
		<nav class="container">
			<ul class="nav nav-tabs" >
				<?php echo $menu; ?>
			</ul>
		</nav>
<?php
}
?>
		<section class="container">
<?php
if(!is_array($content)) {
?>
			<?php echo $content; ?>
<?php
} else {
	foreach($content as $view) {
?>
			<?php echo $view; ?>
<?php
	}
}
?>
		</section>
		<script src="<?php c(':/js/script.js'); ?>"></script>
	</body>
</html>
