<?php

$this->needed('authenticated');

$this['session.authenticated'] = false;
$this->log('vient de se déconnecter', WARNING);

$this->redirect('index');
