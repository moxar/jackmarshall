<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<base href="<?php echo cross(); ?>">
		<title>Jack Marshall</title>
		<link rel="shortcut icon" href="css/favicon.png" type="image/x-icon">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo cross(':/css/style.css'); ?>">
		<script src="//code.jquery.com/jquery-1.9.1.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<header class="navbar navbar-default navbar-fixed-top navbar-inverse">
			<div class="container">
				<a href="/" class="navbar-brand">Jack'Marshall</a>
				<ul class="nav navbar-nav">
<?php
if(Auth::check() && Auth::user()->rank = 'administrator') {
?>
					<li class="<?php if(sub() == 'admin') { echo 'active'; } ?>"><a href="<?php echo cross('admin'); ?>" >Admin</a></li>
<?php
}
?>
					<li class="<?php if(sub() == 'builder') { echo 'active'; } ?>"><a href="<?php echo cross('builder'); ?>">Builder</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
<?php
if(Auth::check()) {
?>
					<li><a href="<?php echo cross(':/logout'); ?>">Déconnexion (<?php echo Auth::user()->login; ?>)</a></li>
<?php
} else {
?>
					<li><a href="<?php echo cross(':/login'); ?>"/>Connexion</a></li>
					<li><a href="<?php echo cross(':/signin'); ?>"/>Inscription</a></li>
<?php
}
?>
				</ul>
			</div>
		</header>
<?php
if(isset($menu) && !empty($menu)) {
?>
		<nav class="container">
			<ul class="nav nav-tabs">
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
	</body>
</html>
<!--
<?php
echo Config::get('session.domain');
?>
-->
