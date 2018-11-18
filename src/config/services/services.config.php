<?php

use Towersystems\Webhook\Dispatcher\CallbackDispatcher;
use Towersystems\Webhook\Generator\CallbackGenerator;
use Towersystems\Webhook\Manager\CallbackManager;
use Towersystems\Webhook\Processor\CallbackDispatcherProcessor;
use Towersystems\Webhook\Processor\CallbackStateResolverProcessor;
use Towersystems\Webhook\Processor\PosTokenResolverProcessor;
use Towersystems\Webhook\Provider\WebhookProvider;
use WebhookBundle\Processor\Factory\CompositeCallbackProcessorFactory;
use WebhookBundle\Provider\Factory\WebhookProviderFactory;
use Zend\ServiceManager\AbstractFactory\ConfigAbstractFactory;

return [

	ConfigAbstractFactory::class => [
		CallbackManager::class => [
			'tower.repository.webhook_callback',
			'tower.webhook.callback_processor',
			'doctrine.entity_manager.orm_default',
		],

		CallbackDispatcherProcessor::class => [
			'tower.webhook.callback_dispatcher',
			'doctrine.entity_manager.orm_default',
		],

		CallbackGenerator::class => [
			'tower.webhook.webhook_provider',
			'tower.factory.webhook_callback',
			'doctrine.entity_manager.orm_default',
		],
		CallbackDispatcher::class => [],
	],

	'dependencies' => [
		'factories' => [
			'tower.webhook.callback_processor' => CompositeCallbackProcessorFactory::class,
			WebhookProvider::class => WebhookProviderFactory::class,
		],
		'invokables' => [
			CallbackStateResolverProcessor::class,
			PosTokenResolverProcessor::class,
		],
		'aliases' => [

			'tower.webhook.callback_manager' => CallbackManager::class,
			'tower.webhook.webhook_provider' => WebhookProvider::class,
			'tower.webhook.processing.callback_dispatcher' => CallbackDispatcherProcessor::class,
			'tower.webhook.processing.state_resolver' => CallbackStateResolverProcessor::class,
			'tower.webhook.processing.pos_token_resolver' => PosTokenResolverProcessor::class,
			'tower.webhook.callback_dispatcher' => CallbackDispatcher::class,
			'tower.webhook.callback_generator' => CallbackGenerator::class,
		],
	],

];