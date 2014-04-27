			<nav class="pull-right contextual">
				<ul class="nav nav-stacked">
					<li><a href="<?php c('/users'); ?>"><?php t('ui.link.back'); ?></a></li>
					<li><a href="<?php c('/user/'.$user->login.'/edit'); ?>"><?php t('ui.link.edit');  ?></a></li>
					<li><a href="<?php c('/user/'.$user->login.'/delete'); ?>"><?php t('ui.link.delete'); ?></a></li>
				</ul>
			</nav>
			<h1><?php t('title.admin.user.view'); ?> <span class="small"><?php echo $user->login; ?></span></h1>
			<dl class="dl-horizontal">
				<dt><?php t('ui.label.login'); ?></dt>
				<dd><?php echo $user->login; ?>
				<dt><?php t('ui.label.email'); ?></dt>
				<dd><?php echo $user->email; ?>
				<dt><?php t('ui.label.rank'); ?></dt>
				<dd><?php t('text.rank.'.$user->rank); ?>
			</dl>
