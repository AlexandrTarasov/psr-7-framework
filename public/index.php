<?php

use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\ServerRequestFactory;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$request = ServerRequestFactory::fromGlobals();

$name = $request->getQueryParams()['name'] ?? 'Guest';
$response = (new HtmlResponse('Hello,' . $name . '!'))
	->withHeader('X-developer', 'Alex T');

header('HTTP/1.0 '. $response->getStatusCode() . ' ' . $response->getReasonPhrase());
foreach($response->getHeaders() as $name => $values){
	header($name . ':' . implode(', ', $values));
}


echo $response->getBody();

