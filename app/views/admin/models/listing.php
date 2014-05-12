			<h1><?php t('title.admin.model.listing'); ?></h1>
			<table class="table table-striped table-hover table-condensed sortable paginated" data-size="15">
				<colgroup>
					<col style="width: 25px;">
					<col>
					<col>
					<col>
					<col span="3" style="width: 3em;">
				</colgroup>
				<thead>
					<tr>
						<th data-sort="string"><a href="<?php echo sorturl('faction_id'); ?>">F</a></th>
						<th data-sort="string"><a href="<?php echo sorturl('name'); ?>"><?php t('ui.label.name'); ?></a></th>
						<th data-sort="string"><a href="<?php echo sorturl('type'); ?>"><?php t('ui.label.type'); ?></a></th>
						<th data-sort="string"><a href="<?php echo sorturl('expansion_id'); ?>"><?php t('ui.label.expansion'); ?></a></th>
						<th><!-- View --></th>
						<th><!-- Edit --></th>
						<th><!-- Delete --></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td></td>
						<td colspan="6"><a href="<?php c('/models/new'); ?>"><?php t('ui.link.new.model'); ?></a></td>
					</tr>
					<tr>
						<td colspan="7">
							<?php echo $models->appends(array('sort' => Input::get('sort', 'name'), 'order' => Input::get('order', 'asc')))->links(); ?>
						</td>
					</tr>
				</tfoot>
				<tbody>
<?php
foreach($models as $model) {
?>
					<tr>
						<td data-sort-value="<?php echo $model->faction->name; ?>"><img src="<?php c(':/'.$model->faction->image); ?>"></td>
						<td><?php echo $model->name; ?></td>
						<td><?php t('text.type.'.$model->type); ?></td>
						<td><?php if($model->expansion != null) { echo $model->expansion->name; } else { echo 'N/A'; } ?></td>
						<td><a href="<?php c('/model/'.$model->slug); ?>" title="<?php t('ui.link.view'); ?>"><span class="glyphicon glyphicon-arrow-right"></span></a></td>
						<td><a href="<?php c('/model/'.$model->slug.'/edit'); ?>" title="<?php t('ui.link.edit'); ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
						<td><a href="<?php c('/model/'.$model->slug.'/delete'); ?>" title="<?php t('ui.link.delete'); ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
					</tr>
<?php
}
?>
				</tbody>
			</table>
