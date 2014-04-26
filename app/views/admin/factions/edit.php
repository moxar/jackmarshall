			<h1>Modifier une faction <span class="small"><?php echo $faction->name; ?></span></h1>
			<form class="form" role="form" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name" class="control-label">Nom</label>
					<input type="text" name="name" id="name" placeholder="nom" value="<?php echo Input::old('name'); ?>" class="form-control">
<?php
if($errors->has('name')) {
?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<ul>
<?php
	foreach($errors->get('name') as $e) {
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
					<label for="image" class="control-label">Image</label>
					<input type="file" name="image" id="image">
<?php
if($errors->has('image')) {
?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<ul>
<?php
	foreach($errors->get('image') as $e) {
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
					<input type="submit" value="Créer" class="btn btn-default">
				</div>
			</form>
