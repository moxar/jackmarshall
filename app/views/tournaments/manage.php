			<ol>
<?php
foreach($players as $player)
{
?>
				<li><?php echo $player->name; ?></li>
<?php
}
?>
			</ol>
			
			<form role="form" class="form" id="tournamentManageForm">
				<fieldset data-player="1">
					<label>Joueur<input class="form-control" type="text" name="player" placeholder="Nom"/></label>
					<label>V<input class="form-control" type="checkbox" name="victory"/></label>
					<label>Points de contrôle<input class="form-control" type="text" name="control" placeholder="control points" /></label>
					<label>Points de destruction<input class="form-control" type="text" name="destruction" placeholder="destruction points" /></label>
				</fieldset>
					
				<fieldset data-player="2">
					<label>Joueur<input class="form-control" type="text" name="player" placeholder="Nom"/></label>
					<label>V<input class="form-control" type="checkbox" name="victory"/></label>
					<label>Points de contrôle<input class="form-control" type="text" name="control" placeholder="control points" /></label>
					<label>Points de destruction<input class="form-control" type="text" name="destruction" placeholder="destruction points" /></label>
				</fieldset>
				
				<fieldset>
					<input type="button" class="btn btn-default" value="Add" />
				</fieldset>
			</form>