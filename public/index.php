<?php

// use Framework\Http\Request;
use Framework\Http\RequestFactory;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$request = RequestFactory::fromGlobals();

$name = $request->getQueryParams()['name'] ?? 'Guest';


echo 'hi '. $name;
