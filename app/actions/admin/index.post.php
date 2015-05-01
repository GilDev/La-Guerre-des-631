<?php

$this->needed('administrator');

$_POST['a_soigne'] = (isset($_POST['a_soigne'])) ? 1 : 0;

$this['db']->update('eleves', $_POST, array('id' => $_POST['id']));

$this->flash('Informations sauvegardées !', 'success');
$this->redirect('admin'); // Rechargement pour actualiser les résultats récupérés pas "admin/index.php"
