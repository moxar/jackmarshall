			<h1><?php t('title.admin.model.new'); ?></h1>
			<form class="form" role="form" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="faction_id" class="control-label"><?php t('ui.label.faction'); ?></label>
					<select name="faction_id" id="faction_id" class="form-control">
<?php
foreach(Faction::all() as $faction) {
	if(Input::old('faction_id') == $faction->id) {
?>
						<option value="<?php echo $faction->id; ?>" selected><?php echo $faction->name; ?></option>
<?php
	} else {
?>
						<option value="<?php echo $faction->id; ?>"><?php echo $faction->name; ?></option>
<?php
	}
}
?>
					</select>
					<?php a($errors->get('faction_id')); ?>
				</div>
				<div class="form-group">
					<label for="type" class="control-label"><?php t('ui.label.type'); ?></label>
					<select name="type" id="type" class="form-control">
<?php
foreach(Config::get('jack.types') as $type) {
	if(Input::old('type') == $type) {
?>
						<option value="<?php echo $type; ?>" selected><?php t('text.type.'.$type); ?></option>
<?php
	} else {
?>
						<option value="<?php echo $type; ?>"><?php t('text.type.'.$type); ?></option>
<?php
	}
}
?>
					</select>
					<?php a($errors->get('type')); ?>
				</div>
				<div class="form-group">
					<label for="name" class="control-label"><?php t('ui.label.name'); ?></label>
					<input type="text" name="name" id="name" placeholder="<?php t('ui.placeholder.name'); ?>" value="<?php echo Input::old('name'); ?>" class="form-control" required>
					<?php a($errors->get('name')); ?>
				</div>
				<div class="form-group">
					<label for="field_allowance" class="control-label"><?php t('ui.label.field_allowance'); ?></label>
					<input type="text" name="field_allowance" id="field_allowance" placeholder="<?php  t('ui.placeholder.field_allowance'); ?>" value="<?php echo Input::old('field_allowance'); ?>" class="form-control" pattern="U|C|[0-9]+" required>
					<?php a($errors->get('field_allowance')); ?>
				</div>
				<div class="form-group">
					<label for="parent_id" class="control-label"><?php t('ui.label.parent'); ?></label>
					<select name="parent_id" id="parent_id" class="form-control">
						<option><?php t('ui.option.none'); ?></option>
<?php
foreach(Model::all() as $model) {
	if(Input::old('parent_id') == $model->id) {
?>
						<option value="<?php echo $model->id; ?>" selected><?php echo $model->name; ?></option>
<?php
	} else {
?>
						<option value="<?php echo $model->id; ?>"><?php echo $model->name; ?></option>
<?php
	}
}
?>
					</select>
					<?php a($errors->get('parent_id')); ?>
				</div>
				<div class="form-group">
					<label for="expansion" class="control-label"><?php t('ui.label.expansion'); ?></label>
					<select name="expansion" id="expansion" class="form-control">
<?php
foreach(Config::get('jack.expansions') as $expansion) {
	if(Input::old('expansion') == $expansion) {
?>
						<option value="<?php echo $expansion; ?>" selected><?php t('text.expansion.'.$expansion); ?></option>
<?php
	} else {
?>
						<option value="<?php echo $expansion; ?>"><?php t('text.expansion.'.$expansion); ?></option>
<?php
	}
}
?>
					</select>
					<?php a($errors->get('expansion')); ?>
				</div>
				<div class="form-group">
					<input type="submit" value="<?php t('ui.submit.create'); ?>" class="btn btn-default">
				</div>
			</form>
