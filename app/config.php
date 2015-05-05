<?php

Atomik::set(array(
	'app.routes' => array(
		'frapper/:id' => array(
			'action' => 'frapper'
		),
		'soigner/:id' => array(
			'action' => 'soigner'
		)
	),

	'plugins' => array(
		'Db' => array(
			'dsn' => 'sqlite:guerre.db'
		),
		'Session',
		'Flash',
		'Logger',
		'Console',
		'Errors' => array(
			'catch_errors' => true
		)
	),

	'adminIds' => array(12),
	'fichierDieux' => 'dieux.txt',

	'app.layout' => '_layout',

	'atomik.url_rewriting' => true,
	'atomik.debug' => true
));
