<?php

namespace App\Http\Action;

use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use App\Http\Middleware\BasicAuthMiddleware;

class CabinetAction
{
	public function __invoke(ServerRequestInterface $request)
	{
		$username = $request->getAttribute(BasicAuthMiddleware::ATTRIBUTE);
		return new HtmlResponse('I am logged in as ' . $username);
	}
}
