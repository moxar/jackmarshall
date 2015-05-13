			<section class="container">
				<nav><a href="maps">Tables</a></nav>
				<h1>Tables</h1>
				<table class="table table-striped table-condensed table-hover">
					<thead>
						<tr>
							<th>Nom</th>
							<th><!-- DEL --></th>
						</tr>
					</thead>
					<tbody>
<?php
foreach($maps as $map)
{
?>
					<tr>
						<td><?= $map->name; ?></td>
						<td><a href="maps/<?= $map->id; ?>/delete"><span class="glyphicon glyphicon-remove"></span></a></td>
					</tr>
<?php
}
?>
					<tr>
						<td colspan="2"><a href="maps/create"><span class="glyphicon glyphicon-plus"></span> Nouvelle table</a></td>
					</tr>
					</tbody>
				</table>
			</section>