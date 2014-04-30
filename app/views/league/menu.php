				<li class="<?php if(Request::is('/')) { echo 'active'; } ?>"><a href="<?php c('/'); ?>"><?php t('menu.index'); ?></a></li>
				<li class="<?php if(Request::is('leagues/table')) { echo 'active'; } ?>"><a href="<?php c('/leagues/table'); ?>"><?php t('menu.lists'); ?></a></li>
