# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/developing-sonder/omdb.svg?style=flat-square)](https://packagist.org/packages/developing-sonder/omdb)
[![Build Status](https://img.shields.io/travis/developing-sonder/omdb/master.svg?style=flat-square)](https://travis-ci.org/developing-sonder/omdb)
[![Quality Score](https://img.shields.io/scrutinizer/g/developing-sonder/omdb.svg?style=flat-square)](https://scrutinizer-ci.com/g/developing-sonder/omdb)
[![Total Downloads](https://img.shields.io/packagist/dt/developing-sonder/omdb.svg?style=flat-square)](https://packagist.org/packages/developing-sonder/omdb)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require developing-sonder/omdb
```

Obtain an API Key from OMDB at: http://www.omdbapi.com/apikey.aspx

## Usage
Any call that includes a search term will return a stdClass object. The $obj->Search attribute will hold an array of the results.

Otherwise, a single object will be returned containing information about the first movie that met your criteria.

The above distinction is handled by OMDB's API and outside the control of this package.

#### Find by Title
``` php
$omdb = new Omdb;
$shawshank = $omdb->byTitle('The Shawshank Redemption');
```
```json
{
    "Title": "The Shawshank Redemption",
    "Year": "1994",
    "Rated": "R",
    "Released": "14 Oct 1994",
    "Runtime": "142 min",
    "Genre": "Drama",
    "Director": "Frank Darabont",
    "Writer": "Stephen King (short story \"Rita Hayworth and Shawshank Redemption\"), Frank Darabont (screenplay)",
    "Actors": "Tim Robbins, Morgan Freeman, Bob Gunton, William Sadler",
    "Plot": "Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.",
    "Language": "English",
    "Country": "USA",
    "Awards": "Nominated for 7 Oscars. Another 19 wins & 32 nominations.",
    "Poster": "https://m.media-amazon.com/images/M/MV5BMDFkYTc0MGEtZmNhMC00ZDIzLWFmNTEtODM1ZmRlYWMwMWFmXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg",
    "Ratings": [
        {
            "Source": "Internet Movie Database",
            "Value": "9.3/10"
        },
        {
            "Source": "Rotten Tomatoes",
            "Value": "91%"
        },
        {
            "Source": "Metacritic",
            "Value": "80/100"
        }
    ],
    "Metascore": "80",
    "imdbRating": "9.3",
    "imdbVotes": "2,058,865",
    "imdbID": "tt0111161",
    "Type": "movie",
    "DVD": "27 Jan 1998",
    "BoxOffice": "N/A",
    "Production": "Columbia Pictures",
    "Website": "N/A",
    "Response": "True"
}
```

#### Find By Id
```php
$omdb = new Omdb;
$theMatrix = $omdb->find('tt0111161');
```
```json
{
    "Title": "The Shawshank Redemption",
    "Year": "1994",
    "Rated": "R",
    "Released": "14 Oct 1994",
    "Runtime": "142 min",
    "Genre": "Drama",
    "Director": "Frank Darabont",
    "Writer": "Stephen King (short story \"Rita Hayworth and Shawshank Redemption\"), Frank Darabont (screenplay)",
    "Actors": "Tim Robbins, Morgan Freeman, Bob Gunton, William Sadler",
    "Plot": "Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.",
    "Language": "English",
    "Country": "USA",
    "Awards": "Nominated for 7 Oscars. Another 19 wins & 32 nominations.",
    "Poster": "https://m.media-amazon.com/images/M/MV5BMDFkYTc0MGEtZmNhMC00ZDIzLWFmNTEtODM1ZmRlYWMwMWFmXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg",
    "Ratings": [
        {
            "Source": "Internet Movie Database",
            "Value": "9.3/10"
        },
        {
            "Source": "Rotten Tomatoes",
            "Value": "91%"
        },
        {
            "Source": "Metacritic",
            "Value": "80/100"
        }
    ],
    "Metascore": "80",
    "imdbRating": "9.3",
    "imdbVotes": "2,058,865",
    "imdbID": "tt0111161",
    "Type": "movie",
    "DVD": "27 Jan 1998",
    "BoxOffice": "N/A",
    "Production": "Columbia Pictures",
    "Website": "N/A",
    "Response": "True"
}
```
#### Search
```php
$omdb = new Omdb;
$results = $client->search('wife');
```
```json
{
    "Search": [
        {
            "Title": "The Time Traveler's Wife",
            "Year": "2009",
            "imdbID": "tt0452694",
            "Type": "movie",
            "Poster": "https://m.media-amazon.com/images/M/MV5BZWNlN2RmZDktNzllNC00NDVlLTllMzgtZGQ1YmRmZThmZjZmXkEyXkFqcGdeQXVyNTA4NzY1MzY@._V1_SX300.jpg"
        },
        {
            "Title": "The Good Wife",
            "Year": "2009–2016",
            "imdbID": "tt1442462",
            "Type": "series",
            "Poster": "https://m.media-amazon.com/images/M/MV5BMTI2OTk4MDk3OF5BMl5BanBnXkFtZTcwMTY3NTc3Mg@@._V1_SX300.jpg"
        },
        {
            "Title": "The Astronaut's Wife",
            "Year": "1999",
            "imdbID": "tt0138304",
            "Type": "movie",
            "Poster": "https://m.media-amazon.com/images/M/MV5BMTUxNGI2NzUtYzgwNy00NmIyLTgwNjMtZGMzYjhlYjY1MThkXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg"
        },
        {
            "Title": "The Cook, the Thief, His Wife & Her Lover",
            "Year": "1989",
            "imdbID": "tt0097108",
            "Type": "movie",
            "Poster": "https://m.media-amazon.com/images/M/MV5BZTlmM2U5YmQtMTcxYy00MzgyLTkyMDItZjY5Yjc3OTJkMTAzXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg"
        },
        {
            "Title": "The Zookeeper's Wife",
            "Year": "2017",
            "imdbID": "tt1730768",
            "Type": "movie",
            "Poster": "https://m.media-amazon.com/images/M/MV5BNTY3YmZmYmMtZjc3Zi00N2VjLWE5ZGMtN2M0ODkzOGQ5M2UyL2ltYWdlL2ltYWdlXkEyXkFqcGdeQXVyNTk1MTQ3NDI@._V1_SX300.jpg"
        },
        {
            "Title": "My Wife and Kids",
            "Year": "2001–2005",
            "imdbID": "tt0273855",
            "Type": "series",
            "Poster": "https://m.media-amazon.com/images/M/MV5BNjE0YjkzNDAtMDQ1MC00MmQ5LTgxNDktNmQ0ODU2MGY0Njk1XkEyXkFqcGdeQXVyNjU2NjA5NjM@._V1_SX300.jpg"
        },
        {
            "Title": "I Think I Love My Wife",
            "Year": "2007",
            "imdbID": "tt0770772",
            "Type": "movie",
            "Poster": "https://m.media-amazon.com/images/M/MV5BMzA0NTcxODEyN15BMl5BanBnXkFtZTcwOTA4MjI0MQ@@._V1_SX300.jpg"
        },
        {
            "Title": "The Wife",
            "Year": "2017",
            "imdbID": "tt3750872",
            "Type": "movie",
            "Poster": "https://m.media-amazon.com/images/M/MV5BNzA2Yzk4YjItZmU5OS00ZjFjLTlkNTEtMzJjZDVlOGY0OWRlXkEyXkFqcGdeQXVyMjM4NTM5NDY@._V1_SX300.jpg"
        },
        {
            "Title": "The Bishop's Wife",
            "Year": "1947",
            "imdbID": "tt0039190",
            "Type": "movie",
            "Poster": "https://m.media-amazon.com/images/M/MV5BNjU4ZTEwY2UtMDg2OS00YTgxLTlkZTQtY2M1ZGM1YTc0NWFmXkEyXkFqcGdeQXVyMDI2NDg0NQ@@._V1_SX300.jpg"
        },
        {
            "Title": "The Preacher's Wife",
            "Year": "1996",
            "imdbID": "tt0117372",
            "Type": "movie",
            "Poster": "https://m.media-amazon.com/images/M/MV5BOWFiMGMzYmYtMGZjNy00ZWVkLTllMjAtMTQ2NmU1OWVhMjkxXkEyXkFqcGdeQXVyNjU0NTI0Nw@@._V1_SX300.jpg"
        }
    ],
    "totalResults": "1116",
    "Response": "True"
}
```

#### Complicated Query
```php
$query = new Query();
$query->movie()
      ->plot('short')
      ->setSearchTerm('lego');
      
$client = new Omdb($query);
$results = $client->get();
```
```json
{
    "Search": [
        {
            "Title": "The Lego Movie",
            "Year": "2014",
            "imdbID": "tt1490017",
            "Type": "movie",
            "Poster": "https://m.media-amazon.com/images/M/MV5BMTg4MDk1ODExN15BMl5BanBnXkFtZTgwNzIyNjg3MDE@._V1_SX300.jpg"
        },
        {
            "Title": "The Lego Batman Movie",
            "Year": "2017",
            "imdbID": "tt4116284",
            "Type": "movie",
            "Poster": "https://m.media-amazon.com/images/M/MV5BMTcyNTEyOTY0M15BMl5BanBnXkFtZTgwOTAyNzU3MDI@._V1_SX300.jpg"
        },
        {
            "Title": "The Lego Ninjago Movie",
            "Year": "2017",
            "imdbID": "tt3014284",
            "Type": "movie",
            "Poster": "https://m.media-amazon.com/images/M/MV5BNDI3MDljMTQtYzBiYS00NDk2LTlhYzUtYmM0NWIyMmZkMDZkXkEyXkFqcGdeQXVyNjk5NDA3OTk@._V1_SX300.jpg"
        },
        {
            "Title": "The Lego Movie 2: The Second Part",
            "Year": "2019",
            "imdbID": "tt3513498",
            "Type": "movie",
            "Poster": "https://m.media-amazon.com/images/M/MV5BMTkyOTkwNDc1N15BMl5BanBnXkFtZTgwNzkyMzk3NjM@._V1_SX300.jpg"
        },
        {
            "Title": "Lego Batman: The Movie - DC Super Heroes Unite",
            "Year": "2013",
            "imdbID": "tt2465238",
            "Type": "movie",
            "Poster": "https://m.media-amazon.com/images/M/MV5BMjE4MTU5MDk5OF5BMl5BanBnXkFtZTgwNDQ1NzA2MDE@._V1_SX300.jpg"
        },
        {
            "Title": "Lego Marvel Super Heroes",
            "Year": "2013",
            "imdbID": "tt2620204",
            "Type": "game",
            "Poster": "https://ia.media-imdb.com/images/M/MV5BOTA5ODA2NTI2M15BMl5BanBnXkFtZTgwNTcxMzU1MDE@._V1_SX300.jpg"
        },
        {
            "Title": "Lego Batman: The Videogame",
            "Year": "2008",
            "imdbID": "tt1149317",
            "Type": "game",
            "Poster": "https://images-na.ssl-images-amazon.com/images/M/MV5BMTI5MjA2MjY4MF5BMl5BanBnXkFtZTcwNzgyOTc3MQ@@._V1_SX300.jpg"
        },
        {
            "Title": "A Lego Brickumentary",
            "Year": "2014",
            "imdbID": "tt3214286",
            "Type": "movie",
            "Poster": "https://m.media-amazon.com/images/M/MV5BMTA5Njk2MTQ1NjBeQTJeQWpwZ15BbWU4MDM2MDA0NjUx._V1_SX300.jpg"
        },
        {
            "Title": "Lego DC Comics Super Heroes: Justice League vs. Bizarro League",
            "Year": "2015",
            "imdbID": "tt4189260",
            "Type": "movie",
            "Poster": "https://m.media-amazon.com/images/M/MV5BMjIzMTYxMjk5MV5BMl5BanBnXkFtZTgwMjY5OTgyNDE@._V1_SX300.jpg"
        },
        {
            "Title": "Lego: The Adventures of Clutch Powers",
            "Year": "2010",
            "imdbID": "tt1587414",
            "Type": "movie",
            "Poster": "https://m.media-amazon.com/images/M/MV5BMjQ1NzM2MDE2Nl5BMl5BanBnXkFtZTcwNjg4NDcxMw@@._V1_SX300.jpg"
        }
    ],
    "totalResults": "230",
    "Response": "True"
}
```

### Testing

``` bash
vendor/bin/phpunit 
```
Update your phpunit.xml.dist to include env variable with your OMDB_API_KEY;
```xml
<php>
    <env name="OMDB_API_KEY" value="SETME"/>
</php>
```


### Road Map
#### v0.1
* Client Object 
* Query Object
* Search Endpoint
* By Id Endpoint
* By Title Endpoint (Same as By Id)

#### v0.2
* Response converted to Custom Object
* Movie Resource Created
* Movie Resource returned by non-Search endpoints. 

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email admin@developingsonder.com instead of using the issue tracker.

## Credits

- [Matthew Moore](https://github.com/developing-sonder)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## PHP Package Boilerplate

This package was generated using the [PHP Package Boilerplate](https://laravelpackageboilerplate.com).