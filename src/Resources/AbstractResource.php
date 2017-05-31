<?php

namespace Flipbox\HubSpot\Http\Resources;

abstract class AbstractResource
{

    /**
     * The resource name
     */
    const RESOURCE = '';

    /**
     * @param string $resource
     * @param string $path
     * @param array $params
     * @return string
     */
    abstract protected function assembleVersionEndpoint(string $resource, string $path, array $params = []): string;

    /**
     * @param string $path
     * @param array $params
     * @return string
     */
    protected function assembleEndpoint(string $path, array $params = [])
    {
        return $this->assembleVersionEndpoint(static::RESOURCE, $path, $params);
    }
}
