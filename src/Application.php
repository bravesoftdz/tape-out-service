<?php

namespace Dykyi;

use Dykyi\Driver\TwitterDriver;
use Dykyi\Exceptions\ClassNotFoundException;
use Dykyi\Handle\BuilderInterface;
use Dykyi\Handle\ResponseDataExtractorInterface;
use Dykyi\Handle\SocialDriverInterface;
use Exception;

/**
 * Class Application
 * @package Dykyi
 */
class Application extends BaseApplication
{
    /**
     * @param $serviceName
     * @throws ClassNotFoundException
     * @return mixed
     */
    private function createSocialService($serviceName)
    {
        $this->logger->info('Create social service');
        $serviceLocator = new ServiceLocator();

        return $serviceLocator->createByName($serviceName);
    }

    /**
     * @param SocialDriverInterface $service
     * @param ResponseDataExtractorInterface $extractor
     * @param BuilderInterface $builder
     * @return mixed
     */
    private function getSocialData(SocialDriverInterface $service, ResponseDataExtractorInterface $extractor, BuilderInterface $builder)
    {
        $this->logger->info('Show service data');
        $data = $service->getData($extractor);

        return $service->build($data, $builder);
    }

    /**
     * @param string $data
     */
    private function render($data)
    {
        $this->logger->info('Render information');
        $content = $data;

        require_once "views/index.php";
    }

    /**
     * Start Application
     */
    public function run()
    {
        try{
            $this->initEnv();
            $service = $this->createSocialService(TwitterDriver::class);
            $content = $this->getSocialData($service, new ResponseDataExtractor(), new ViewBuilder());
            $this->render($content);
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
        }
    }
}
