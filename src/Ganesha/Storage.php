<?php
namespace Ackintosh\Ganesha;

class Storage
{
    /**
     * @var Acintosh\Ganesha\Storage\Adapter\Hash
     */
    private $adapter;

    public function __construct($adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * returns failure count
     *
     * @param  string $serviceName
     * @return int
     */
    public function getFailureCount($serviceName)
    {
        return $this->adapter->load($serviceName);
    }

    /**
     * increments failure count
     *
     * @param  string $serviceName
     * @return void
     */
    public function incrementFailureCount($serviceName)
    {
        $this->adapter->save($serviceName, $this->getFailureCount($serviceName) + 1);
    }

    /**
     * decrements failure count
     *
     * @param  string $serviceName
     * @return void
     */
    public function decrementFailureCount($serviceName)
    {
        $this->adapter->save($serviceName, $this->getFailureCount($serviceName) - 1);
    }

    /**
     * sets failure count
     *
     * @param $serviceName
     * @param $failureCount
     */
    public function setFailureCount($serviceName, $failureCount)
    {
        $this->adapter->save($serviceName, $failureCount);
    }

    /**
     * sets last failure time
     *
     * @param  float $lastFailureTime
     * @return void
     */
    public function setLastFailureTime($lastFailureTime)
    {
        $this->adapter->saveLastFailureTime($lastFailureTime);
    }

    /**
     * returns last failure time
     *
     * @return float | null
     */
    public function getLastFailureTime()
    {
        return $this->adapter->loadLastFailureTime();
    }

    /**
     * sets status
     *
     * @param  int $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->adapter->saveStatus($status);
    }

    /**
     * returns status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->adapter->loadStatus();
    }
}