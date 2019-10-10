<?php

namespace Jakerw\VcrudGenerator;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Jakerw\VcrudGenerator\Skeleton\SkeletonClass
 */
class VcrudGeneratorFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'vcrud-generator';
    }
}
