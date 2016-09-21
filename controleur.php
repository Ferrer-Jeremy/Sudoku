<?php

set_time_limit (6); //Execution time MAX in seconds

if(isset($_POST['textArea']))
{
	//Input comming from the view
	$input = $_POST['textArea'];

	
	$arrayNumbers = array(1,2,3);//1,2,3,4,5,6,7,8,9);// array de reference
	$arrayForRand = $arrayNumbers;//array sur lequel on fait un rand

	$arrayLigne = array();//array d'une ligne a ajouter une fois fini a arraycomplet
	$arrayComplet = array();//array final

	for ($i=0; $i < 100; $i++) { 
		
		for ($ligne = 0; $ligne < 3; $ligne++) //pour chaque ligne
		{ 
			for ($case = 0; $case < 3; $case++) //pour chaque case d'une ligne
			{
				$arrayForRand = $arrayNumbers;

				for ($preligne=0; $preligne < $ligne; $preligne++)  //on enleve les nombres deja sorti sur cette colone
				{ 
					$key = $arrayComplet[$preligne][$case];
					$key--;//l'array commence a 0
					$arrayForRand[$key] = null;
				}

				for ($precase=0; $precase < $case; $precase++) //on enleve les nombres deja sorti sur cette ligne
				{ 
					$key = $arrayLigne[$precase]; 
					$key--;//l'array commence a 0
					$arrayForRand[$key] = null;
				}

				do //on cherche parmi les nombres restant
				{
					$randNumber = array_rand($arrayForRand);
				}
				while($arrayForRand[$randNumber] == null);
				
				array_push($arrayLigne, $arrayForRand[$randNumber]);
			}
			array_push($arrayComplet, $arrayLigne);//ajoute la  ligne
			$arrayLigne = array();//on reset l'array ligne
		}
		$taille = sizeof($arrayComplet)-1;
		$output = json_encode($arrayComplet);
		$arrayComplet = array();
		echo "<br>";
		echo $output;
	}











	


	


	//var_dump($arrayComplet);

	//Output to be send to the view

	$output = json_encode($arrayComplet);
	//echo $output;
}
else
{
	echo "Error textArea isn't set !";
}
