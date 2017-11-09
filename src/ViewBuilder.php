<?php

namespace Dykyi;

use Dykyi\Handle\BuilderInterface;

/**
 * Class ViewBuilder
 * @package Dykyi
 */
class ViewBuilder implements BuilderInterface
{
    /**
     * @param array $params
     * @return string
     */
    public function build(array $params)
    {
        return sprintf('<div class="panel panel-info">
                    <div class="panel-heading">                                                                                                    
                            <div class="col-sm-2">
                                <img src="%s">
                            </div>                        
                            <h3 class="panel-title"><a href="%s">%s</a></h3>
                    </div>                    
                    <div class="panel-body">
                        %s
                    </div>
                </div>', ...$params);
    }
}