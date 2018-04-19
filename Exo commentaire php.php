<?php

	// Ajouter des commentaires sur chacune des liens en expliquant ce que fait la ligne.
	// Quand on appelle une fonction, expliciter ce qui se passe

	$txt = "Hello world!";											// Création d'une variable str $txt contenant "Hello world!" 
	$x = 5;															// Création d'une variable int $x contenant 5 

	echo "Bonjour tout le monde";									// Affichage de "Bonjour tout le monde"
	echo "<h3>Bonjour</h3>";										// Affichage d'un titre <h3> : "Bonjour"

	echo $txt;														// Affichage de "Hello world!"

	$y = 9;															// Création d'une variable $y contenant 9
	echo $x + $y;													// Affichage de 5+9, soit 14
	echo $x + "" + $y;												// Affichage de 59


	function displayIfNumberGreather($number){						// Définition d'une fonction displayIfNumberGreather
	  if ($number > 10) {											// Condition : nombre rentré en parametre est il plus grand que 10 ?
	    echo "it is greather than 10";								// Si oui afficher "it is greather than 10"
	  }
	}

	displayIfNumberGreather(15);									// Appel de la fonction displayIfNumberGreather avec 15 en parametre. affichage it is greather than 10
	displayIfNumberGreather($x + $y + 3);							// Appel de la fonction displayIfNumberGreather avec 17 (5+9+3) en parametre. affichage it is greather than 10

	$cars = array("Volvo", "BMW", "Toyota");						// Création d'une variable array $cars contenant "Volvo", "BMW", "Toyota"

	for ($a = 0; $a <= 2; $a++) {									// Parcours un à un les trois premiers éléments du tableau $cars. Pour $a = 0 , tant que $a <= 2, alors j'execute la boucle et j'incrémente $a en fin de boucle 
	    echo "There is a new car created by ".$cars[$a];			// Afficher à chaque tour "There is a new car created by Volvo / BMW / Toyota"
	}

	function afficheNumberOfElemInArray($tab){						// Définition d'une fonction afficheNumberOfElemInArray
	  $numberOfElem = count($tab);									// Création d'une variable $numberOfElem contenant le nombre d'éléments du tableau rentré en parametre (à la fonction qu'on definie, donc à la fonction count() également) 
	  echo "There are " . $numberOfElem . " in the tab";			// Afficher le nombre d'éléments du dit tableau sous la forme "There are x in the tab"
	}

	function getNumberOfElem($tab){									// Définition d'une fonction getNumberOfElem qui prend un tableau en parametre;
	  return count($tab);											// Renvois le nombre d'éléments du tableau rentré en parametre
	}

	$tablo = array("elem1", "elem2", "elem3");						// Création d'une variable array $tablo contenant "elem1", "elem2", "elem3"

	$elem = getNumberOfElem($tablo);								// Création d'une variable $elem contenant 3, soit le nombre d'éléments du tableau $tablo recuperé grace à l'appel de la fonction getNumberOfElem
?>