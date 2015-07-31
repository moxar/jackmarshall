			<section class="container">
				<form id="loginForm" class="form" role="form" method="post">
				
					<fieldset class="form-group has-feedback">
						<label class="control-label" for="name">Identifiant</label>
						<input class="form-control" type="text" name="name" id="name"/>
						<span class="glyphicon form-control-feedback"></span>
						<p class="help-block"></p>
					</fieldset>
					
					<fieldset class="form-group has-feedback">
						<label class="control-label"  for="password">Mot de passe</label>
						<input class="form-control" type="password" name="password" id="password" />
						<span class="glyphicon form-control-feedback"></span>
						<p class="help-block"></p>
					</fieldset>
					
					<fieldset class="form-group has-feedback">
						<label for="remember_me">Se souvenir de moi</label>
					    	<input type="checkbox" id="remember_me" name="remember_me" checked />
						<span class="glyphicon form-control-feedback"></span>
						<p class="help-block"></p>
					</fieldset>
					
					<fieldset class="form-group">
						<input class="btn btn-default" type="submit" value="Connexion"/>
						<a class="btn btn-default" href="home">Retour</a>
					</fieldset>
				</form>
			</section>
