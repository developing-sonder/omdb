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

#### Find By Id
```php
$omdb = new Omdb;
$theMatrix = $omdb->find('tt0111161');

```
#### Search
```php
$omdb = new Omdb;
$results = $client->search('wife');
```

#### Complicated Query
```php
$query = new Query();
$query->setReleaseYear('2019')
      ->movie()
      ->plot('short')
      ->setSearchTerm('lego');
      
$client = new Omdb($query);
$results = $client->get();
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