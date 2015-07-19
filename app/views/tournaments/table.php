			<section class="container">
				<nav><a href="<?= action("TournamentsController@listing"); ?>">Tournois</a></nav>
				<h1>Tournois</h1>
				<table class="table table-striped table-condensed table-hover">
					<thead>
						<tr>
							<td colspan="6"><a href="tournaments/create"><span class="glyphicon glyphicon-plus"></span> Nouveau tournois</a></td>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<td colspan="6"><a href="tournaments/create"><span class="glyphicon glyphicon-plus"></span> Nouveau tournois</a></td>
						</tr>
					</tfoot>
					<tbody>
						<tr>
							<th>Nom</th>
							<th>Date</th>
							<th>Participants</th>
<?php
if(Auth::check()) {
?>							
							<th>PAF</th>
							<th>Cagnotte</th>
							<th><!-- DEL --></th>
<?php
}
?>							
						</tr>
<?php
$tournaments->each(function($t) {
?>
						<tr>
							<td>
								<a href="tournaments/<?= $t->id; ?>"><?= $t->name; ?></a>								
							</td>
							<td><?= $t->created_at; ?></td>
							<td>
								<?= $t->playersButFantom->count(); ?>
							</td>
<?php							
	if($t->hasCompleteAccess()) {
?>							
							<td><?= $t->paf; ?></td>
							<td><?= $t->remnant; ?></td>
							<td>
								<a href="tournaments/<?= $t->id; ?>/delete">
									<span class="glyphicon glyphicon-remove"></span>
								</a>
							</td>
<?php							
	}
?>							
						</tr>
<?php
});
?>
					</tbody>
				</table>
				<?php echo $tournaments->links(); ?>
			</section>
