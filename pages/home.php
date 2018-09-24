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
				<p>
					<?php
						$html = file_get_html('http://en.allmetsat.com/metar-taf/netherlands-belgium-luxembourg.php?icao=EBLG');
						if ($html != FALSE) {
							foreach ($html->find('p') as $div) {
								if (strpos($div, 'METAR:') != False) {
									echo $div;
								}
							}
						}
						
					?>
				</p>
				<quote>
					 <a href="http://en.allmetsat.com/metar-taf/netherlands-belgium-luxembourg.php?icao=EBLG" >Source</a>
				</quote>
			</li>
			<li>
				<h5><a name="TAF">TAF</a></h5>
				<p>
					<?php
						$html = file_get_html('http://en.allmetsat.com/metar-taf/netherlands-belgium-luxembourg.php?icao=EBLG');
						if ($html != FALSE) {
							foreach ($html->find('p') as $div) {
								if (strpos($div, 'TAF:') != False) {
									echo $div;
								}
							}
						}
						
					?>
				</p>
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
				<p>
					<?php
						$flyZone = isset($_POST['flyZone']) ? $_POST['flyZone'] : "";
						if ($flyZone != "") {
							$html = file_get_html("https://www.belgocontrol.be/opersite/notamsummary.do?cmd=summaryToHtml");
							if ($html != FALSE) {
								$notamFound = False;
								foreach ($html->find('p') as $div) {
									if (strpos($div, $flyZone) != False) {
										echo $div;
										$notamFound = True;
									}
								}
								if ($notamFound == False) {
									echo "No NOTAM found for the specified zone";
								}
							}
						}
						else {
							echo "Enter the fly zone at the point 1 to get NOTAM";
						}
					?>
				</p>
				<quote>
					 <a href="https://www.belgocontrol.be/opersite/notamsummary.do?cmd=summaryToHtml" >Source</a>
				</quote>
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
			<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:39.3518518519% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BPQ7JlyBa4j/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">Aucun filtre, aucune retouche, juste une photo prise en bord de Meuse avec le drone. #wood #maas #meuse #liege #livefromliege #phantom #dji</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">A photo posted by Val Thirion (@ival) on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2017-01-15T00:11:52+00:00">Jan 14, 2017 at 4:11pm PST</time></p></div></blockquote> <script async defer src="//platform.instagram.com/en_US/embeds.js"></script>
		</div>
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