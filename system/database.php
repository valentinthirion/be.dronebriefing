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

	connectGlobalDatabase();

	function connectMysql()
	{
	   $serveur_sql = 'mysql51-30.perso';
	   $sql_user = 'medineodatab';
	   $sql_pass= '8rKm3Smf';

	   /* Connexion SQL */
	   mysql_connect($serveur_sql, $sql_user, $sql_pass); 
	}


	/*
		This functions will connect to the database
		containing the users
	
		It returns true if no problem occured
		Else it returns false
	*/
	function connectGlobalDatabase()
	{
		connectMysql();
		$databaseName = "medineodatab";

		return mysql_select_db($databaseName);
	}
	
?>