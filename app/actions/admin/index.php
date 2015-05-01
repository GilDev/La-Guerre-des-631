<?php

$this->needed('administrator');

$stmt = $this['db']->query('SELECT id, prenom, nom, nb_coups_restants, vie, a_soigne FROM eleves ORDER BY prenom');
$eleves = $stmt->fetchAll();
