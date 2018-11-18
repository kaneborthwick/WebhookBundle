<?php

namespace WebhookBundle\Handler;

// do: move into a command line script

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Towersystems\Webhook\Manager\CallbackManagerInterface;
use Zend\Diactoros\Response\EmptyResponse;

final class RunProcessorHandler implements MiddlewareInterface {

	/**
	 * [$processor description]
	 * @var [type]
	 */
	protected $processor;

	/**
	 * [__construct description]
	 * @param CallbackManagerInterface $processor [description]
	 */
	public function __construct(
		CallbackManagerInterface $processor
	) {
		$this->processor = $processor;
	}

	/**
	 * {@iheritdoc}
	 */
	public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface{
		$this->processor->process();
		return new EmptyResponse(200);
	}

}
