			<section class="container">
				<nav><a href="<?= action("TournamentsController@listing"); ?>">Tournois</a></nav>
				<h1>Classement</h1>
					<table class="table table-striped table-condensed table-hover">
						<thead>
							<tr>
								<th>Nom</th>
								<th>TS</th>
							</tr>
						</thead>
						<tbody>
<?php
$players->each(function($p) {
?>
							<tr>
								<td><?= $p->name; ?></td>
								<td><?= number_format($p->ts, 2); ?></td>
							</tr>
<?php
});
?>
						</tbody>
					</table>
				</form>
			</section>
