<?php

Atomik::needed('authenticated');

$isAdmin = false;

foreach (Atomik::get('adminIds') as $adminId) {
	if (Atomik::get('session.id') == $adminId) {
		$isAdmin = true;
		break;
	}
}

if (!$isAdmin) {
	Atomik::flash('Vous n\'avez pas les autorisations nécessaires pour accéder à cette page', 'danger');
	Atomik::redirect('eleves');
}
