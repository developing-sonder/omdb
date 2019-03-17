<?php

namespace DevelopingSonder\Omdb\Tests;

use PHPUnit\Framework\TestCase;
use DevelopingSonder\Omdb\Omdb;
use DevelopingSonder\Omdb\Query;

class ClientTest extends TestCase
{
    /** @test */
    public function can_create_client()
    {
        $client = new Omdb;
        $this->assertInstanceOf(Omdb::class, $client);
    }

    /** @test */
    public function client_can_search()
    {
        $client = new Omdb;
        $result = $client->search('shawshank');

        $this->assertObjectHasAttribute('Search', $result);
    }

    /** @test */
    public function client_can_accept_query()
    {
        $query = new Query;
        $query->setReleaseYear('2018')->setPage(3);

        $client = new Omdb($query);

        $this->assertEquals($query, $client->query);
    }

    /** @test */
    public function client_can_accept_parameters()
    {
        $client = new Omdb;
        $client->search('shawshank', ['y' => 2018]);

        $this->assertEquals('2018', $client->query->getReleaseYear());
    }

    /** @test */
    public function client_can_paginate()
    {
        $client = new Omdb;
        $results = $client->search('wife');
        $mov1 = $results->Search[0];

        $results = $client->next();
        $mov2 = $results->Search[0];

        $this->assertEquals(2, $client->query->getPage());
        $this->assertNotEquals($mov1->imdbID, $mov2->imdbID);
    }

    /** @test */
    public function client_can_depaginate()
    {
        $client = new Omdb;
        $client->query->setPage(2);

        $results = $client->search('wife');
        $mov1 = $results->Search[0];

        $results = $client->prev();
        $mov2 = $results->Search[0];

        $this->assertEquals(1, $client->query->getPage());
        $this->assertNotEquals($mov1->imdbID, $mov2->imdbID);

    }


    public function client_can_find_movie()
    {
        $client = new Omdb();
        $result = $client->find('tt0111161');
        $this->assertObjectHasAttribute('Title');
        $this->assertEquals('The Shawshank Redemption', $result->title);

        $result = $client->find('The Matrix');
        $this->assertObjectHasAttribute('Title');
        $this->assertEquals('The Matrix', $result->title);
    }
}
