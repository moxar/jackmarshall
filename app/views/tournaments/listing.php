			<section class="container">
				<h1>Tournois</h1>
				<a href="tournaments/create" class="btn btn-default">Nouveau tournois</a>
				<table class="table table-striped table-condensed table-hover">
					<caption class="h2">Liste des tournois</caption>
					<thead>
						<tr>
							<th>Nom du tournois</th>
							<th>Date du tournois</th>
							<th>Nombre de participants</th>
							<th><!-- GET --></th>
							<th><!-- DEL --></th>
						</tr>
					</thead>
					<tbody>
<?php
foreach($tournaments as $tournament)
{
?>
					<tr>
						<td><?php echo $tournament->name; ?></td>
						<td><?php echo $tournament->created_at; ?></td>
						<td><?php echo count($tournament->users()); ?></td>
						<td>
							<a href="tournaments/<?php echo $tournament->id; ?>">
								<span class="glyphicon glyphicon-download"></span>
							</a>
						</td>
						<td>
							<a href="tournaments/<?php echo $tournament->id; ?>/delete">
								<span class="glyphicon glyphicon-remove"></span>
							</a>
						</td>
					</tr>
<?php
}
?>
				</tbody>
			</table>
		</section>
