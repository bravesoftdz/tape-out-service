<?php

namespace Dykyi\Driver;

use Dykyi\Exceptions\ClientException;
use Dykyi\Handle\ResponseDataExtractorInterface;
use Exception;
use Dykyi\Config;
use Dykyi\Handle\BuilderInterface;
use Dykyi\Handle\SocialDriverInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

/**
 * Class TwitterDriver
 * @package Dykyi\Driver
 */
class TwitterDriver implements SocialDriverInterface
{
    /**
     * @param ResponseDataExtractorInterface $extractor
     * @return mixed
     */
    public function getData(ResponseDataExtractorInterface $extractor)
    {
        $stack = \GuzzleHttp\HandlerStack::create();

        $middleware = new Oauth1([
            'consumer_key'    => Config::env('TWITTER_CONSUMER_KEY'),
            'consumer_secret' => Config::env('TWITTER_CONSUMER_SECRET'),
            'token'           => Config::env('TWITTER_TOKEN'),
            'token_secret'    => Config::env('TWITTER_SECRET'),
        ]);
        $stack->push($middleware);

        $client = new Client([
            'base_uri' => 'https://api.twitter.com/1.1/',
            'handler' => $stack
        ]);

        // Set the "auth" request option to "oauth" to sign using oauth
        try {
            $response = $client->get(sprintf('statuses/home_timeline.json?count=%d', TIME_LINE_COUNT), ['auth' => 'oauth']);
        } catch (Exception $e) {
            var_dump($e->getMessage()); die();
        }

        return $extractor->extract($response);
    }

    /**
     * @param array $data
     * @param BuilderInterface $builder
     * @return string
     */
    public function build(array $data, BuilderInterface $builder)
    {
        $result = '';
        foreach ($data as $post){
            $result .=  $builder->build([
                $post->user->profile_image_url,
                $post->user->url,
                $post->user->name,
                $post->text
            ]);
        }

        return $result;
    }

}