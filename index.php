<?php
	$from_currency    = 'USD';
    $to_currency    = 'JPY';
	$amount            = 1;
    $results = converCurrency($from_currency,$to_currency,$amount);
    $regularExpression     = '#\<span class=bld\>(.+?)\<\/span\>#s';
    preg_match($regularExpression, $results, $finalData);
    echo $finalData[0];

	function converCurrency($from,$to,$amount){
		$url = "http://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
		$request = curl_init();
		$timeOut = 0;
		$userAgent = $_SERVER['HTTP_USER_AGENT'];
		curl_setopt ($request, CURLOPT_URL, $url);
		curl_setopt ($request, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($request, CURLOPT_USERAGENT,$userAgent);
		curl_setopt ($request, CURLOPT_CONNECTTIMEOUT, $timeOut);
		$response = curl_exec($request);
		curl_close($request);
		return $response;
	}
?>
