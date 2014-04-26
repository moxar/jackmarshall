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

?>