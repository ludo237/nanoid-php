# NanoID PHP Library

A simple, ready to use, PHP 8 ready library for generating NanoIDs. 

## What is a NanoID?

NanoID is a short, easy to select with double click, low chance of collision, easy to generate and human readable unique identifier.

## Install

Using composer

``` bash
composer require ludo237/nanoid-php
```

## Usage

The library is straightforward to use. Instantiate a new `Client` object
and call the `generate` method to get a new random ID. Simple as that.

```php
use Ludo237\Nanoid\Client;

$client = new Client();
$id = $client->generate();
```

### Customizations

Client accepts a custom alphabet, size and core if you want to change the underlying algorithm.
In order to use a custom core you need to implement the `CoreInterface` interface.

The library comes with two cores, `SecureCore` and `UnsecureCore`:

- `SecureCore` is the default and uses the `random_bytes` function to generate random bytes, which is more secure.
- `UnsecureCore` uses the `mt_rand` function to generate random bytes, which is less secure but faster.

Feel free to implement your own core and pass it to the client.

```php
use Ludo237\Nanoid\Client;

$client = new Client();
$client
    ->alphabet('1234567890')
    ->size(10)
    ->core(new MyCustomCore());

$id = $client->generate();
```

### Examples

You can find more examples in the [examples](examples) folder.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Notice

If you have any issues, just feel free and open it in this repository

## Credits

- [ai](https://github.com/ai)
- [All Contributors](https://github.com/ludo237/nanoid-php/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
