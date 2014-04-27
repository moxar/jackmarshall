			<h1><?php t('title.www.login'); ?></h1>
			<?php a(Session::get('errors')); ?>
			<form class="form" role="form" method="POST">
				<div class="form-group">
					<label for="login" class="control-label"><?php t('ui.label.login'); ?></label>
					<input type="text" name="login" id="login" placeholder="<?php t('ui.placeholder.login'); ?>" value="<?php echo Input::old('login'); ?>" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="password" class="control-label"><?php t('ui.label.password'); ?></label>
					<input type="password" name="password" id="password" placeholder="<?php t('ui.placeholder.password'); ?>" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="submit" value="<?php t('ui.submit.login'); ?>" class="btn btn-default">
				</div>
			</form>
