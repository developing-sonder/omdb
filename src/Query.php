<?php
/**
 * Created by PhpStorm.
 * User: mmoore
 * Date: 3/14/19
 * Time: 1:30 PM
 */

namespace DevelopingSonder\Omdb;


class Query
{
    protected $options;

    public function __construct($options = [])
    {
        $this->options = collect($options);
    }

    public function setSearchTerm($term)
    {
        $this->options->put('s', $term);
    }

    public function toUrl(): Array
    {
        return ['query' => $this->parameters()];
    }

    public function addOptions($options)
    {
        $this->options->merge($options);
    }

    public function parameters()
    {
        return $this->options->all();
    }

    public function setType($type): Query
    {
        $this->options->set('t', $type);
        return $this;
    }

    public function setReleaseYear($year): Query
    {
        $this->options->set('y', $year);
        return $this;
    }

    public function setPage($page): Query
    {
        if(!is_int($page) || !$this->isBetween($page))
            throw \Exception("The page variable must be an integer between 1 and 100 (inclusive). The value you provided was: $page");

        $this->options->set('page', $page);
        return $this;
    }

    public function __set($name, $value)
    {
        $this->options->put($name, $value);
    }

    public function __get($name)
    {
        return $this->options->get($name);
    }

    private function isBetween($page): bool
    {
        return $page >= 1 && $page <= 100;
    }
}