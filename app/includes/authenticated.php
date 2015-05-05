<?php

if (Atomik::get('session.authenticated', false) === false) {
	Atomik::flash('Tu dois être connecté pour accéder à cette page', 'danger');
	Atomik::redirect('index');
}
