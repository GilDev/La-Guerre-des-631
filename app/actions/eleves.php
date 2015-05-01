<?php

$this->needed('authenticated');

$eleve  = $this['db']->selectOne('eleves', array('id' => $this['session.id']));
$eleves = $this['db']->select('eleves', 'id <> ' . $this['session.id']);
$nbEleves = count($eleve);
