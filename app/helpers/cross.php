<?php

function cross($path = null) {
	if($path == null) {
		// '' -> 'host.tld'
		return scheme().host();
	}

	$chunks = explode(':', $path, 2);
	if(count($chunks) == 2) {
		if(empty($chunks[0])) {
			// ':/path' -> 'host.tld/path'
			return scheme().host().'/'.ltrim($chunks[1], '/');
		}
		// 'domain:/path' -> 'domain.host.tld/path'
		return scheme().$chunks[0].'.'.host().'/'.ltrim($chunks[1], '/');
	}

	if($chunks[0][0] == '/') {
		// '/path' -> 'domain.host.tld/path'
		return scheme().sub().'.'.host().'/'.ltrim($chunks[0], '/');
	}

	// 'domain' -> 'domain.host.tld'
	return scheme().$chunks[0].'.'.host();
}

function c() {
	echo call_user_func_array('cross', func_get_args());
}

function scheme() {
	static $scheme = null;
	if($scheme == null) {
		$scheme = (Request::secure())?'https://':'http://';
	}
	return $scheme;
}

function host() {
	static $host = null;
	if($host == null) {
		$chunks = explode('.', Request::server('HTTP_HOST'));
		$number = count($chunks);
		$host = $chunks[$number-2].'.'.$chunks[$number-1];
	}
	return $host;
}

function sub() {
	static $domain = null;
	if($domain == null) {
		$chunks = explode('.', Request::server('HTTP_HOST'));
		if(count($chunks) == 3) {
			$domain = $chunks[0];
		} else {
			$domain = 'www';
		}
	}
	return $domain;
}

function sorturl($field) {
	if(!Input::has('sort')) {
		$fields = array();
		$orders = array();
	} else {
		$fields = explode(',', Input::get('sort'));
		$orders = explode(',', Input::get('order'));
	}

	$index = array_search($field, $fields);

	if($index === false) {
		$order = 'asc';
	} else if($index !== 0) {
		$order = $orders[$index];
		unset($fields[$index]);
		unset($orders[$index]);
	} else {
		$order = ($orders[$index]=='asc')?'desc':'asc';
		unset($fields[$index]);
		unset($orders[$index]);
	}

	array_unshift($fields, $field);
	array_unshift($orders, $order);

	$_GET['sort'] = implode(',', $fields);
	$_GET['order'] = implode(',', $orders);

	return Request::url().'?'.http_build_query($_GET);
}

?>