			<h1>Liste des utilisateurs</h1>
			<table class="table table-striped table-hover table-condensed">
				<colgroup>
					<col style="width: 25px;">
					<col>
					<col>
					<col>
					<col span="2" style="width: 3em;">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th>Email</th>
						<th>Rang</th>
						<th><!-- View --></th>
						<th><!-- Edit --></th>
						<th><!-- Delete --></th>
					</tr>
				</thead>
				<tbody>
<?php
foreach(User::all() as $user) {
?>
					<tr>
						<td><?php echo $user->id; ?></td>
						<td><?php echo $user->login; ?></td>
						<td><?php echo $user->email; ?></td>
						<td><?php echo $user->rank; ?></td>
						<td><a href="<?php echo cross('/user/'.$user->login); ?>" title="Voir"><span class="glyphicon glyphicon-arrow-right"></span></a></td>
						<td><a href="<?php echo cross('/user/'.$user->login); ?>/edit" title="Modifier"><span class="glyphicon glyphicon-edit"></span></a></td>
						<td><a href="<?php echo cross('/user/'.$user->login.'/delete'); ?>" title="Supprimer"><span class="glyphicon glyphicon-remove"></span></a></td>
					</tr>
<?php
}
?>
				</tbody>
			</table>
