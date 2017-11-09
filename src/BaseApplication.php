<?php

namespace Dykyi;

use Dykyi\Exceptions\ClientException;
use Psr\Log\LoggerInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\NullLogger;

/**
 * Class BaseApplication
 * @package Dykyi
 */
abstract class BaseApplication implements LoggerAwareInterface
{
    /**
     * BaseApplication constructor.
     * @param LoggerInterface|null $logger
     */
    public function __construct(LoggerInterface $logger = null)
    {
        $this->logger = $logger ?: new NullLogger();
    }

    /**
     * Init env
     */
    public function initEnv()
    {
        if (!file_exists(HOME_FOLDER . '/.env')) {
            throw new ClientException(sprintf(ClientException::ERROR_1, '.env'));
        }

        $dotenv = new \Dotenv\Dotenv(HOME_FOLDER);
        $dotenv->load();
    }

    /**
     * Sets a logger.
     *
     * @param LoggerInterface $logger
     *
     * @return $this
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
        return $this;
    }
}
