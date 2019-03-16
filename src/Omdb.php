<?php

namespace DevelopingSonder\Omdb;

use DevelopingSonder\Omdb\Http\Connection;

class Omdb
{
    public $query;
    const SEARCH_ENDPOINT = 'search';

    public function __construct(Query $query = null)
    {
        $this->query = $query ?? new Query();
    }

    public function search($q, $options = [])
    {
        if($q instanceof Query)
        {
            $this->query = $q;
        }

        //-- Query Setup
        $this->query->setSearchTerm($q);
        $this->query->addOptions($options);

        return $this->makeCall($this->query->toUrl());
    }

    public function makeCall($options = null)
    {
        $connection = Connection::instance();
        return $connection->get($options);
    }
}
