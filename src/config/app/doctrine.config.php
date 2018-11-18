<?php

use Towersystems\Webhook\Model\Callback;
use Towersystems\Webhook\Model\Webhook;

return [
	'doctrine' => [
		'driver' => [
			'orm_default' => [
				'drivers' => [
					Webhook::class => 'webhook_bundle_config',
					Callback::class => 'webhook_bundle_config',
				],
			],
			'webhook_bundle_config' => [
				'class' => \Doctrine\ORM\Mapping\Driver\XmlDriver::class,
				'paths' => __DIR__ . '/../doctrine',
			],
		],
	],
];