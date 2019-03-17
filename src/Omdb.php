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

        return $this->makeCall();
    }

    public function next()
    {
        $page = $this->query->getPage() + 1;
        $page = ($page >= 101)? 100 : $page;
        $this->query->setPage($page);

        return $this->makeCall();
    }

    public function prev()
    {
        $page = $this->query->getPage() - 1;
        $page = ($page <= 0)? 1 : $page;

        $this->query->setPage($page);
        return $this->makeCall();
    }

    public function makeCall($options = null)
    {
        $connection = Connection::instance();
        $this->query->addOptions($options);
        return $connection->get($this->query->toUrl());
    }
}
