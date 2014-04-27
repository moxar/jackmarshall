<?php

function t() {
	echo call_user_func_array('trans', func_get_args());
}

?>