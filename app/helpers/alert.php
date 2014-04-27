<?php

function alert($errors, $level = 'danger', $dismissable = true) {
	if(count($errors) == 0) {
		return '';
	}

	$alert = '<div class="alert alert-'.$level;
	if($dismissable) {
		$alert .= ' alert-dismissable';
	}
	$alert .= '">';
	if($dismissable) {
		$alert .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
	}
	$alert .= '<ul>';
	foreach($errors as $e) {
		$alert .= '<li>'.$e.'</li>';
	}
	$alert .= '</ul>';
	$alert .= '</div>';
	return $alert;
}

function a() {
	echo call_user_func_array('alert', func_get_args());
}

?>