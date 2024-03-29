<?php
/**
 * Created by PhpStorm.
 * User: mmoore
 * Date: 7/25/18
 * Time: 8:54 AM
 */
namespace DevelopingSonder\Omdb\Http;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Request;

class Connection
{
    private static $instance;
    private $apiKey;
    public $guzzleClient;
    protected $options;

    public static function instance()
    {
        if(static::$instance === null)
        {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct()
    {
        $this->guzzleClient = new GuzzleClient();
    }


    public function get($options = null)
    {
        $result = $this->guzzleClient->request("GET", "http://www.omdbapi.com", $options);
        return json_decode($result->getBody()->getContents());
    }

}