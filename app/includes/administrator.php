<?php

Atomik::needed('authenticated');

if (!Atomik::isAdmin()) {
	Atomik::flash('Vous n\'avez pas les autorisations nécessaires pour accéder à cette page', 'danger');
	Atomik::redirect('eleves');
}
