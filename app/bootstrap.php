<?php

if (Atomik::get('atomik.debug')) {
	ini_set('display_errors', 1);
}

function databaseLog($message, $level)
{
	Atomik::get('db')->insert('log', array(
		'eleve_id' => Atomik::get('session.id'),
		'date' => date("Y-m-d H:i:s"),
		'ip' => $_SERVER['REMOTE_ADDR'],
		'message' => $message,
		'niveau' => $level
	));
}

define('ERROR', 1);
define('WARNING', 2);
define('SUCCESS', 3);

Atomik::listenEvent('Logger::Log', 'databaseLog');
