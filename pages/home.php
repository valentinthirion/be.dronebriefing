<div class="jumbotron">
	<h1>Drone Briefing</h1>
	<h2>Get your Drone briefing done in seconds</h2>
</div>
<div class="row">
	<div class="col-sm-3">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- DroneBriefing Home Left -->
			<ins class="adsbygoogle"
			     style="display:inline-block;width:300px;height:600px"
			     data-ad-client="ca-pub-0234444476826021"
			     data-ad-slot="4463732435"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
	</div>
	<div class="col-sm-6">
		<ol>
			<li>
				<h5><a name="MAP">Low Air Map</a></h5>
				<p>
					<a href="https://map.droneguide.be/" target="_blank">Open Drone Map</a>
				</p>
			</li>
			
			<li>
				<h5><a name="WEATHER">Weather</a></h5>
				<p>
					<?php
						$html = file_get_html('http://www.meteo.be/meteo/view/fr/65656-Meteo.html');
						foreach($html->find('div') as $div) {
							if ($div->class == 'map_content') {
								$p = $div->find('p');
                                echo substr($p[0], 0, strrpos($p[0], "Ce soir"));
								$p = explode("<br>", $p[0]);
								//echo $p2[0];
							}
						}
						$html = file_get_html('http://www.meteo.be/meteo/view/fr/123361-Radar.html');
						foreach($html->find('img') as $div) {
							if ($div->alt == 'Image radar de précipitation en Belgique Radar composite Belgium') {
								$src = $div->src;
								//copy("http://www.meteo.be" . $src, 'tmp/image.jpeg');
								//$content = file_get_contents("http://www.meteo.be" . $src);
								//$image = imagecreatefromjpeg($content);
								//echo $image;
								echo "<img src=\"http://www.meteo.be" . $src . "\" width='95%' />";
							}
						}
					?>
					
				</p>
				<quote>
					 Text: <a href="http://www.meteo.be/meteo/view/fr/65656-Meteo.html">Source</a>
                    <br />
                    Image: <a href="http://www.meteo.be/meteo/view/fr/123361-Radar.html">Source</a>
				</quote>
			</li>
			<li>
				<h5><a name="METAR">METAR & TAF</a></h5>
				<script type="text/javascript" src="https://api.checkwx.com/widgets/metartaf.js"></script>
				<h6>Select a station</h6>
				<select name="metar-taf-station">
					<option value="EBBR">EBBR</option>
					<option value="EBCI">EBCI</option>
					<option value="EBLG">EBLG</option>
				</select>
					<div class="checkwx-container" data-type="METAR" data-station="EBLG"></div>
					<div class="checkwx-container" data-type="TAF" data-station="EBLG"></div>
				<quote>
					 <a href="http://en.allmetsat.com/metar-taf/netherlands-belgium-luxembourg.php?icao=EBLG" >Source</a>
				</quote>
			</li>
			<li>
				<h5><a name="NOTAM">NOTAM</a></h5>
				<p>
					Select here your fly zone in order to get the correct subsequent briefing information.
				</p>
				<form name="flyZoneForm" method="post" action="#NOTAM">
					Zone: <input type="text" name="flyZone" placeholder="Enter here the zone you want to fly in" size="40"/>
					<input type="submit" name="Select"/>
				</form>
			</li>
			<li>
				<h5><a name="KP">KP</a></h5>
				<p>
					<?php
						$html = file_get_html('https://www.spaceweatherlive.com/en/auroral-activity/the-kp-index');
						if ($html != FALSE) {
							foreach ($html->find('h5') as $div) {
								if ($div->class='PLwaarden center') {
									echo $div;
								}
							}
						}
						
					?>
				</p>
				<quote>
					 <a href="https://www.spaceweatherlive.com/en/auroral-activity/the-kp-index" >Source</a>
				</quote>
				
			</li>
		</ol>
	</div>
	<div class="col-sm-3">
		<div class="row">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- DroneBriefing Home Right -->
				<ins class="adsbygoogle"
				     style="display:block"
				     data-ad-client="ca-pub-0234444476826021"
				     data-ad-slot="5199945634"
				     data-ad-format="auto"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
		</div>
	</div>				
</div>