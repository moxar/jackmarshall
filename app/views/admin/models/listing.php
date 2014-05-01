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
						<td></td>
						<td colspan="6"><a href="<?php c('/models/new'); ?>"><?php t('ui.link.new.model'); ?></a></td>
					</tr>
					<tr>
						<td colspan="7">
							<ul class="pagination">
								<li class="disabled"><a href="#">&laquo;</a></li>
								<li class="active"><a href="#">1</a></li>
<?php
for($i = 1; $i < ceil(Model::count()/15); $i++) {
?>
								<li><a href="#"><?php echo $i + 1; ?></a></li>
<?php
}
if($i == 1) {
?>
								<li class="disabled"><a href="#">&raquo;</a></li>
<?php
} else {
?>
								<li><a href="#">&raquo;</a></li>
<?php
}
?>
							</ul>
						</td>
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
