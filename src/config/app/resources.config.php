<?php

use Towersystems\Webhook\Model\Callback;
use Towersystems\Webhook\Model\CallbackInterface;
use Towersystems\Webhook\Model\Webhook;
use Towersystems\Webhook\Model\WebhookInterface;
use WebhookBundle\Handler\WebhookResourceHandler;

return [
	'towersystems_resource' => [
		"resources" => [
			/* 
			'tower.webhook' => [
				'classes' => [
					'model' => Webhook::class,
					'handler' => WebhookResourceHandler::class,
					'interface' => WebhookInterface::class,
				],
			],
			'tower.webhook_callback' => [
				'classes' => [
					'model' => Callback::class,
					'interface' => CallbackInterface::class,
				],
			],
			*/
		],
	],
];
