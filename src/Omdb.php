<?php

namespace DevelopingSonder\Omdb;

use DevelopingSonder\Omdb\Http\Connection;

class Omdb
{
    public $query;

    public function __construct(Query $query = null)
    {
        $this->query = $query ?? new Query();
    }

    public function search($q, $options = [])
    {
        if($q instanceof Query)
        {
            $this->query = $q;
            return $this->makeCall();
        }

        $this->query->setSearchTerm($q);
        $this->query->addOptions = $options;
    }

    public function makeCall()
    {
        $connection = Connection::instance();
        return $connection->get();
    }
}
