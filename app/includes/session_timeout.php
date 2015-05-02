<?php

if (Atomik::get('session.lastActivity') != NULL && (time() - Atomik::get('session.lastActivity') > 1800)) {
	session_unset();
	session_destroy();
	Atomik::redirect('index');
}
Atomik::set('session.lastActivity', time());
