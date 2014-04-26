			<nav class="pull-right contextual">
				<ul class="nav nav-stacked">
					<li><a href="<?php echo URL::previous(); ?>">Retour</a></li>
				</ul>
			</nav>
			<h1>Modifier un utilisateur <span class="small"><?php echo $user->login; ?></span></h1>
			<form class="form" role="form" method="POST">
				<div class="form-group">
					<label for="login" class="control-label">Nom</label>
					<input type="text" name="login" id="login" value="<?php echo Input::old('login'); ?>" placeholder="<?php echo $user->login; ?>" class="form-control">
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
					<input type="password" name="password" id="password" placeholder="mot de passe" class="form-control">
					<input type="password" name="confirmation" id="confirmation" placeholder="mot de passe (confirmation)" class="form-control">
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
					<input type="email" name="email" id="email" value="<?php echo Input::old('email'); ?>" placeholder="<?php echo $user->email; ?>" class="form-control">
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
					<label for="rank" class="control-label">Rang</label>
					<select name="rank" id="rank" class="form-control">
<?php
foreach(Config::get('jack.ranks') as $rank) {
	if(Input::old('rank', $user->rank) == $rank) {
?>
						<option value="<?php echo $rank; ?>" selected><?php echo $rank; ?></option>
<?php
	} else {
?>
						<option value="<?php echo $rank; ?>"><?php echo $rank; ?></option>
<?php
	}
}
?>
					</select>
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
						<input type="submit" value="Modifier" class="btn btn-default">
				</div>
			</form>
