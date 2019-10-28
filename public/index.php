<?php

use Zend\Diactoros\Response\HtmlResonse;
use Zend\Diactoros\ServerRequestFactory;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$request = ServerRequestFactory::fromGlobals();

$name = $request->getQueryParams()['name'] ?? 'Guest';
$response = (new HtmlResonse('Hello,' . $name . '!'))
	->withHeader('X-developer', 'Alex T');

header('HTTP/1.0 '. $response->getStatusCode() . ' ' . $response->getReasonPhrase());
foreach($response->getHeaders() as $name => $values){
	header($name . ':' . implode(', ', $values));
}


echo $response->getBody();

