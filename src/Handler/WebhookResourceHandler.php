<?php

namespace WebhookBundle\Handler;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use ResourceBundle\Handler\ResourceHandler;
use Towersystems\Resource\ResourceActions;
use Zend\Diactoros\Response\TextResponse;

/**
 *
 */
class WebhookResourceHandler extends ResourceHandler {

	/**
	 * [addUrlAction description]
	 * @param \Psr\Http\Message\ServerRequestInterface $request [description]
	 * @param \Psr\Http\Server\RequestHandlerInterface $handler [description]
	 */
	public function addUrlAction(
		\Psr\Http\Message\ServerRequestInterface $request,
		\Psr\Http\Server\RequestHandlerInterface $handler)
	: \Psr\Http\Message\ResponseInterface{

		$configuration = $this->requestConfigurationFactory->create($this->metadata, $request);
		$resource = $this->findOr404($configuration);
		$data = $request->getParsedBody();

		if (isset($data["url"])) {
			try {
				$entityManager = $this->container->get('doctrine.entity_manager.orm_default');
				$resource->addUrl($data["url"]);
				$entityManager->persist($resource);
				$entityManager->flush();
				$this->eventDispatcher->dispatchPostEvent(ResourceActions::UPDATE, $configuration, $resource);
			} catch (\Exception $error) {
				throw $error;
			}
		}

		// $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
		$jsonContent = $this->serializer->serialize($resource, 'json');

		return new TextResponse($jsonContent);
	}

	/**
	 * [addUrlAction description]
	 * @param \Psr\Http\Message\ServerRequestInterface $request [description]
	 * @param \Psr\Http\Server\RequestHandlerInterface $handler [description]
	 */
	public function removeUrlAction(
		\Psr\Http\Message\ServerRequestInterface $request,
		\Psr\Http\Server\RequestHandlerInterface $handler)
	: \Psr\Http\Message\ResponseInterface{

		$configuration = $this->requestConfigurationFactory->create($this->metadata, $request);
		$resource = $this->findOr404($configuration);
		$data = $request->getParsedBody();

		if (isset($data["url"])) {
			try {
				$entityManager = $this->container->get('doctrine.entity_manager.orm_default');
				$resource->removeUrl($data["url"]);
				$entityManager->persist($resource);
				$entityManager->flush();
				$this->eventDispatcher->dispatchPostEvent(ResourceActions::UPDATE, $configuration, $resource);
			} catch (\Exception $error) {
				throw $error;
			}
		}

		// $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
		$jsonContent = $this->serializer->serialize($resource, 'json');

		return new TextResponse($jsonContent);
	}

}