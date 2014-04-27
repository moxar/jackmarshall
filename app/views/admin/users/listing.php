			<h1><?php t('title.admin.user.listing'); ?></h1>
			<table class="table table-striped table-hover table-condensed">
				<colgroup>
					<col style="width: 25px;">
					<col>
					<col>
					<col>
					<col span="2" style="width: 3em;">
				</colgroup>
				<thead>
					<tr>
						<th>#</th>
						<th><?php t('ui.label.login'); ?></th>
						<th><?php t('ui.label.email'); ?></th>
						<th><?php t('ui.label.rank'); ?></th>
						<th><!-- View --></th>
						<th><!-- Edit --></th>
						<th><!-- Delete --></th>
					</tr>
				</thead>
				<tbody>
<?php
foreach(User::all() as $user) {
?>
					<tr>
						<td><?php echo $user->id; ?></td>
						<td><?php echo $user->login; ?></td>
						<td><?php echo $user->email; ?></td>
						<td><?php t('text.rank.'.$user->rank); ?></td>
						<td><a href="<?php c('/user/'.$user->login); ?>" title="<?php t('ui.link.view'); ?>"><span class="glyphicon glyphicon-arrow-right"></span></a></td>
						<td><a href="<?php c('/user/'.$user->login); ?>/edit" title="<?php t('ui.link.edit'); ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
						<td><a href="<?php c('/user/'.$user->login.'/delete'); ?>" title="<?php t('ui.link.delete'); ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
					</tr>
<?php
}
?>
				</tbody>
			</table>
