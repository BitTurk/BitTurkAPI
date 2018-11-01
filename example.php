<?php

$responseTicker = curl_call('https://api.bitturk.com/v1/ticker');
print_r($responseTicker);

echo '<hr />';

$responseTransactions = curl_call('https://api.bitturk.com/v1/transactions?Pair=BTCTRY');
print_r($responseTransactions);

echo '<hr />';


//You can create the API key from [https://bitturk.com/api] page in your exchange account. You should logged in to create API keys.
$YourAPIKey = '';
$YourAPISecret = '';


$responseUserWallet = curl_call('https://api.bitturk.com/v1/userwallet?Symbol=BTC',$YourAPIKey,$YourAPISecret);
print_r($responseUserWallet);



function curl_call($Url,$APIKey='',$APISecret='')
{
    $Headers = array();
	if($APIKey!='' && $APISecret!='')
	{
		$Nonce = time();
		$PlainText = $APIKey.$Nonce;
		$Hashed = hash_hmac('sha256', $PlainText, $APISecret, true);
		$Signature = base64_encode($Hashed);

		$Headers = array(
			'X-ApiKey: '.$APIKey,
			'X-Nonce: '.$Nonce,
			'X-Signature: '.$Signature
		);
	}


	$ch = curl_init($Url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
	curl_setopt($ch, CURLOPT_TIMEOUT, 30); 
        
	if(count($Headers) > 0)
	{
		curl_setopt($ch, CURLOPT_HTTPHEADER, $Headers);
	}
	$result = curl_exec($ch);

	$error = false;
	if ($result === false) 
	{
		$error = true;
		curl_close($ch);
	}

	$json_return = json_decode($result, true);

	if (json_last_error() != 0)
	{
		$error = true;
	}

	if (isset($json_return['error'])) 
	{
		$error = true;
	}

	if($error==false)
	{
		curl_close($ch);
		return $json_return;
	}

	return false;
}
?>