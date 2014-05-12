			<nav class="pull-right contextual">
				<ul class="nav nav-stacked">
					<li><a href="<?php c('/models'); ?>"><?php t('ui.link.back'); ?></a></li>
					<li><a href="<?php c('/model/'.$model->slug.'/edit'); ?>"><?php t('ui.link.edit');  ?></a></li>
					<li><a href="<?php c('/model/'.$model->slug.'/delete'); ?>"><?php t('ui.link.delete'); ?></a></li>
				</ul>
			</nav>
			<h1><?php t('title.admin.model.view'); ?> <span class="small"><?php echo $model->name; ?></span></h1>
			<dl class="dl-horizontal">
				<dt><?php t('ui.label.name'); ?></dt>
				<dd><?php echo $model->name; ?></dd>
				<dt><?php t('ui.label.faction'); ?></dt>
				<dd><?php echo $model->faction->name; ?>
				<dt><?php t('ui.label.type'); ?></dt></dd>
				<dd><?php t('text.type.'.$model->type); ?>
				<dt><?php t('ui.label.expansion'); ?></dt>
				<dd><?php if($model->expansion != null) { echo $model->expansion->name; } else { echo 'N/A'; } ?></dd>
				<dt><?php t('ui.label.cost'); ?></dt>
				<dd>
					<ul>
<?php
foreach($model->costs() as $cost) {
?>
						<li><?php echo $cost->quantity; ?> <?php echo t('text.for'); ?> <?php echo $cost->cost; ?></li>
<?php
}
?>
					</ul>
				</dd>
			</dl>
