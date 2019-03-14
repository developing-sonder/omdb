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
        $this->options = [
            'query' => [
                'apikey' => getenv('OMDB_API_KEY')
            ]
        ];

        $this->guzzleClient = new GuzzleClient([
            "base_uri" => "http://www.omdbapi.com",
        ]);
    }

    public function get($endpoint, $options = null)
    {
        if(is_array($options['query']))
        {
            $this->options = array_merge($this->options, $options['query']);
        }

        return $this->guzzleClient->request("GET", $endpoint, $options);
    }

}