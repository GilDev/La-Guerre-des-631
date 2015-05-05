<?php
$this->needed('authenticated');

if (!isset($this['request.id']) || $this['request.id'] == 0) {
	$this->flash('Personne à frapper incorrecte', 'danger');
} else {
	$eleve = $this['db']->selectOne('eleves', array('id' => $this['session.id']));

	if ($eleve['vie'] <= 0) {
		$this->flash('Tu es mort et ne peux plus frapper', 'danger');
	} elseif ($eleve['nb_coups_restants'] == 0) {
		$this->flash('Tu ne peux plus frapper aujourd\'hui, reviens demain ! ;-)', 'danger');
	} elseif ($eleve['id'] == $this['request.id']) {
		$this->flash('Pourquoi veux-tu te frapper toi-même ?!', 'danger');
	} else {
		$eleveAFrapper = $this['db']->selectOne('eleves', array('id' => $this['request.id']));

		if ($eleveAFrapper['vie'] <= 0) {
			$this->flash('Cet élève est déjà mort !', 'danger');
		} else {
			$this['db']->update('eleves', array('vie' => (--$eleveAFrapper['vie'])), array('id' => $eleveAFrapper['id']));
			$this['db']->update('eleves', array('nb_coups_restants' => (--$eleve['nb_coups_restants'])), array('id' => $eleve['id']));
			if ($eleveAFrapper['vie'] <= 0) {
				$this->flash('Tu as tué ' . $this->formatName($eleveAFrapper) . ', félicitations ! Il le méritait sûrement de toute façon…', 'success');
				$this->log('a tué '. $this->formatName($eleveAFrapper), ERROR);
			} else {
				$this->flash('Tu as bien frappé ' . $this->formatName($eleveAFrapper) . ', félicitations !', 'success');
				$this->log('a frappé ' . $this->formatName($eleveAFrapper), SUCCESS);
			}
		}
	}
}

$this->redirect('eleves');
