<?php

namespace Dykyi\Handle;

/**
 * Interface SocialDriverInterface
 */
interface SocialDriverInterface
{
    /**
     * @param ResponseDataExtractorInterface $extractor
     * @return array
     */
    public function getData(ResponseDataExtractorInterface $extractor);

    /**
     * @param array $data
     * @param BuilderInterface $builder
     * @return mixed
     */
    public function build(array $data, BuilderInterface $builder);
}