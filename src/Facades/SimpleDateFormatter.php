<?php

namespace reind33r\SimpleDateFormatter\Facades;

use Illuminate\Support\Facades\Facade;

class SimpleDateFormatter extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'simpledateformatter';
    }
}
