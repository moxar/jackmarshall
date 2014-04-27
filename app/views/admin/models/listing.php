			<h1><?php t('title.admin.model.listing'); ?></h1>
			<table class="table table-striped table-hover table-condensed sortable">
				<colgroup>
					<col style="width: 25px;">
					<col>
					<col>
					<col>
					<col span="3" style="width: 3em;">
				</colgroup>
				<thead>
					<tr>
						<th data-sort="string"><!-- Faction --></th>
						<th data-sort="string"><?php t('ui.label.name'); ?></th>
						<th data-sort="string"><?php t('ui.label.type'); ?></th>
						<th data-sort="string"><?php t('ui.label.expansion'); ?></th>
						<th><!-- View --></th>
						<th><!-- Edit --></th>
						<th><!-- Delete --></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td colspan="7"><a href="<?php c('/models/new'); ?>"><?php t('ui.link.new.model'); ?></a></td>
					</tr>
				</tfoot>
				<tbody>
<?php
foreach(Model::all() as $model) {
?>
					<tr>
						<td data-sort-value="<?php echo $model->faction->name; ?>"><img src="<?php c(':/'.$model->faction->image); ?>"></td>
						<td><?php echo $model->name; ?></td>
						<td><?php t('text.type.'.$model->type); ?></td>
						<td><?php t('text.expansion.'.$model->expansion); ?></td>
						<td><a href="<?php c('/model/'.$model->slug); ?>" title="<?php t('ui.link.view'); ?>"><span class="glyphicon glyphicon-arrow-right"></span></a></td>
						<td><a href="<?php c('/model/'.$model->slug.'/edit'); ?>" title="<?php t('ui.link.edit'); ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
						<td><a href="<?php c('/model/'.$model->slug.'/delete'); ?>" title="<?php t('ui.link.delete'); ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
					</tr>
<?php
}
?>
				</tbody>
			</table>
