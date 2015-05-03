<?php

$this->needed('authenticated');

$eleve  = $this['db']->selectOne('eleves', array('id' => $this['session.id']));

$stmt = $this['db']->query('SELECT id, prenom, nom, nb_coups_restants, vie, a_soigne FROM eleves WHERE id <> ' . $this['session.id'] . ' ORDER BY prenom');
$eleves = $stmt->fetchAll();

$nbEleves = count($eleve);

if (file_exists($this['fichierDieux'])) {
	$dieux = file($this['fichierDieux']);
}
