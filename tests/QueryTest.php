<?php

namespace DevelopingSonder\Omdb\Tests;

use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;
use DevelopingSonder\Omdb\Query;

class QueryTest extends TestCase
{
    /** @test */
    public function can_create_query()
    {
        $query = new Query();
        $this->assertInstanceOf(Query::class, $query);
    }

    /** @test */
    public function options_are_a_collection()
    {
        $query = new Query();
        $this->assertInstanceOf(Collection::class, $query->getOptions());
    }

    /** @test */
    public function can_get_year()
    {
        $query = new Query(['y' => 2019]);
        $this->assertEquals('2019', $query->getReleaseYear());
    }

    /** @test */
    public function can_set_year()
    {
        $query = new Query();
        $query->setReleaseYear('2019');
        $this->assertEquals('2019', $query->getReleaseYear());
    }

    /** @test */
    public function can_get_type()
    {
        $query = new Query(['t' => 'some type']);
        $this->assertEquals('some type', $query->getType());
    }

    /** @test */
    public function can_set_type()
    {
        $query = new Query();
        $query->setType('2019');
        $this->assertEquals('2019', $query->getType());
    }

    /** @test */
    public function can_get_page()
    {
        $query = new Query(['page' => 1]);
        $this->assertEquals(1, $query->getPage());
    }

    /** @test */
    public function can_set_page()
    {
        $query = new Query();
        $query->setPage(1);
        $this->assertEquals(1, $query->getPage());

        $this->expectException(\Exception::class);
        $query->setPage(101);

        $this->expectException(\Exception::class);
        $query->setPage(-1);
    }



}