## Laravel Parsedown ![test workflow](https://github.com/kudashevs/laravel-parsedown/actions/workflows/run-tests.yml/badge.svg)

This is a **Laravel Parsedown** wrapper. If you want to know more about Parsedown, check out the [official repo](https://github.com/erusev/parsedown).


## Installation

You can install the package via composer:

```bash
composer require kudashevs/laravel-parsedown
```


## Features

* Configuration File
* Blade Directive
* Helper Function


## Configuration

If you don't use auto-discovery, just add a ParsedownServiceProvider to the `config/app.php`
```php
'providers' => [
    Kudashevs\LaravelParsedown\Providers\ParsedownServiceProvider::class,
],
```

This package uses the `ParsedownServiceProvider` service provider to create a singleton with a **Parsedown** instance. This
instance is stored in the container under the `parsedown` name. To change the behavior of this instance, use the following options:

| Name             | Description                                                                                          | Default |
|:-----------------|:-----------------------------------------------------------------------------------------------------|:--------|
| `enable_extra`   | Instantiates [ParsedownExtra](https://github.com/erusev/parsedown-extra) class instead of Parsedown. | `false` |
| `safe_mode`      | Processes untrusted user-input.                                                                      | `true`  |
| `enable_breaks`  | Converts line breaks such as `\n` into `<br />` tags.                                                | `false` |
| `escape_markup`  | Escapes **HTML** in trusted input. Redundant if `safe_mode` is enabled.                              | `false` |
| `link_urls`      | Automatically converts **URL**s into anchor tags.                                                    | `true`  |
| `inline`         | Tells the `parsedown()` helper and `@parsedown` directive to use inline parsing by default.          | `false` |

You can overwrite these values by publishing the `config/parsedown.php` file with the following command:
```bash
php artisan vendor:publish --provider="Kudashevs\LaravelParsedown\Providers\ParsedownServiceProvider"
```


## Usage

The code below shows how the `laravel-parsedown` can be used in `*.blade.php` files:
```blade
@parsedown('Hello _Parsedown_!')
```
...or using the helper instead:
```blade
{{ parsedown('Hello _Parsedown_!') }}
```

These examples are going to convert Markdown into this HTML code:
```html
<p>Hello <em>Parsedown</em>!</p>
```

If you want to use the inline parsing style, you just need to set the second argument as `true`:
```blade
@parsedown('Hello _Parsedown_!', true)
```
...or using the helper instead:
```blade
{{ parsedown('Hello _Parsedown_!', true) }}
```

The parsing style examples are going to generate:
```html
Hello <em>Parsedown</em>!
```

The helper is globally available and can also be used with PHP code throughout your project.


## License

The MIT License (MIT). Please see the [License file](LICENSE.md) for more information.