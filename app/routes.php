<?php

$host = explode('.', Request::server('HTTP_HOST'));
$domain = (count($host) == 3)?$host[0]:'tournament';

if(File::exists(app_path().'/routes/'.$domain.'.php')) {
	include app_path().'/routes/'.$domain.'.php';
}

?>