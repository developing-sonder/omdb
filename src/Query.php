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
    const SEARCH_INDEX_KEY = 's';
    const RELEASE_YEAR_INDEX_KEY = 'y';
    const TYPE_INDEX_KEY = 't';
    const PAGE_INDEX_KEY = 'page';
    const ID_INDEX_KEY = 'i';
    const TITLE_INDEX_KEY = 't';
    const PLOT_INDEX_KEY = 'plot';

    public function __construct($options = [])
    {
        $this->options = collect($options)->merge(['apikey' => getenv("OMDB_API_KEY")]);
    }

    public function setSearchTerm($term)
    {
        $this->options->put(self::SEARCH_INDEX_KEY, $term);
    }

    public function toUrl(): Array
    {
        return ['query' => $this->parameters()];
    }

    public function addOptions($options)
    {
        $this->options = $this->options->merge($options);
    }

    public function parameters()
    {
        return $this->options->all();
    }

    public function setType($type): Query
    {
        $this->options->put(self::TYPE_INDEX_KEY, $type);
        return $this;
    }

    public function getType()
    {
        return $this->{self::TYPE_INDEX_KEY} ?? "";
    }

    public function setReleaseYear($year): Query
    {
        $this->options->put(self::RELEASE_YEAR_INDEX_KEY, $year);
        return $this;
    }

    public function getReleaseYear()
    {
        return $this->{self::RELEASE_YEAR_INDEX_KEY} ?? "";
    }

    public function setPage($page): Query
    {
        if(!is_int($page) || !$this->isBetween($page))
            throw new \Exception("The page variable must be an integer between 1 and 100 (inclusive). The value you provided was: $page");

        $this->options->put(self::PAGE_INDEX_KEY, $page);
        return $this;
    }

    public function getPage()
    {
        return $this->{self::PAGE_INDEX_KEY} ?? 1;
    }

    public function setId($id)
    {
        $this->options->put(self::ID_INDEX_KEY, $id);
        return $this;
    }

    public function clearOptions(): Query
    {
        $this->options = $this->options->only('apikey');
        return $this;
    }

    public function movie(): Query
    {
        $this->options->put(self::TYPE_INDEX_KEY, 'movie');
        return $this;
    }

    public function series(): Query
    {
        $this->options->put(self::TYPE_INDEX_KEY, 'series');
        return $this;
    }

    public function episode(): Query
    {
        $this->options->put(self::TYPE_INDEX_KEY, 'episode');
        return $this;
    }

    public function plot($plotType): Query
    {
        $this->options->put(self::PLOT_INDEX_KEY, $plotType);
        return $this;
    }


    private function isBetween($page): bool
    {
        return $page >= 1 && $page <= 100;
    }

    public function __set($name, $value)
    {
        $this->options->put($name, $value);
    }

    public function __get($name)
    {
        return $this->options->get($name);
    }

    public function getOptions()
    {
        return $this->options;
    }
}