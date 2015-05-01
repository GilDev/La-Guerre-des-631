<?php

if (Atomik::get('session.authenticated', false) === false) {
	Atomik::flash('Veuillez vous connecter pour accéder à cette page', 'danger');
	Atomik::redirect('index');
}
