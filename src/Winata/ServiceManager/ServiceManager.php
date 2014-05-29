<?php

namespace Winata\ServiceManager;

use Winata\Service\ServiceInterface;

class ServiceManager implements ServiceManagerInterface
{
    protected $config = array();

    protected $services = array();

    public function __construct(array $config = null)
    {
        if ($config !== null) {
            $this->setConfig($config);
        }
    }

    public function setConfig(array $config)
    {
        $config = array_merge($config, require __DIR__ . '/../../../config/winata.config.php');
        $this->config = $config;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setService($serviceName, ServiceInterface $service)
    {
        $this->services[$serviceName] = $service;
    }

    public function getService($serviceName)
    {
        if (! isset($this->services[$serviceName]) || empty($this->services[$serviceName])) {
            $serviceList = $this->config['service'];

            if (isset($serviceList['factories'][$serviceName])) {
                $this->services[$serviceName] = $serviceList['factories'][$serviceName]::createService($this);
            } elseif (isset($serviceList['invokables'][$serviceName])) {
                $this->services[$serviceName] = new $serviceList['invokables'][$serviceName]($this);
            } else {
                throw new \Exception("Service dengan nama \"{$serviceName}\" tidak ditemukan!");
            }
        }

        return $this->services[$serviceName];
    }
}
