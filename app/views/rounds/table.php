			<section class="container">
				<nav><a href="tournaments">Tournois</a> &gt; <?php echo $tournament->name; ?></nav>
				<h1>Rondes</h1>
				<table class="table table-striped table-condensed table-hover">
					<thead>
						<tr>
							<th>Ronde</th>
							<th><!-- DEL --></th>
						</tr>
					</thead>
					<tbody>
<?php
foreach($tournament->rounds as $round)
{
?>
					<tr>
						<td><a href="rounds/<?php echo $round->id; ?>/update">Ronde <?php echo $round->number; ?></a></td>
						<td><a href="rounds/<?php echo $round->id; ?>/delete"><span class="glyphicon glyphicon-remove"></span></a></td>
					</tr>
<?php
}
?>
					<tr>
						<td colspan="2"><a href="rounds/<?php echo $tournament->id; ?>/create"><span class="glyphicon glyphicon-plus"></span> Nouvelle ronde</a></td>
					</tr>
					</tbody>
				</table>
			</section>