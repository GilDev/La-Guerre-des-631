<?php

class NewDayCommand extends ConsoleKit\Command
{
	public $dieux = array(	// array('<nom>', masculin?)
		array('Laurence', false),
		array('Bertrand', true),
		array('Lydie', false),
		array('Nicolas', true),
		array('Damien', true),
		array('Laurent', true),
		array('Martine', false)
	);

	public function execute(array $args, array $options = array())
	{
		Atomik::get('db')->update('eleves', array('nb_coups_restants' => 3, 'a_soigne' => 0));


		require(__DIR__ . '/../helpers/formatName.php');

		$nbEleves = Atomik::get('db')->count('eleves', 'vie > 0');

		$fichierDieux = fopen(Atomik::get('fichierDieux'), 'w');
		if ($nbEleves <= 1) {
			unlink(Atomik::get('fichierDieux'));
			return;
		}

		$dieu = $this->dieux[date('N') - 1];

		$victime  = Atomik::get('db')->selectOne('eleves', 'vie > 0 ORDER BY RANDOM()');
		$nbCoups = mt_rand(1, 3);
		$victime['vie'] -= $nbCoups;
		Atomik::get('db')->update('eleves', array('vie' => $victime['vie']), array('id' => $victime['id']));

		$infosDieux = ($dieu[1]) ? 'Le dieu ' : 'La déesse <b>';
		$infosDieux .= $dieu[0];
		$infosDieux .= '</b> a aujourd\'hui choisi de victimiser <b>' . formatName($victime) . '</b> et l\'a frappé <b>' . $nbCoups . '</b> fois !';


		$chanceux = Atomik::get('db')->selectOne('eleves', 'vie > 0 AND vie < 10 AND id <> ' . $victime['id'] . ' ORDER BY RANDOM()');
		if ($chanceux != NULL) {
			$nbSoins = mt_rand(1, 2);
			$chanceux['vie'] += $nbSoins;
			Atomik::get('db')->update('eleves', array('vie' => $chanceux['vie']), array('id' => $chanceux['id']));
			$infosDieux .= "\n" . 'À cause d\'un faux jour sur l\'écran, le dieu <b>Pascal</b> a soigné <b>' . $nbSoins . '</b> fois <b>' . formatName($chanceux) . '</b> !';
		}

		fwrite($fichierDieux, $infosDieux);
	}
}
