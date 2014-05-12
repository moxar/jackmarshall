			<h1><?php t('title.league.league.new'); ?></h1>
			<form class="form" role="form" method="POST">
				<div class="form-group">
					<label for="name" class="control-label"><?php t('ui.label.name'); ?></label>
					<input type="text" name="name" id="name" placeholder="<?php t('ui.placeholder.name'); ?>" class="form-control" required>
				</div>
				<div class="form-group">
<?php
foreach(Auth::user()->players()->get() as $player) {
?>
					<label for="name" class="control-label">
						<input type="checkbox" name="players[<?php echo $player->id; ?>]" />
						<?php echo $player->name; ?>
					</label>
					<br/>
<?php
}
?>
				</div>
				<div class="form-group">
<?php
foreach(Auth::user()->objectives()->get() as $objective) {
?>
					<label for="name" class="control-label">
						<input type="checkbox" name="objectives[<?php echo $objective->id; ?>]" />
						<?php echo $objective->name; ?>
					</label>
					<br/>
<?php
}
?>
				</div>
				<div class="form-group">
					<input type="submit" value="<?php t('ui.submit.create'); ?>" class="btn btn-default">
				</div>
			</form>
 
