<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<base href="<?= Request::root(); ?>/">
		<title>Jack'Marshall</title>
		<meta name="author" content="Moxar">
		
		<script type="text/javascript" src="vendors.js"></script>
		<script type="text/javascript" src="app.js"></script>
		<link rel="stylesheet" href="app.css">
		
		<link rel="shortcut icon" href="css/favicon.png" type="image/x-icon" />
	</head>
	<body>
		<header class="navbar navbar-default navbar-static-top navbar-inverse">
			<div class="container">
				<a href="./" class="navbar-brand">Jack'Marshall</a>
				<ul class="nav navbar-nav">
					<li><a href="tournaments">Tournois</a></li>
					<li><a href="maps">Tables</a></li>
					<li><a href="scenarii">Scenarii</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
<?php
if(Auth::check())
{
?>
					<li><a><?= Auth::user()->name; ?></a></li>
					<li><a href="logout">Déconnexion</a></li>
<?php
}
else
{
?>
					<li><a href="login"/>Connexion</a></li>
					<li><a href="signin"/>Inscription</a></li>
<?php
}
?>
				</ul>
			</div>
		</header>
		<section>
<?php
if(!is_array($content)) {
?>
			<?= $content; ?>
<?php
}
else {
	foreach($content as $view) {
?>
			<?= $view; ?>
<?php
	}
}
?>
		</section>
	</body>
</html>
