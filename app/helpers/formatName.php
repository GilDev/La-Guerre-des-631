<?php

function formatName($eleve)
{
	return ucwords($eleve['prenom']) . ' ' . ucwords($eleve['nom']);
}
