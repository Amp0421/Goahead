<?php
	$apiKey = "pen15";

	if(empty($_GET['key'])){
		die('API Key cannot be empty!');
	}else{
		if(isset($_GET['key'])){
			if(empty($_GET['rIP']) || empty($_GET['rPort'])){
				die('Remote IP and/or Remote Port fields cannot be empty!');
			}else{	
				if($_GET['key'] == $apiKey)
				{
					if(isset($_GET['rIP']) && isset($_GET['rPort'])){
						$rIP  = $_GET['rIP'];
						$rPort = $_GET['rPort'];
						
						if (filter_var($rIP, FILTER_VALIDATE_IP)) {
							if(is_numeric($rPort)){
								$url = "http://".$rIP.":".$rPort."/";	

								$ch = curl_init($url);
								curl_setopt($ch, CURLOPT_HEADER, 1);
								curl_setopt($ch, CURLOPT_NOBODY, 1);
								curl_setopt($ch, CURLOPT_TIMEOUT, 10);
								$ch = curl_exec($ch);
							}else{
								die("$rPort is not numeric!");
							}
						
						} else {
							die("$rIP is not a valid IP!");
						}
					}else{
						die('Remote IP and/or Remote Port fields cannot be empty!');
					}					
				}else{
					die('Wrong API Key!');
				}			
			}
		}else{
			die('API Key not set!');
		}		
	}	
?>