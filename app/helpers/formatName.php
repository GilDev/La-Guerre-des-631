<?php

function formatName($eleve)
{
	return ucfirst($eleve['prenom']) . ' ' . ucfirst($eleve['nom']);
}
