			<h1>Tournaments - show</h1>
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
			
			<a href="rounds/<?php echo $tournament->id; ?>/create">Nouvelle ronde</a>