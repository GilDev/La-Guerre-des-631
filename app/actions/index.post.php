<?php

if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['pass'])) {
	$id = $this['db']->selectValue('eleves', 'id' , array(
		'prenom' => strtolower($_POST['prenom']),
		'nom' => strtolower($_POST['nom']),
		'mot_de_passe' => $_POST['pass']
	));

	if ($id !== false) {
		$this['session.authenticated'] = true;
		$this['session.id'] = $id;
		$this->log('vient de se connecter', WARNING);
		$this->redirect('eleves');
	}
}

$this->flash('Identifiants incorrects', 'danger');
