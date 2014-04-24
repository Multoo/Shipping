<?php

namespace Multoo\Shipping\Provider;

interface ProviderInterface
{

    public function build(\Multoo\Shipping\Batch $batch);
}
