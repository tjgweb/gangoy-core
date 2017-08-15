<?php

namespace TJG\Gangoy\Http\Controller;

use Interop\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\UploadedFileInterface as UploadedFile;

/**
 * Class BaseController
 * @package TJG\Gangoy\Controller
 */
abstract class BaseController
{
	/**
	 * @var ContainerInterface
	 */
	protected $container;

	/**
	 * @var \Slim\Views\Twig $view
	 */
	protected $view;

	/**
	 * @var \Slim\Flash\Messages $flash
	 */
	protected $flash;

	/**
	 * @var \Slim\Router
	 */
	protected $router;

	/**
	 * @var \Awurth\SlimValidation\Validator
	 */
	protected $validator;

	/**
	 * @param ContainerInterface $container
	 */
	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
		$this->view = $this->container->get('view');
		$this->flash = $this->container->get('flash');
		$this->router = $this->container->get('router');
		$this->validator = $this->container->get('validator');
	}

	/**
	 * @param  Response $response
	 * @param int $status
	 * @param int|null $url
	 * @return Response
	 */
	protected function redirect(Response $response, $url, $status = null)
	{
		if ($status) {
			return $response->withStatus($status)->withHeader('Location', $url);
		}
		return $response->withHeader('Location', $url);
	}

	/**
	 * @param UploadedFile $uploadedFile
	 * @param null|string $subDirectory
	 * @return string
	 */
	protected function moveUpLoadedFile(UploadedFile $uploadedFile, $subDirectory = null)
	{
		$uploadDirectory = $this->container['settings']['uploadDirectory'];
		if ($subDirectory) {
			$uploadDirectory = $uploadDirectory . DIRECTORY_SEPARATOR . $subDirectory;
			if(!file_exists($uploadDirectory)){
				mkdir($uploadDirectory, 0755);
			}
		}
		$originalName = pathinfo($uploadedFile->getClientFilename(), PATHINFO_FILENAME);
		$name = preg_replace("/[^a-zA-Z0-9-_]/", "", strtr($originalName, "áàãâéêíóôõúüçñÁÀÃÂÉÊÍÓÔÕÚÜÇÑ ", "aaaaeeiooouucnAAAAEEIOOOUUCN_"));
		$extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
		$filename = time() . '_' . $name . '.' . $extension;
		$uploadedFile->moveTo($uploadDirectory . DIRECTORY_SEPARATOR . $filename);
		$filePath = $uploadDirectory . DIRECTORY_SEPARATOR . $filename;
		return $filePath;
	}
}
