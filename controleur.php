<?php

set_time_limit (6); //Execution time MAX in seconds

if(isset($_POST['textArea']))
{
	//Input comming from the view
	$input = $_POST['textArea'];

	
	$arrayNumbers = array(/*1,2,3);//*/1,2,3,4,5,6,7,8,9);// array de reference
	$arrayForRand = $arrayNumbers;//array sur lequel on fait un rand

	$arrayLigne = array();//array d'une ligne a ajouter une fois fini a arraycomplet
	$arrayComplet = array();//array final

	$randNumber= 0;
	$value = 10;

	for ($i=0; $i < 10000; $i++) { 
		
		for ($ligne = 0; $ligne < 9; $ligne++) //pour chaque ligne
		{ 
			for ($case = 0; $case < 9; $case++) //pour chaque case d'une ligne
			{
				$arrayForRand = $arrayNumbers;

				for ($preligne=0; $preligne < $ligne; $preligne++)  //on enleve les nombres deja sorti sur cette colone
				{ 
					$key = $arrayComplet[$preligne][$case];
					$key--;//l'array commence a 0
					$arrayForRand[$key] = 0;
				}

				for ($precase=0; $precase < $case; $precase++) //on enleve les nombres deja sorti sur cette ligne
				{ 
					$key = $arrayLigne[$precase]; 
					$key--;//l'array commence a 0
					$arrayForRand[$key] = 0;
				}

				$somme = 0;
				foreach ($arrayForRand as  $value) {
					$somme += $value;
				}

				if($value == 0)
				{
					$arrayComplet = array();
					$arrayLigne = array();
					break;
				}

				do //on cherche parmi les nombres restant
				{
					
					$randNumber = array_rand($arrayForRand);
					//echo ($arrayForRand[$randNumber]);
				}
				while($arrayForRand[$randNumber] == 0);
				//echo "<br>";
				
				array_push($arrayLigne, $arrayForRand[$randNumber]);
			}
			array_push($arrayComplet, $arrayLigne);//ajoute la  ligne
			$arrayLigne = array();//on reset l'array ligne

			if($value == 0)
			{
				$arrayComplet = array();
				$arrayLigne = array();
				break;
			}
		}

		/*if($arrayComplet[0][0] == $arrayComplet[1][1] && $arrayComplet[0][1] == $arrayComplet[1][0])
		{
			break;
		}*/

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
