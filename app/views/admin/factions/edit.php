			<h1><?php t('title.admin.faction.edit'); ?> <span class="small"><?php echo $faction->name; ?></span></h1>
			<form class="form" role="form" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name" class="control-label"><?php t('ui.label.name'); ?></label>
					<input type="text" name="name" id="name" placeholder="<?php echo $faction->name; ?>" value="<?php echo Input::old('name'); ?>" class="form-control">
					<?php a($errors->get('name')); ?>
				</div>
				<div class="form-group">
					<label for="image" class="control-label"><?php t('ui.label.login'); ?></label>
					<input type="file" name="image" id="image">
					<?php a($errors->get('image')); ?>
				</div>
				<div class="form-group">
					<input type="submit" value="Créer" class="btn btn-default">
				</div>
			</form>
