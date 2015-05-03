<?php

$this->needed('administrator');

$this['db']->delete('log');

$this->redirect('admin');
