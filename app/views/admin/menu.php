				<li class="<?php if(Request::is('/')) { echo 'active'; } ?>"><a href="<?php c('/'); ?>"><?php t('menu.index'); ?></a></li>
				<li class="<?php if(Request::is('user*')) { echo 'active'; } ?>"><a href="<?php c('/users'); ?>"><?php t('menu.users'); ?></a></li>
				<li class="<?php if(Request::is('faction*')) { echo 'active'; } ?>"><a href="<?php c('/factions'); ?>"><?php t('menu.factions'); ?></a></li>
				<li class="<?php if(Request::is('model*')) { echo 'active'; } ?>"><a href="<?php c('/models'); ?>"><?php t('menu.models'); ?></a></li>
