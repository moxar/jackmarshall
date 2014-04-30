			<h1><?php t('title.league.table'); ?></h1>
			<table class="table table-striped table-hover table-condensed sortable">
				<colgroup>
					<col class="small">
					<col>
					<col span="3" class="actions">
				</colgroup>
				<thead>
					<tr>
						<th data-sort="string"><?php t('ui.label.name'); ?></th>
						<th><!-- View --></th>
						<th><!-- Edit --></th>
						<th><!-- Delete --></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td colspan="5"><a href="<?php c('/leagues/create'); ?>"><?php t('ui.link.new.league'); ?></a></td>
					</tr>
				</tfoot>
				<tbody>
<?php
foreach(Contest::leagues()->orderBy('created_at', 'DESC')->get() as $league) {
?>
					<tr>
						<td><?php echo $league->name; ?></td>
						<td><a href="<?php c('/league/'.$faction->slug); ?>" title="<?php t('ui.link.view'); ?>"><span class="glyphicon glyphicon-arrow-right"></span></a></td>
						<td><a href="<?php c('/league/'.$league->slug.'/update'); ?>" title="<?php t('ui.link.edit'); ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
						<td><a href="<?php c('/league/'.$league->slug.'/delete'); ?>" title="<?php t('ui.link.delete'); ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
					</tr>
<?php
}
?>
				</tbody>
			</table>
