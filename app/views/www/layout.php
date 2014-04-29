<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<base href="//<?php echo Helper::host(); ?>">
		<title>Jack Marshall</title>
		<link rel="shortcut icon" href="css/favicon.png" type="image/x-icon">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="//code.jquery.com/jquery-1.9.1.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<header class="navbar navbar-default navbar-fixed-top navbar-inverse">
			<div class="container">
				<a href="/" class="navbar-brand">Jack'Marshall</a>
				<ul class="nav navbar-nav">
					<li><a href="//builder.<?php echo Helper::host(); ?>">Builder</a></li>
					<li><a href="//league.<?php echo Helper::host(); ?>">Ligues</a></li>
					<li><a href="//tournament.<?php echo Helper::host(); ?>">Tournois</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
<?php
if(Auth::check()) {
?>
					<li><a href="logout">Déconnexion (<?php echo Auth::user()->login; ?>)</a></li>
<?php
} else {
?>
					<li><a href="login"/>Connexion</a></li>
					<li><a href="signin"/>Inscription</a></li>
<?php
}
?>
				</ul>
			</div>
		</header>
		<section class="container">
			<?php echo $content; ?>
		</section>
	</body>
</html>
