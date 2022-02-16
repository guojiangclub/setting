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
```

## 果酱云社区

<p align="center">
  <a href="https://guojiang.club/" target="_blank">
    <img src="https://cdn.guojiang.club/image/2022/02/16/wu_1fs0jbco2182g280l1vagm7be6.png" alt="点击跳转"/>
  </a>
</p>



- 全网真正免费的IT课程平台

- 专注于综合IT技术的在线课程，致力于打造优质、高效的IT在线教育平台

- 课程方向包含Python、Java、前端、大数据、数据分析、人工智能等热门IT课程

- 300+免费课程任你选择



<p align="center">
  <a href="https://guojiang.club/" target="_blank">
    <img src="https://cdn.guojiang.club/image/2022/02/16/wu_1fs0l82ae1pq11e431j6n17js1vq76.png" alt="点击跳转"/>
  </a>
</p>