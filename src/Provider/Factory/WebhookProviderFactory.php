<?php

declare (strict_types = 1);

namespace WebhookBundle\Provider\Factory;

use Interop\Container\ContainerInterface;
use Towersystems\Webhook\Configuration\Configuration;
use Towersystems\Webhook\Provider\WebhookProvider;

class WebhookProviderFactory {
	/**
	 * [__invoke description]
	 * @param  ContainerInterface $container     [description]
	 * @param  [type]             $requestedName [description]
	 * @return [type]                            [description]
	 */
	function __invoke(ContainerInterface $container, $requestedName) {
		$config = $container->get("config");
		$webhookFactory = $container->get("tower.factory.webhook");
		$webhookRepository = $container->get('tower.repository.webhook');
		$webhookConfig = new Configuration(isset($config["webhook"]) ? $config["webhook"] : []);
		return new WebhookProvider($webhookRepository, $webhookFactory, $webhookConfig);
	}
}
