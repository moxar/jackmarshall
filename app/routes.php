<?php

$chunks = explode('.', Request::server('HTTP_HOST'));
$domain = (count($chunks) == 3)?$chunks[0]:'www';

if(File::exists(app_path().'/routes/'.$domain.'.php')) {
	include app_path().'/routes/'.$domain.'.php';
} else {
	include app_path().'/routes/www.php';
}

View::composer('layout', function($view) use ($domain) {
	if(View::exists($domain.'.menu')) {
		$view->with('menu', View::make($domain.'.menu'));
	}
});

Route::bind('faction', function($value, $route) {
	$faction = Faction::where('slug', $value);
	if($faction == null) {
		throw new NotFoundException;
	}
	return $faction;
});

?>