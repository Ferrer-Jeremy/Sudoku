<?php

set_time_limit (10); //Execution time MAX in seconds

if(isset($_POST['textArea']))
{
	//Input comming from the view
	$input = $_POST['textArea'];

	$arrayLigne = array(1,2,3,4,5,6,7,8,9);

	$arrayComplet = array();

	shuffle($arrayLigne);//suffle la premiere ligne
	array_push($arrayComplet, $arrayLigne);//ajoute la premiere ligne
	$tours = 0;

	for ($i=1; $i < 7; $i++) //pour faire 6 lignes + la premiere qui est deja faite
	{ 
		$checkLigne = true;
		do
		{
			$errorLigne = 0;
			shuffle($arrayLigne);
			foreach ($arrayComplet as $arrayLigneInside) 
			{
				for ($y=0; $y < 9; $y++) 
				{ 
					if($arrayLigneInside[$y] == $arrayLigne[$y])
					{
						$errorLigne++;
						break;
					}
				}

				if ($errorLigne != 0) 
				{
					break;
				}
			}

			if ($errorLigne == 0) //si il n'y a pas d'erreur on sort de la boucle
			{
				$checkLigne = false;
			}
			$tours ++;
		}
		while($checkLigne);

		array_push($arrayComplet, $arrayLigne); //ajoute la ligne suivante validé
	}

	//je deduis les 2 lignes restantes





	//Output to be send to the view
	array_push($arrayComplet, array($tours));

	$output = json_encode($arrayComplet);
	echo $output;
}
else
{
	echo "Error textArea isn't set !";
}
