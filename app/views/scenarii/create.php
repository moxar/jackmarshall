			<section class="container">
				<nav><a href="scenarii">Scenarii</a> / <a href="scenarii/create">Créer</a></nav>
				<h1>Nouveau scénario</h1>
				<form method="POST">
						<div class="row">
							<div class="col-md-1">
								<label class="control-label">Référence</label>
							</div>
							<div class="col-md-4">
								<input type="text" name="reference" placeholder="n° du scenario" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-1">
								<label class="control-label">Nom</label>
							</div>
							<div class="col-md-4">
								<input type="text" name="name" placeholder="Nom du scenario..." class="form-control">
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-1">
								<label class="control-label">Saison</label>
							</div>
							<div class="col-md-4">
								<input type="text" name="season" placeholder="Steamroller 20xx" class="form-control">
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-1">
								<label class="control-label">URL</label>
							</div>
							<div class="col-md-4">
								<input type="text" name="url" placeholder="http://jackmarshall.fr/uploads/xxx" class="form-control">
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-1">
								<input type="submit" class="btn btn-primary" value="Créer">
							</div>
						</div>
				</form>
			</section>