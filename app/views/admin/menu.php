				<li class="<?php if(Request::is('/')) { echo 'active'; } ?>"><a href="<?php echo cross('/'); ?>">Index</a></li>
				<li class="<?php if(Request::is('user*')) { echo 'active'; } ?>"><a href="<?php echo cross('/users'); ?>">Utilisateurs</a></li>
				<li class="<?php if(Request::is('faction*')) { echo 'active'; } ?>"><a href="<?php echo cross('/factions'); ?>">Factions</a></li>
