			<h1><?php t('title.admin.faction.listing'); ?></h1>
			<table class="table table-striped table-hover table-condensed">
				<colgroup>
					<col style="width: 25px;">
					<col>
					<col span="3" style="width: 3em;">
				</colgroup>
				<thead>
					<tr>
						<th><!-- Image --></th>
						<th><?php t('ui.label.name'); ?></th>
						<th><!-- View --></th>
						<th><!-- Edit --></th>
						<th><!-- Delete --></th>
					</tr>
				</thead>
				<tbody>
<?php
foreach(Faction::all() as $faction) {
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
					<tr>
						<td colspan="5"><a href="<?php c('/factions/new'); ?>"><?php t('ui.link.new.faction'); ?></a></td>
					</tr>
				</tbody>
			</table>
