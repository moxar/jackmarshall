			<section class="tournament-continuous container">
				<nav><a href="<?= action("TournamentsController@listing"); ?>">Tournois</a></nav>
				<h1>Classement</h1>
				<form>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="from" class="control-label">après le</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="from" id="from" class="form-control" value="<?= $from; ?>"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="from" class="control-label">avant le</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="to" id="to" class="form-control" value="<?= $to; ?>" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="submit" class="btn btn-primary" value="Calculer"/>
                                        </div>
                                    </div>
				</form>
				<hr/>
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
                            </section>
