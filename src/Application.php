<?php

namespace Dykyi;

use Dykyi\Driver\TwitterDriver;
use Dykyi\Handle\SocialDriverInterface;
use Exception;

/**
 * Class Application
 * @package Dykyi
 */
class Application extends BaseApplication
{
    /**
     * @var SocialDriverInterface;
     */
    private $service;

    /**
     * @param string $serviceName
     */
    private function createSocialService($serviceName){
        $this->logger->info('Create social service');
        $serviceLocator = new ServiceLocator();
        $this->service = $serviceLocator->createByName($serviceName);
    }

    /**
     * @return string
     */
    private function getSocialData()
    {
        $this->logger->info('Show service data');
        return $this->service->show();
    }

    /**
     * Start Application
     */
    public function run()
    {
        try{
            $this->initEnv();
            $this->createSocialService(TwitterDriver::class);
            echo $this->getSocialData();
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
        }
    }
}
