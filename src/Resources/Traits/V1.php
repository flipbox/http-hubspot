<?php

namespace Flipbox\HubSpot\Http\Resources\Traits;

use Flipbox\HubSpot\Http\Helpers\Url;

trait V1
{

    protected $version = 'v1';

    /**
     * @param string $resource
     * @param string $path
     * @param array $params
     * @return string
     */
    public function assembleVersionEndpoint(string $resource, string $path, array $params = []): string
    {

        $queryString = null;

        if (!empty($params)) {
            $queryString = Url::queryString($params);
        }

        return $resource . '/' . $this->version . '/' . $path . $queryString;
    }
}
