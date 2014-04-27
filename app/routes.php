<?php

$chunks = explode('.', Request::server('HTTP_HOST'));
$domain = (count($chunks) == 3)?$chunks[0]:'www';

if(File::exists(app_path().'/routes/'.$domain.'.php')) {
	include app_path().'/routes/'.$domain.'.php';
} else {
	include app_path().'/routes/www.php';
}

View::composer('layout', function($layout) use ($domain) {
	if(View::exists($domain.'.menu')) {
		$layout->with('menu', View::make($domain.'.menu'));
	}
});

?>