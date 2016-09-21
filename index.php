<!DOCTYPE html>
<html lang="en">
<head>
  <title>Création de groupes Aléatoires</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="ressources/css/bootstrap.min.css">
  <link rel="stylesheet" href="ressources/css/myCss.css">
  <script src="ressources/js/jQuery.js"></script>
  <script src="ressources/js/bootstrap.min.js"></script>
  <script src="ressources/js/myJs.js"></script>
</head>
<body>
	<!-- ensemble  -->
	<div class="container">
	  	<h1 class="text-center">Test de Scripts</h1>
	  	<hr>
	  	<!-- Coté gauche -->
	   	<form class="form-group col-md-6" id="formulaire">
	   		<h3 class="text-center">Formulaire</h3>
	   		<!-- Champ nbPersonnes -->
			<div class="form-group">
			  	<label for="comment">Input :</label>
			  	<textarea class="form-control" rows="17" id="input"></textarea>
			</div>
			<!-- Affichage des erreurs -->
			<div class="form-group col-md-12" id="errors">
			    
		  	</div>
			<!-- Bouton envoyer -->
			<div class="form-group col-md-12">
			    <button type="button" class="btn btn-primary" onclick="envoiAjax()">Envoyer</button>
		  	</div>
		</form>
		<!-- Coté droit -->
		<div class="col-md-6">
			<h3 class="text-center">Résultat</h3>
			<div id="results">
				
			</div>
		</div>
	</div>
</body>
</html>
