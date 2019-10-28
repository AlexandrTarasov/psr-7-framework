<?php

namespace Tests\Framework\Http;

use PHPUnit\Framework\TestCase;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\HtmlResponse;



class ResponseTest extends TestCase
{
	public function tesEmpty(): void
	{
		$response = new HtmlResonse($body = 'Body');

		self::assertEquals($body, $response->getBody()->getContents());
		self::assertEquals(200, $response->getStatusCode());
		self::assertEquals('OK', $response->getReasonPhrase());
	}

	public function test404():void
	{
		$response = new HtmlResponse($body = 'Empty', $status = 404);

		self::assertEquals($body, $response->getBody()->getContents());
		self::assertEquals($status, $response->getStatusCode());
		self::assertEquals('Not Found', $response->getReasonPhrase());
	}
}
