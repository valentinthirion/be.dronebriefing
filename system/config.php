<?php

	/*

	This page has been created by Valentin THIRION from The AppLab
	for the LET'sGo project lead by LabeXhe

	Every copy of this file, wholly or partially
    without permission isn't allowed.

    Every copyright or used code are quoted in the
    files they belong to.

    Contact :   valentinthirion@theapplab.be
    WEB :       www.theapplab.be

    © 2013 LetsGo 1.0

    */

	ini_set('post_max_size', '64M');
	ini_set('upload_max_filesize', '64M');
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
	//error_reporting(E_ERROR);

	include_once("languagesManager.php");

	// Synthetize logs
	//include_once("chronTask_logsSynthetizer.php");

	// Manage the update of promotions
	//include_once("chronTask_updatePromotions.php");

	// TIMEZONE SETTING ----------------------------------------
	date_default_timezone_set('Europe/Brussels');
	// ---------------------------------------------------------

	// PLATFORM DETECTION --------------------------------------
	$browser = new Browser();

	// Language ------------------------------------------
	// Const : prefix des tables
   define("PREFIX", "db_");

	$languages = getOnlineLanguages();
	define("NUMBER_OF_LANGUAGES", mysql_num_rows($languages));
	$languageID = 1;

	// If city is set
	if (isset($_COOKIE['languageID']))
		$languageID = $_COOKIE['languageID'];
	else
	{
		$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
		switch ($lang)
		{
		    case "fr":
		    	if (isLanguageOnline(1))
		 	       $languageID = 1;
		        break;
		    case "en":
		    	if (isLanguageOnline(2))
			        $languageID = 2;
		        break;
			case "nl":
					if (isLanguageOnline(3))
					$languageID = 3;
		        break;
		    case "de":
		    		if (isLanguageOnline(4))
					$languageID = 4;
		    	break;
		    default:
		        $languageID = 1;
		        break;
		}
	}

	// Change the language
	if (isset($_GET['changeLanguage']) && ($_GET['changeLanguage'] >= 0))
	{
		if ($_GET['changeLanguage'] > 4)
			$languageID = 1;
		else
			$languageID = $_GET['changeLanguage'];
	}

	if (!isLanguageOnline($languageID))
		$languageID = 1;

	//$_SESSION['languageID'] = $languageID;
	//echo "language : " . $languageID;
	setcookie("languageID", $languageID, time() + 1314000);
	$language = getLanguage($languageID);
	// Define the language constant
	define("LG", getShortNameForLanguageID($languageID));
	//----------------------------------------------------

	// ---------------------------------------------------
	define("ACTUAL_URL", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

?>