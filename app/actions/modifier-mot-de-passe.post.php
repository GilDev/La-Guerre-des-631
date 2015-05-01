<?php

$this->needed('authenticated');

if (empty($_POST['pass']) || empty($_POST['confirmPass'])) {
	$this->flash('Veuillez entrer un mot de passe', 'danger');
} else {
	if ($_POST['pass'] != $_POST['confirmPass']) {
		$this->flash('Les mots de passe ne sont pas identiques', 'danger');
	} elseif (strlen($_POST['pass']) < 5) {
		$this->flash('Le mot doit faire au moins 5 caractères', 'danger');
	} else {
		$this['db']->update('eleves', array('mot_de_passe' => $_POST['pass']), array('id' => $this['session.id']));
		$this->flash('Votre mot de passe a bien été modifié', 'success');
		$this->redirect('eleves');
	}
}
