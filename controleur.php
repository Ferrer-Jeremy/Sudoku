<?php

set_time_limit (6); //Execution time MAX in seconds

if(isset($_POST['textArea']))
{
	//Input comming from the view
	$input = $_POST['textArea'];

	
	$arrayNumbers = array(1,2,3,4,5,6,7,8,9);

	$arrayComplet = array();//array final

	
	//generation de la grille de base

	for($i = 0 ; $i < 9; $i++) 
	{
		array_push($arrayComplet, $arrayNumbers);
		for($y = 0; $y <3; $y++)
		{
			array_unshift($arrayNumbers, $arrayNumbers[sizeof($arrayNumbers)-1]);
			array_pop($arrayNumbers);
		}

		if($i == 2 || $i == 5) //toute les 3 lignes on decale de 1 en plus
		{
			array_unshift($arrayNumbers, $arrayNumbers[sizeof($arrayNumbers)-1]);
			array_pop($arrayNumbers);
		}
	}


	//modification de la grille aleatoirement
	//$rand = mt_rand(10000,20000);




	for ($tour = 0; $tour < 1000; $tour++) 
	{
		if(mt_rand(0,1) == 0) //deplace les lignes dans leur bloc de 3
		{
			$whichLigne = mt_rand(1,9); //quelle ligne on bouge
			$modulo = $whichLigne % 3; //on determine si c'est celle du haut millieu bas
			$whichLigne--;//l'array commence a 0	

			if($modulo == 1)//depart haut
			{
				$randDestination = mt_rand(1,2);
			}
			else if($modulo == 2)//depart milleu
			{
				do
				{
					$randDestination = mt_rand(-1,1);
				}
				while($randDestination == 0);
			}
			else//depart bas
			{
				$randDestination = mt_rand(-2,-1);
			}

			//on remplace

			$arrayDepart = $arrayComplet[$whichLigne];
			$arrayDestination = $arrayComplet[$whichLigne+$randDestination];
			$arrayComplet[$whichLigne] = $arrayDestination;
			$arrayComplet[$whichLigne+$randDestination] = $arrayDepart;
		}
		else //deplace les colonnes dans leur bloc de 3
		{
			$whichCase = mt_rand(1,9); //quelle colonne on bouge
			$modulo = $whichCase % 3; //on determine si c'est celle de gauche millieu droite
			$whichCase--;//l'array commence a 0

			if($modulo == 1)//depart gauche
			{
				$randDestination = mt_rand(1,2);
			}
			else if($modulo == 2)//depart milleu
			{
				do
				{
					$randDestination = mt_rand(-1,1);
				}
				while($randDestination == 0);
			}
			else//depart droit
			{
				$randDestination = mt_rand(-2,-1);
			}

			//on remplace


			for ($i = 0; $i < 9 ; $i++) 
			{
				$valeurDepart =  $arrayComplet[$i][$whichCase];
				$valeurDestination = $arrayComplet[$i][$whichCase+$randDestination];
				$arrayComplet[$i][$whichCase] = $valeurDestination;
				$arrayComplet[$i][$whichCase+$randDestination] = $valeurDepart;
			}

		}
	}
	



	//Output to be send to the view

	$output = json_encode($arrayComplet);
	echo $output;
}
else
{
	echo "Error textArea isn't set !";
}
