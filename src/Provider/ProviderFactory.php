<?php

namespace Multoo\Shipping\Provider;

class ProviderFactory
{

    /**
     * 
     * @param string $provider
     * @return ProviderInterface
     */
    public function create($provider)
    {
        $fullClassName = '\\Multoo\\Shipping\\Provider\\' . $provider;
        return new $fullClassName;
    }
}
