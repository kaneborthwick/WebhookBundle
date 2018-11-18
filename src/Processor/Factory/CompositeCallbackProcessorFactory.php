<?php

namespace WebhookBundle\Processor\Factory;

use Interop\Container\ContainerInterface;
use Towersystems\Webhook\Processor\CompositeCallbackProcessor;

class CompositeCallbackProcessorFactory {

	/**
	 * {@inheritdoc}
	 */
	public function __invoke(ContainerInterface $container) {
		$orderProccessConfigArr = $container->get("config")["webhook"]["processor"];
		$compositeCallbackProcessor = new CompositeCallbackProcessor();
		foreach ($orderProccessConfigArr as $processServiceName => $priority) {
			$compositeCallbackProcessor->addProcessor($container->get($processServiceName), $priority);
		}
		return $compositeCallbackProcessor;
	}

}
