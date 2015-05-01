<?php

$this->needed('administrator');

$stmt = $this['db']->query('SELECT prenom, nom, ip, date, message, niveau FROM eleves, log WHERE log.eleve_id = eleves.id ORDER BY date DESC');
$logs = $stmt->fetchAll();

foreach ($logs as &$log) {
	switch ($log['niveau']) {
		case ERROR:
			$log['niveau'] = 'danger';
			break;

		case WARNING:
			$log['niveau'] = 'warning';
			break;

		case SUCCESS:
			$log['niveau'] = 'success';
	}

	$date = DateTime::createFromFormat('Y-m-d H:i:s', $log['date']);
	$log['date'] = $date->format("d/m/y − H:i");
	//$log['date'] = date('d/m/Y', strtotime($log['date']));
}
