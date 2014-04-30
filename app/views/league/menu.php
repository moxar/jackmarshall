				<li class="<?php if(Request::is('/')) { echo 'active'; } ?>"><a href="<?php c('/'); ?>"><?php t('menu.index'); ?></a></li>
				<li class="<?php if(Request::is('leagues/table')) { echo 'active'; } ?>"><a href="<?php c('/leagues/table'); ?>"><?php t('menu.league.table'); ?></a></li>
				<li class="<?php if(Request::is('leagues/create')) { echo 'active'; } ?>"><a href="<?php c('/leagues/create'); ?>"><?php t('menu.league.create'); ?></a></li>
