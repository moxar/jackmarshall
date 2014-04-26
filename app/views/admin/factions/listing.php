			<h1>Liste des factions</h1>
			<table class="table table-striped table-hover table-condensed">
				<colgroup>
					<col style="width: 25px;">
					<col>
					<col span="3" style="width: 3em;">
				</colgroup>
				<thead>
					<tr>
						<th><!-- Image --></th>
						<th>Nom</th>
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
						<td><img src="<?php echo cross(':/'.$faction->image); ?>"></td>
						<td><?php echo $faction->name; ?></td>
						<td><a href="<?php echo cross('/faction/'.$faction->slug); ?>" title="Voir"><span class="glyphicon glyphicon-arrow-right"></span></a></td>
						<td><a href="<?php echo cross('/faction/'.$faction->slug.'/edit'); ?>" title="Modifier"><span class="glyphicon glyphicon-edit"></span></a></td>
						<td><a href="<?php echo cross('/faction/'.$faction->slug.'/delete'); ?>" title="Supprimer"><span class="glyphicon glyphicon-remove"></span></a></td>
					</tr>
<?php
}
?>
					<tr>
						<td colspan="5"><a href="<?php echo cross('/factions/new'); ?>">Nouvelle faction</a></td>
					</tr>
				</tbody>
			</table>
