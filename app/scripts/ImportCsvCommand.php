<?php

class ImportCsvCommand extends ConsoleKit\Command
{
	public function execute(array $args, array $options = array())
	{
		if (!isset($args[0]) || !file_exists($args[0])) {
			$this->writeln('Fichier incorrect');
			return;
		}

		$data = array_map('str_getcsv', file($args[0]));

		foreach ($data as $eleve) {
			Atomik::get('db')->insert('eleves', array(
				'nom' => mb_strtolower($eleve[0], 'UTF-8'),
				'prenom' => mb_strtolower($eleve[1], 'UTF-8'),
				'mot_de_passe' => str_replace('/', '', $eleve[2])
			));
		}
	}
}
