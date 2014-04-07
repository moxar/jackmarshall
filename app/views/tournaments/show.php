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
			
			<a href="reports/<?php echo $tournament->id; ?>/create">Nouveau rapport</a>