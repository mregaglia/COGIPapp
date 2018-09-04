<?php

/*
if($_GET["page"] == "user"){
	require "controllers/user.controller.php";
	userPage();
}
*/

switch ($_GET["page"]) {
	case 'fournisseurs':
		require "controllers/fournisseurs.controller.php";
		break;
  case 'clients':
  	require "controllers/clients.controller.php";
  	break;
  case 'detailsociete':
    require "controllers/detailsociete.controller.php";
  	break;


	default:
		// afficher la home page
	echo "Home page";
		break;
}

//contactPage();



?>
