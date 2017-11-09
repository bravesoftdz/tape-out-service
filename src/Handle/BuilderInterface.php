<?php

namespace Dykyi\Handle;

/**
 * Interface BuilderInterface
 */
interface BuilderInterface
{

    /**
     * @param array $params
     * @return mixed
     */
    public function build(array $params);
}