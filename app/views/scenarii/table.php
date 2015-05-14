			<section class="container">
				<nav><a href="scenarii">Scenarii</a></nav>
				<h1>Scenarii</h1>
				<table class="table table-striped table-condensed table-hover">
					<thead>
						<tr>
							<th>Nom</th>
							<th>Saison</th>
<!-- 							<th></th> -->
						</tr>
					</thead>
					<tbody>
<?php
foreach($scenarii as $scenario)
{
?>
					<tr>
						<td><a href="<?= $scenario->url; ?>" target="_blank"><?= $scenario->reference.'. '.$scenario->name; ?></a></td>
						<td><?= $scenario->season; ?></td>
<!-- 						<td><a href="scenarii/<?= $scenario->id; ?>/delete"><span class="glyphicon glyphicon-remove"></span></a></td> -->
					</tr>
<?php
}
?>
<!--					<tr>
						<td colspan=100%><a href="scenarii/create"><span class="glyphicon glyphicon-plus"></span> Nouveau scenario</a></td>
					</tr>-->
					</tbody>
				</table>
			</section>