			<h1><?php t('title.www.signin'); ?></h1>
			<?php echo Markdown::trans('text.www.signin'); ?>
			<form class="form" role="form" method="POST">
				<div class="form-group">
					<label for="login" class="control-label"><?php t('ui.label.login'); ?></label>
					<input type="text" name="login" id="login" placeholder="<?php t('ui.placeholder.login'); ?>" value="<?php echo Input::old('login'); ?>" class="form-control" required>
					<p class="help-block"><?php t('ui.help.login'); ?></p>
					<?php a($errors->get('login')); ?>
				</div>
				<div class="form-group">
					<label for="password" class="control-label"><?php t('ui.label.password'); ?></label>
					<input type="password" name="password" id="password" placeholder="<?php t('ui.placeholder.password'); ?>" class="form-control" required>
					<input type="password" name="confirmation" id="confirmation" placeholder="<?php t('ui.placeholder.password_confirmation'); ?>" class="form-control" required>
					<p class="help-block"><?php t('ui.help.password'); ?></p>
					<?php a($errors->get('password')); ?>
				</div>
				<div class="form-group">
					<label for="email" class="control-label"><?php t('ui.label.email'); ?></label>
					<input type="email" name="email" id="email" placeholder="<?php t('ui.placeholder.email'); ?>" value="<?php echo Input::old('email'); ?>" class="form-control" required>
					<p class="help-block"><?php t('ui.help.email'); ?></p>
					<?php a($errors->get('email')); ?>
				</div>
				<div class="form-group">
						<input type="submit" value="<?php t('ui.submit.signin'); ?>" class="btn btn-default">
				</div>
			</form>
