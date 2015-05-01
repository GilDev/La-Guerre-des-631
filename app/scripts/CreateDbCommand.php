<?php

class CreateDbCommand extends ConsoleKit\Command
{
	public function execute(array $args, array $options = array())
	{
		$instructions = <<<'END'

BEGIN TRANSACTION;
CREATE TABLE "eleves" (
	'id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
	'prenom' TEXT NOT NULL,
	'nom' TEXT NOT NULL,
	'mot_de_passe' TEXT NOT NULL,
	'vie' INTEGER NOT NULL DEFAULT 10,
	'nb_coups_restants' INTEGER NOT NULL DEFAULT 3,
	'a_soigne' BOOLEAN NOT NULL DEFAULT 0
);

CREATE TABLE 'log' (
	'id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
	'eleve_id' INTEGER NOT NULL,
	'ip' TEXT NOT NULL,
	'date' DATETIME NOT NULL,
	'message' TEXT NOT NULL,
	'niveau' INTEGER NOT NULL
);

COMMIT;

END;
		$stmt = Atomik::get('db')->exec($instructions);
	}
}