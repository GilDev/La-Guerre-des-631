<?php

Atomik::set(array(
	'app.routes' => array(
		'frapper/:id' => array(
			'action' => 'frapper',
		),
		'soigner/:id' => array(
			'action' => 'soigner',
		)
	),

	'plugins' => array(
		'Db' => array(
			'dsn' => 'sqlite:combat.db'
		),
		'Session',
		'Flash',
		'Logger',
		'Console',
		'Errors' => array(
			'catch_errors' => false
		)
	),

	'app.layout' => '_layout',

	'atomik.url_rewriting' => true,
	'atomik.debug' => false
));
