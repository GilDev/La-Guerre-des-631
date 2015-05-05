<?php

Atomik::needed('authenticated');

if (!Atomik::isAdmin()) {
	Atomik::flash('Tu n\'a pas les autorisations nécessaires pour accéder à cette page', 'danger');
	Atomik::redirect('eleves');
}
