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

	require_once("database.php");

	/*
		This function will get the list
		of languages stored in the system
	*/
	function getLanguages()
	{
		// Connect DB
		connectGlobalDatabase();
		
		$result = mysql_query("SELECT * FROM " . PREFIX  . "languages") or die (mysql_error());

		return $result;
	}

	/*

		This function will get the list
		of languages stored in the system
	*/
	function getOnlineLanguages()
	{
		// Connect DB
		connectGlobalDatabase();
		
		$result = mysql_query("SELECT * FROM " . PREFIX  . "languages WHERE status=1") or die (mysql_error());

		return $result;
	}

	/*
		This function will set
		the language for the session
		and load the corresponding file

		if it goes wrong, it returns false
		else it returns the table containing
		all key-values language sentences
	*/
	function getLanguage($id)
	{
		// Connect DB
		connectGlobalDatabase();
		$result = mysql_query("SELECT * FROM " . PREFIX  . "languages WHERE id='$id'") or die (mysql_error());
		$lg = mysql_fetch_array($result);
		$filename = $lg['file'];

		if (defined("SYSTEM_ROOT"))
			$filename = SYSTEM_ROOT . $filename;

		while (!file_exists($filename))
		{
			$filename = "../" . $filename;
		}

		return parse_ini_file($filename);
	}

	/*
		This function gets the language for the
		given LG key
	*/
	function getLanguageForLG($LG)
	{
		// Connect DB
		connectGlobalDatabase();
		$result = mysql_query("SELECT * FROM " . PREFIX  . "languages WHERE shortName='$LG'") or die (mysql_error());
		return mysql_fetch_array($result);
	}

	/*
		This function will get
		the short name
		for the given language
	*/
	function getShortNameForLanguageID($id)
	{
		// Connect DB
		connectGlobalDatabase();
		$result = mysql_query("SELECT * FROM " . PREFIX  . "languages WHERE id='$id'") or die (mysql_error());
		if (mysql_num_rows($result) < 1)
			return "FR";

		$lg = mysql_fetch_array($result);
		return $lg['shortName'];
	}

	/*
		This function will get
		the name
		for the given language
	*/
	function getNameForLanguageID($id)
	{
		// Connect DB
		connectGlobalDatabase();
		$result = mysql_query("SELECT * FROM " . PREFIX  . "languages WHERE id='$id'") or die (mysql_error());

		$lg = mysql_fetch_array($result);

		return $lg['name'];
	}

	/*
		This function
		will get the id of the
		language for the given shortName
	*/
	function getIdForShortLanguageName($shortName)
	{
		// Connect DB
		connectGlobalDatabase();
		$shortName = mysql_real_escape_string(htmlspecialchars($shortName));
		$result = mysql_query("SELECT * FROM " . PREFIX  . "languages WHERE shortName='$shortName'") or die (mysql_error());

		if (mysql_num_rows($result) < 1)
			return 1;
		$lg = mysql_fetch_array($result);
		return $lg['id'];
	}

	/*
		This function returns true if
		the given language is online
		and false if not
	*/
	function isLanguageOnline($id)
	{
		// Connect DB
		connectGlobalDatabase();
		$result = mysql_query("SELECT status FROM " . PREFIX  . "languages WHERE id=$id") or die (mysql_error());
		$language = mysql_fetch_array($result);
		return $language['status'] == 1;
	}

?>
