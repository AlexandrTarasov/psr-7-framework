<?php

namespace Tests\Framework\Http;

use Framework\Http\Response;
use PHPUnit\Framework\TestCase;



class ResponseTest extends TestCase
{
	public function tesEmpty(): void
	{
		$response = new Response($body = 'Body');

		self::assertEquals($body, $response->getBody()->getContents());
		self::assertEquals(200, $response->getStatusCode());
		self::assertEquals('OK', $response->getReasonPhrase());
	}

	public function test404():void
	{
		$response = new Response($body = 'Empty', $status = 404);

		self::assertEquals($body, $response->getBody()->getContents());
		self::assertEquals($status, $response->getStatusCode());
		self::assertEquals('Not Found', $response->getReasonPhrase());
	}
}
