<?php
	$weather= "";
	$error = "";
	
	if($_GET['city']){
		
		$urlContents = 
		
		file_get_contents ("http://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city']).",uk&appid=4af13863c2792b2ca680560ae9ba08eb");
		
		$weatherArray = json_decode($urlContents, true);
		
		
		if($weatherArray['cod'] == 200) {
		
		$weather = "The weather in ".$_GET['city']." is currently ".$weatherArray['weather'][0]['description']."' '"; 
		
		$tempInCelcius = intval($weatherArray['main']['temp'] - 273);
		
		$weather .= "<br>the temperature is ".$tempInCelcius."&deg;c";
		
		$weather .= "<br>and the wind speed is ".$weatherArray['wind']['speed']." M/S";
	
		} else {
			
			$error = "Couldnt not find city please try again";
			
		}
	
	}
?>	