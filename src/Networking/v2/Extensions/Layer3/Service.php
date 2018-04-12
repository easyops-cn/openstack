<?php

namespace OpenStack\Networking\v2\Extensions\Layer3;

use OpenStack\Common\Service\AbstractService;
use OpenStack\Networking\v2\Extensions\Layer3\Models\FloatingIp;
use OpenStack\Networking\v2\Extensions\Layer3\Models\Router;
/**
 * @property Api $api
 */
class Service extends AbstractService
{
    private function floatingIp(array $info = [])
    {
        return $this->model(FloatingIp::class, $info);
    }
    private function router(array $info = [])
    {
        return $this->model(Router::class, $info);
    }
    /**
     * @param array $options
     *
     * @return FloatingIp
     */
    public function createFloatingIp(array $options)
    {
        return $this->floatingIp()->create($options);
    }
    /**
     * @return FloatingIp
     */
    public function getFloatingIp($id)
    {
        return $this->floatingIp(['id' => $id]);
    }
    /**
     * @return \Generator
     */
    public function listFloatingIps(array $options = [])
    {
        return $this->floatingIp()->enumerate($this->api->getFloatingIps(), $options);
    }
    /**
     * @param array $options
     *
     * @return Router
     */
    public function createRouter(array $options)
    {
        return $this->router()->create($options);
    }
    /**
     * @return Router
     */
    public function getRouter($id)
    {
        return $this->router(['id' => $id]);
    }
    /**
     * @param array $options
     *
     * @return \Generator
     */
    public function listRouters(array $options = [])
    {
        return $this->router()->enumerate($this->api->getRouters(), $options);
    }
}