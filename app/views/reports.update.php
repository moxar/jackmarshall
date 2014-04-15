			<h1>Rapport - <?php echo $report->game()->slug; ?></h1>
			<form method="POST">
				<fieldset>
					<input type="hidden" name="player" value="<?php echo $report->player()->id; ?>" />
					<input type="hidden" name="game" value="<?php echo $report->game()->id; ?>" />
					<label>Victoire<input type="radio" name="victory" value="true" <?php if($report->victory === true) echo "selected"; ?>/></label>
					<label>Défaite<input type="radio" name="victory" value="false" <?php if($report->victory === false) echo "selected"; ?> /></label>
					<label>Control<input type="text" name="control" value="<?php echo $report->control; ?>" /></label>
					<label>Destruction<input type="text" name="destruction" value="<?php echo $report->destruction; ?>" /></label>
					<input type="submit" value="Valider" />
				</fieldset>
			</form> 
