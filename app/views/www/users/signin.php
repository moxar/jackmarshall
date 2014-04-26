			<h1>Inscription</h1>
			<p>L'inscription à Jack'Marshall est rapide, sans douleur, et garantie sans surprise cachée. Contrairement à tout ce qui pourrait découler de son utilisation…</p>
			<form class="form" role="form" method="POST">
				<div class="form-group">
					<label for="login" class="control-label">Nom</label>
					<input type="text" name="login" id="login" placeholder="identifiant" value="<?php echo Input::old('login'); ?>" class="form-control" required>
					<p class="help-block">Le nom est utilisé à la fois pour vous connecter et pour vous repérer dans les tournois. Il est donc conseillé de ne pas y mettre n'importe quoi.</p>
<?php
if($errors->has('login')) {
?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<ul>
<?php
	foreach($errors->get('login') as $e) {
?>
							<li><?php echo $e; ?></li>
<?php
	}
?>
						</ul>
					</div>
<?php
}
?>
				</div>
				<div class="form-group">
					<label for="password" class="control-label">Mot de passe</label>
					<input type="password" name="password" id="password" placeholder="mot de passe" class="form-control" required>
					<input type="password" name="confirmation" id="confirmation" placeholder="mot de passe (confirmation)" class="form-control" required>
					<p class="help-block">Pas de limitation ni de contrainte sur le mot de passe, la confirmation doit être égale au mot de passe.</p>
<?php
if($errors->has('password')) {
?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<ul>
<?php
	foreach($errors->get('password') as $e) {
?>
							<li><?php echo $e; ?></li>
<?php
	}
?>
						</ul>
					</div>
<?php
}
?>
				</div>
				<div class="form-group">
					<label for="email" class="control-label">Adresse email</label>
					<input type="email" name="email" id="email" placeholder="adresse email" value="<?php echo Input::old('email'); ?>" class="form-control" required>
					<p class="help-block">L'adresse email fournie ne sera pas utilisée à moins que vous n'oubliez votre mot de passe (fonctionnalité à venir).</p>
<?php
if($errors->has('email')) {
?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<ul>
<?php
	foreach($errors->get('email') as $e) {
?>
							<li><?php echo $e; ?></li>
<?php
	}
?>
						</ul>
					</div>
<?php
}
?>
				</div>
				<div class="form-group">
						<input type="submit" value="S'inscrire" class="btn btn-default">
				</div>
			</form>
