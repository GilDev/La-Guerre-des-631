<?php

function formatName($eleve)
{
	if ($pos = strpos($eleve['prenom'], '-') !== false) {
		$pos++;
		$eleve['prenom'][$pos] = mb_convert_case($eleve['prenom'][$pos], MB_CASE_UPPER, 'UTF-8');
	}
	if ($pos = strpos($eleve['nom'], '-') !== false) {
		$pos++;
		$eleve['nom'][$pos] = mb_convert_case($eleve['nom'][$pos], MB_CASE_UPPER, 'UTF-8');
	}

	return mb_convert_case($eleve['prenom'], MB_CASE_TITLE, 'UTF-8') . ' ' . mb_convert_case($eleve['nom'], MB_CASE_TITLE, 'UTF-8');
}
