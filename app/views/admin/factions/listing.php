			<h1>Liste des factions</h1>
			<table class="table table-striped table-hover table-condensed">
				<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th>Image</th>
						<th><!-- Edit --></th>
						<th><!-- Delete --></th>
					</tr>
				</thead>
				<tbody>
<?php
foreach(Faction::all() as $faction) {
?>
					<tr>
						<td><?php echo $faction->id; ?></td>
						<td><?php echo $faction->name; ?></td>
						<td><img src="<?php cross(':/images/factions/'.$faction->slug); ?>"></td>
						<td><a href="//<?php cross('/faction/'.$faction->slug.'/edit'); ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
						<td><a href="//<?php cross('/faction/'.$faction->slug.'/delete'); ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
					</tr>
<?php
}
?>
				</tbody>
			</table>