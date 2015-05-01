<?php
$this->needed('authenticated');

if (!isset($this['request.id']) || $this['request.id'] == 0) {
	$this->flash('Personne à soigner incorrecte', 'danger');
} else {
	$eleve = $this['db']->selectOne('eleves', array('id' => $this['session.id']));

	if ($eleve['vie'] <= 0) {
		$this->flash('Vous êtes mort et ne pouvez plus soigner', 'danger');
	} elseif ($eleve['a_soigne']) {
		$this->flash('Vous ne pouvez plus soigner aujourd\'hui, revenez demain !', 'danger');
	} elseif ($eleve['id'] == $this['request.id']) {
		$this->flash('Vous ne pouvez pas vous soigner vous-même', 'danger');
	} else {
		$eleveASoigner = $this['db']->selectOne('eleves', array('id' => $this['request.id']));

		if ($eleveASoigner['vie'] <= 0) {
			$this->flash('Cet élève déjà mort, vous ne pouvez pas le soigner !', 'danger');
		} elseif ($eleveASoigner['vie'] >= 10) {
			$this->flash('Cet élève a déjà toute sa vie !', 'danger');
		} else {
			$this['db']->update('eleves', array('vie' => (++$eleveASoigner['vie'])), array('id' => $eleveASoigner['id']));
			$this['db']->update('eleves', array('a_soigne' => 1), array('id' => $eleve['id']));
			$this->flash('Vous avez bien soigné ' . $this->formatName($eleveASoigner) . ', félicitations !', 'success');
			$this->log('a soigné ' . $this->formatName($eleveASoigner), SUCCESS);
		}
	}
}

$this->redirect('eleves');
