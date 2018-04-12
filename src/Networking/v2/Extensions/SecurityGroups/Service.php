<?php

namespace OpenStack\Networking\v2\Extensions\SecurityGroups;

use OpenStack\Common\Service\AbstractService;
use OpenStack\Networking\v2\Extensions\SecurityGroups\Models\SecurityGroup;
use OpenStack\Networking\v2\Extensions\SecurityGroups\Models\SecurityGroupRule;
/**
 * @property Api $api
 */
class Service extends AbstractService
{
    private function securityGroup(array $info = [])
    {
        return $this->model(SecurityGroup::class, $info);
    }
    private function securityGroupRule(array $info = [])
    {
        return $this->model(SecurityGroupRule::class, $info);
    }
    /**
     * @return \Generator
     */
    public function listSecurityGroups()
    {
        return $this->securityGroup()->enumerate($this->api->getSecurityGroups());
    }
    /**
     * @param array $options
     *
     * @return SecurityGroup
     */
    public function createSecurityGroup(array $options)
    {
        return $this->securityGroup()->create($options);
    }
    /**
     * @param string $id
     *
     * @return SecurityGroup
     */
    public function getSecurityGroup($id)
    {
        return $this->securityGroup(['id' => $id]);
    }
    /**
     * @return \Generator
     */
    public function listSecurityGroupRules()
    {
        return $this->securityGroupRule()->enumerate($this->api->getSecurityRules());
    }
    /**
     * @param array $options
     *
     * @return SecurityGroupRule
     */
    public function createSecurityGroupRule(array $options)
    {
        return $this->securityGroupRule()->create($options);
    }
    /**
     * @param string $id
     *
     * @return SecurityGroupRule
     */
    public function getSecurityGroupRule($id)
    {
        return $this->securityGroupRule(['id' => $id]);
    }
}