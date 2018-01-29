# Laravel Settings

Laravel 5.x Settings help your key value to persist.

[![Build Status](https://travis-ci.org/ibrandcc/setting.svg?branch=master)](https://travis-ci.org/ibrandcc/setting)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ibrandcc/setting/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ibrandcc/setting/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/ibrandcc/setting/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/ibrandcc/setting/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/ibrand/setting/v/stable)](https://packagist.org/packages/ibrand/setting)
[![Latest Unstable Version](https://poser.pugx.org/ibrand/setting/v/unstable)](https://packagist.org/packages/ibrand/setting)
[![License](https://poser.pugx.org/ibrand/setting/license)](https://packagist.org/packages/ibrand/setting)

## Installation

### Composer install

```sh
$ composer require ibrand/setting -vvv
```

If your Laravel version below 5.5, you need add  the follow line to the section `providers` of `config/app.php`:

```sh
iBrand\Component\Setting\ServiceProvider::class,
```

### Publishing config file
If you want to edit default config file, just publish it you app config folder.

```sh
php artisan vendor:publish --provider="iBrand\Component\Setting\ServiceProvider"
```

### Creating table for database.

Execute artisan command
```sh
php artisan migrate
```

## Usage

### Change database table name.

If you want to change database table name, you can change `config/ibrand/setting.php` after publishing config file.

```php
return [

    'table_name' => 'el_system_settings',

    'cache' => true,
];
```

### Use settings() help method.

#### Set value

```php
settings(['key'=>'value'])
```

#### Get Value

```php
settings('key')
```

### Use App make Method.

#### Set value

```php
app('system_setting')->setSetting(['key'=>'value'])
```

#### Get Value

```php
app('system_setting')->getSetting('key')
```

### Disable cache.

Set `cache=>false` in `config/ibrand/setting.php` file.

```php
return [

    'table_name' => 'el_system_settings',

    'cache' => false,
];

