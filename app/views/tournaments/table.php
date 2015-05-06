			<section class="container">
				<nav><a href="<?= action("TournamentsController@listing"); ?>">Tournois</a></nav>
				<h1>Tournois</h1>
				<form action="<?= action("TournamentsController@continuous"); ?>">
					<input type="submit" class="btn btn-default" value="Tournois continu"/>
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
								<th colspan=2>Nom</th>
								<th>Date</th>
								<th>Participants</th>
								<th><!-- DEL --></th>
							</tr>
<?php
$tournaments->each(function($t) {
?>
							<tr>
								<td>
									<input type="checkbox" name="tournaments[<?= $t->id; ?>]" />
								</td>
								<td>
									<a href="tournaments/<?= $t->id; ?>"><?= $t->name; ?></a>								
								</td>
								<td><?= $t->created_at; ?></td>
								<td>
									<?= $t->playersButFantom->count(); ?>
									<a href="tournaments/<?= $t->id; ?>/update">(Contrôler)</a>
								</td>
								<td>
									<a href="tournaments/<?= $t->id; ?>/delete">
										<span class="glyphicon glyphicon-remove"></span>
									</a>
								</td>
							</tr>
<?php
});
?>
						</tbody>
					</table>
				</form>
			</section>
