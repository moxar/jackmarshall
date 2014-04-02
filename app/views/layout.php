<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<base href="<?php echo Request::root(); ?>/">
<?php
if(isset($title)) {
?>
		<title><?php echo $title; ?> / Jack'Marshall</title>
<?php
} else {
?>
		<title>Jack'Marshall</title>
<?php
}
?>
		<meta name="author" content="Moxar">
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
		
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		
		<link rel="stylesheet" href="css/style.css">
		<link rel="shortcut icon" href="css/favicon.png" type="image/x-icon" />
					
<?php
if(isset($scripts) && !empty($scripts))
{
	foreach($scripts as $script)
	{
?>
		<script type="text/javascript" src="<?php echo $script; ?>"></script>
<?php
	}
}
?>

	</head>
	<body>
		<header class="navbar navbar-default navbar-static-top navbar-inverse">
			<div class="container">
				<a href="home" class="navbar-brand">Jack'Marshall</a>
				<ul class="nav navbar-nav navbar-right">
<?php
if(Auth::check())
{
?>
					<li><a href="logout"/>Déconnexion</a></li>
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
			<?php echo $content; ?>
		</section>
	</body>
</html>

