			<nav class="pull-right contextual">
				<ul class="nav nav-stacked">
					<li><a href="<?php echo URL::previous(); ?>"><?php t('ui.link.back'); ?></a></li>
				</ul>
			</nav>
			<h1><?php t('title.admin.faction.new'); ?></h1>
			<form class="form" role="form" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name" class="control-label"><?php t('ui.label.name'); ?></label>
					<input type="text" name="name" id="name" placeholder="<?php t('ui.placeholder.name'); ?>" value="<?php echo Input::old('name'); ?>" class="form-control" required>
					<?php a($errors->get('name')); ?>
				</div>
				<div class="form-group">
					<label for="image" class="control-label"><?php t('ui.label.image'); ?></label>
					<input type="file" name="image" id="image" required>
					<?php a($errors->get('image')); ?>
				</div>
				<div class="form-group">
					<input type="submit" value="<?php t('ui.submit.create'); ?>" class="btn btn-default">
				</div>
			</form>
