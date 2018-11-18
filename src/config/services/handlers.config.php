<?php

use WebhookBundle\Handler\RunProcessorHandler;
use WebhookBundle\Handler\TestCallbackGeneratorHandler;
use Zend\ServiceManager\AbstractFactory\ConfigAbstractFactory;

return [
	ConfigAbstractFactory::class => [
		RunProcessorHandler::class => [
			'tower.webhook.callback_manager',
		],
		TestCallbackGeneratorHandler::class => [
			'tower.webhook.callback_generator',
		],
	],
	'dependencies' => [
		'factories' => [],
		'aliases' => [],
	],
];