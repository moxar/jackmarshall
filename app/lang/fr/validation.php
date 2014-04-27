<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	'email'        => 'Le champ :attribute n\'est pas une adresse email valide',
	'required'     => 'Le champ :attribute est requis.',
	'same'         => 'Les champs :attribute et :other doivent correspondre',
	'unique'       => 'Le champ :attribute existe déjà.',

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention 'attribute.rule' to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(
		'wrong_credentials' => 'Identifiant ou mot de passe invalide',
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of 'email'. This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(
		'login' => 'Identifiant',
		'password' => 'Mot de passe',
		'confirmation' => 'Confirmation',
		'email' => 'Adresse email',
	),

);
