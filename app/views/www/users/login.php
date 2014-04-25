			<h1>Connexion à Jack'Marshall</h1>
<?php
if(Session::get('error') == true) {
?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p><?php echo trans('validation.custom.wrong_credentials'); ?></p>
			</div>
<?php
}
?>
			<form class="form" role="form" method="POST">
				<div class="form-group">
					<label for="login" class="control-label">Nom</label>
						<input type="text" name="login" id="login" placeholder="identifiant" value="<?php echo Input::old('login'); ?>" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="password" class="control-label">Mot de passe</label>
						<input type="password" name="password" id="password" placeholder="mot de passe" class="form-control" required>
				</div>
				<div class="form-group">
						<input type="submit" value="Connexion" class="btn btn-default">
				</div>
			</form>
