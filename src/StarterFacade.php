<?php

namespace Pixcafe\Starter;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Pixcafe\Starter\Skeleton\SkeletonClass
 */
class StarterFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'starter';
    }
}
