# SimpleDateFormatter

This package for Laravel provides a simple yet effective Blade directive to format localized dates.

## Installation

Via Composer

``` bash
$ composer require reind33r/simpledateformatter
```

## Usage

In your Blade template :

``` blade
@localized_date($date, $date_format='long|full|short', $time_format=true|false)
```

If no value (or an incorrect one) is provided to $date_format, default format will be short. \
If no value is provided for $time_format, default is false.

The package uses the locale configured in your Laravel app to construct a IntlDateFormatter object, then it uses the predefined PHP formats :

 * IntlDateFormatter::LONG
 * IntlDateFormatter::FULL
 * IntlDateFormatter::SHORT


## Change log

This is the first version.

## License

This package is licensed under [MIT license](license.md).