			<section class="container">
				<script type="text/javascript" src="js/rounds.create.js"></script>

				<nav>
					<a href="tournaments/<?php echo $tournament->id; ?>"><?php echo $tournament->name; ?></a>
					&gt; Ronde - <?php echo $round->number; ?>
				</nav>
				<h1>Nouvelle ronde</h1>
				<form method="POST">
					<input type="hidden" name="number" value="<?php echo $round->number; ?>" />
					<section id="playerPool">
						<section class="row">
							<section class="cell th">Ronde <?php echo $round->number; ?></section><!--
<?php				
for($ct = 1; $ct <= $ppg; $ct++) {
?>
							--><section class="cell th">Joueur <?php echo $ct; ?></section><!--
<?php
}
?>
						--></section>
<?php
$pt = 0;
for($rt = 1; $rt <= ($players->count() / $ppg); $rt++) {
?>
						<section class="row">
							<input type="hidden" name="games[<?php echo $rt; ?>][slug]" value="T <?php echo $rt; ?>" />
							<section class="cell th">Partie <?php echo $rt; ?></section><!--
<?php
	for($ct = 1; $ct <= $ppg; $ct++) {
?>
							--><section class="cell">
								<span><?php echo $players[$pt]->name; ?></span>
								<input type="hidden" name="games[<?php echo $rt; ?>][players][<?php echo $ct; ?>]" value="<?php echo $players[$pt]->id; ?>" />
							</section><!--
<?php
		$pt++;
	}
?>
						--></section>
<?php
}
?>
					</section>
					<fieldset>
						<input type="submit" value="Créer" class="btn btn-default"/>
						<input type="button" value="Mélanger" id="shuffleButton" class="btn btn-default" />
						<input type="button" value="Classement automatique" id="orderButton" class="btn btn-default" />
					</fieldset>
				</form>
			
