<?php

	// Browser detection
	include("resources/Browser.php");	

	// Include needed files
	include_once("system/config.php");

	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

	include('resources/simplehtmldom_1_5/simple_html_dom.php');

	// Page menu management
	function menuBar($currentPage, $arg)
	{
	  if ($currentPage == $arg)
	    echo "class=\"active\"";
	}
	$currentPage = "";
	if (!isset($_GET['page']))
		$currentPage = "home";
	else
		$currentPage = $_GET['page'];

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"> 

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<!-- My CSS -->
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-90558889-1', 'auto');
		  ga('send', 'pageview');
		
		</script>
	</head>
	<title>Drone Briefing | beta</title>
	<body>
		<div class="row spacer">
		</div>
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php?page=home">Drone Briefing</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li <?php  menuBar($currentPage, "home"); ?>><a href="index.php?page=home">Home <span class="sr-only">(current)</span></a></li>
<!-- 							<li <?php  menuBar($currentPage, "list"); ?>><a href="index.php?page=list">List</a></li> -->
<!-- 							<li <?php  menuBar($currentPage, "legal"); ?>><a href="index.php?page=legal">Legal</a></li> -->
							<li <?php  menuBar($currentPage, "infos"); ?>><a href="index.php?page=infos">Infos</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<?php
								$languages = getOnlineLanguages();
								while($lg = mysql_fetch_array($languages))
								{
									echo "<li";
									if ($lg['id'] == $languageID)
										echo " class='active'";
									echo ">";
									echo "<a href=\"index.php?changeLanguage=" . $lg['id'] . "\"";
									
									echo ">" . $lg['shortName'] . "</a>";
								}
							?>
							<li <?php  menuBar($currentPage, "links"); ?>><a href="index.php?page=links">Links</a></li>
						</ul>
				    </div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
			<?php
				$pageLoaded = False;
				$page = isset($_GET['page']) ? $_GET['page'] : "";

				switch ($page)
	            {
	            	case "home";
	                    include("pages/home.php");
						$pageLoaded = true;
						break;
					case "list";
	                    //include("pages/list.php");
						$pageLoaded = true;
						break;
					case "infos";
	                    include("pages/infos.php");
						$pageLoaded = true;
						break;
					case "links";
	                    include("pages/links.php");
						$pageLoaded = true;
						break;
	            }
	            // DEFAULT
				if (!$pageLoaded)
				{
					include("pages/home.php");
				}
			?>
			
		</div>
			
		<footer class="footer">
			<div class="container">
				<p class="text-muted">Copyright: Valentin Thirion (valentin[at]medineo[point]be)</p>
			</div>
		</footer>
	</body>
</html>

