<?php

function isAdmin()
{
	foreach (Atomik::get('adminIds') as $adminId) {
		if (Atomik::get('session.id') == $adminId) {
			return true;
		}
	}

	return false;
}