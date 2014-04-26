			<nav class="pull-right contextual">
				<ul class="nav nav-stacked">
					<li><a href="<?php echo cross('/users'); ?>">Retour</a></li>
					<li><a href="<?php echo cross('/user/'.$user->login.'/edit'); ?>">Modifier</a></li>
					<li><a href="<?php echo cross('/user/'.$user->login.'/delete'); ?>">Supprimer</a></li>
				</ul>
			</nav>
			<h1>Utilisateur <span class="small"><?php echo $user->login; ?></span></h1>
			<dl class="dl-horizontal">
				<dt>Identifiant</dt>
				<dd><?php echo $user->login; ?>
				<dt>Email</dt>
				<dd><?php echo $user->email; ?>
				<dt>Rang</dt>
				<dd><?php echo $user->rank; ?>
			</dl>
