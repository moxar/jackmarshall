			<h1><?php t('title.admin.faction.listing'); ?></h1>
			<table class="table table-striped table-hover table-condensed sortable">
				<colgroup>
					<col class="small">
					<col>
					<col span="3" class="actions">
				</colgroup>
				<thead>
					<tr>
						<th><!-- Image --></th>
						<th data-sort="string"><?php t('ui.label.name'); ?></th>
						<th><!-- View --></th>
						<th><!-- Edit --></th>
						<th><!-- Delete --></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td colspan="5"><a href="<?php c('/factions/new'); ?>"><?php t('ui.link.new.faction'); ?></a></td>
					</tr>
				</tfoot>
				<tbody>
<?php
foreach(Faction::orderBy('name')->get() as $faction) {
?>
					<tr>
						<td><img src="<?php c(':/'.$faction->image); ?>"></td>
						<td><?php echo $faction->name; ?></td>
						<td><a href="<?php c('/faction/'.$faction->slug); ?>" title="<?php t('ui.link.view'); ?>"><span class="glyphicon glyphicon-arrow-right"></span></a></td>
						<td><a href="<?php c('/faction/'.$faction->slug.'/edit'); ?>" title="<?php t('ui.link.edit'); ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
						<td><a href="<?php c('/faction/'.$faction->slug.'/delete'); ?>" title="<?php t('ui.link.delete'); ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
					</tr>
<?php
}
?>
				</tbody>
			</table>
