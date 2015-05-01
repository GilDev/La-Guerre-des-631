<?php

class NewDayCommand extends ConsoleKit\Command
{
	public function execute(array $args, array $options = array())
	{
		Atomik::get('db')->update('eleves', array('nb_coups_restants' => 3, 'a_soigne' => 0));
	}
}
