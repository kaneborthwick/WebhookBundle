<?php
namespace WebhookBundle;

use WebhookBundle\Handler\RunProcessorHandler;

return [

	'routes' => [
		/*
		[
			'name' => 'tower.webhooks.run_processor',
			'path' => '/task/webhooks/run-processor',
			'middleware' => RunProcessorHandler::class,
			'allowed_methods' => ['GET', 'POST'],
		],

		[
			'name' => 'tower_api_webhook_add_url',
			'path' => '/api/webhooks/{id}/add-url',
			'middleware' => 'tower.controller.webhook',
			'allowed_methods' => ['PUT'],
			'options' => [
				'action' => 'addUrl',
			],
		],
		[
			'name' => 'tower_api_webhook_remove_url',
			'path' => '/api/webhooks/{id}/remove-url',
			'middleware' => 'tower.controller.webhook',
			'allowed_methods' => ['PUT'],
			'options' => [
				'action' => 'removeUrl',
			],
		],
		*/
	],

	'towersystems_resource' => [
		/*
		'routes' => [
			'webhooks' => [
				'alias' => 'tower.webhook',
				'only' => ['show', 'index', 'update', 'create', 'delete'],
			],
			'webhook_callbacks' => [
				'alias' => 'tower.webhook_callback',
				'only' => ['index', 'show'],
			],
		],
		*/
	],
];
