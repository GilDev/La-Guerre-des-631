<?php
$this->needed('authenticated');

if (!isset($this['request.id']) || $this['request.id'] == 0) {
	$this->flash('Personne à soigner incorrecte', 'danger');
} else {
	$eleve = $this['db']->selectOne('eleves', array('id' => $this['session.id']));

	if ($eleve['vie'] <= 0) {
		$this->flash('Tu es mort et ne peux plus soigner', 'danger');
	} elseif ($eleve['a_soigne']) {
		$this->flash('Tu ne peux plus soigner aujourd\'hui, reviens demain !', 'danger');
	} elseif ($eleve['id'] == $this['request.id']) {
		$this->flash('Tu ne peux pas te soigner toi-même', 'danger');
	} else {
		$eleveASoigner = $this['db']->selectOne('eleves', array('id' => $this['request.id']));

		if ($eleveASoigner['vie'] <= 0) {
			$this->flash('Cet élève déjà mort, tu ne peux pas le soigner !', 'danger');
		} elseif ($eleveASoigner['vie'] >= 10) {
			$this->flash('Cet élève a déjà toute sa vie !', 'danger');
		} else {
			$this['db']->update('eleves', array('vie' => (++$eleveASoigner['vie'])), array('id' => $eleveASoigner['id']));
			$this['db']->update('eleves', array('a_soigne' => 1), array('id' => $eleve['id']));
			$this->flash('Tu as bien soigné ' . $this->formatName($eleveASoigner) . ', félicitations !', 'success');
			$this->log('a soigné ' . $this->formatName($eleveASoigner), SUCCESS);
		}
	}
}

$this->redirect('eleves');
