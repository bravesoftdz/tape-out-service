<?php

namespace Dykyi\Handle;

/**
 * Interface SocialDriverInterface
 */
interface SocialDriverInterface
{
    /**
     * @return array
     */
    public function getData();

    /**
     * @param array $data
     * @param BuilderInterface $builder
     * @return mixed
     */
    public function build(array $data, BuilderInterface $builder);
}