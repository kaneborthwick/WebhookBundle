<?php

return [
	'webhook' => [
		'enabled' => true,
		'hooks' => [],
		'processor' => [
			'tower.webhook.processing.state_resolver' => 1000,
			'tower.webhook.processing.callback_dispatcher' => 100,
		],
	],
];