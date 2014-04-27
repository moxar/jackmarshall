			<nav class="pull-right contextual">
				<ul class="nav nav-stacked">
					<li><a href="<?php echo URL::previous(); ?>"><?php t('ui.link.back'); ?></a></li>
				</ul>
			</nav>
			<h1><?php t('title.admin.user.edit'); ?> <span class="small"><?php echo $user->login; ?></span></h1>
			<form class="form" role="form" method="POST">
				<div class="form-group">
					<label for="login" class="control-label"><?php t('ui.label.login'); ?></label>
					<input type="text" name="login" id="login" value="<?php echo Input::old('login'); ?>" placeholder="<?php echo $user->login; ?>" class="form-control">
					<?php a($errors->get('login'); ?>
				</div>
				<div class="form-group">
					<label for="password" class="control-label"><?php t('ui.label.password'); ?></label>
					<input type="password" name="password" id="password" placeholder="<?php t('ui.placeholder.password'); ?>" class="form-control">
					<input type="password" name="confirmation" id="confirmation" placeholder="<?php t('ui.placeholder.password_confirmation'); ?>" class="form-control">
					<?php a($errors->get('password'); ?>
				</div>
				<div class="form-group">
					<label for="email" class="control-label"><?php t('ui.label.email'); ?></label>
					<input type="email" name="email" id="email" value="<?php echo Input::old('email'); ?>" placeholder="<?php echo $user->email; ?>" class="form-control">
					<?php a($errors->get('email'); ?>
				</div>
				<div class="form-group">
					<label for="rank" class="control-label"><?php t('ui.label.rank'); ?></label>
					<select name="rank" id="rank" class="form-control">
<?php
foreach(Config::get('jack.ranks') as $rank) {
	if(Input::old('rank', $user->rank) == $rank) {
?>
						<option value="<?php echo $rank; ?>" selected><?php t('text.rank.'.$rank); ?></option>
<?php
	} else {
?>
						<option value="<?php echo $rank; ?>"><?php t('text.rank.'.$rank); ?></option>
<?php
	}
}
?>
					</select>
					<?php a($errors->get('rank'); ?>
				</div>
				<div class="form-group">
						<input type="submit" value="<?php t('ui.submit.edit'); ?>" class="btn btn-default">
				</div>
			</form>
