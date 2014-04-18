			<h1>
				<a href="tournaments/<?php echo $report->tournament()->id; ?>"><?php echo $report->tournament()->name; ?></a> &gt;
				<a href="rounds/<?php echo $report->round()->id; ?>/update">Ronde <?php echo $report->round()->number; ?></a> &gt;
				Rapport - <?php echo $report->player()->name; ?>
			</h1>
			<form method="POST">
				<fieldset>
					<input type="hidden" name="player" value="<?php echo $report->player()->id; ?>" />
					<input type="hidden" name="game" value="<?php echo $report->game()->id; ?>" />
					<label>Victoire<input type="radio" name="victory" value="1" <?php if($report->victory == true) echo 'checked'; ?>/></label><br/>
					<label>Défaite<input type="radio" name="victory" value="0" <?php if($report->victory == false) echo 'checked'; ?> /></label><br/>
					<label>Control<input class="form-control" type="text" name="control" value="<?php echo $report->control; ?>" /></label><br/>
					<label>Destruction<input type="text" name="destruction" value="<?php echo $report->destruction; ?>" /></label><br/>
					<input type="submit" value="Valider" class="btn btn-default"/>
				</fieldset>
			</form> 
