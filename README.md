# Introduction
This is a Laravel package for generating random data such as first names, last names and emails. 

### Step One - Installation

Require the package via composer into your project

```shell
composer require dotunj/randomable
```

### Step Two - Publishing Configurations
Randomable provides you with an easy way of customizing the table name for storing the random data. To customize this you need to publish the 
configuration file and edit the table name. To publish the configuration files, run:

`php artisan vendor:publish --tag=randomable-config`

This is the content of the config file that will be published at `config/randomable.php`

```php
<?php
    return [
        'table_name' => 'randomables',
    ];
```
You can go ahead and customize the Table name as you find suitable before running the Migration.

### Step Three - Publishing Migration and Seeds

Next, to publish the Migrations from the package

```shell
php artisan vendor:publish --tag=randomable-migrations
```
To publish the Seeders from the package

```shell
php artisan vendor:publish --tag=randomable-seeds
```

### Step Four - Running Migrations

> Make sure you've edited the `.env` file with your correct Database Credentials

```shell
php artisan migrate
```

Finally, run the Package seeders

```shell
php artisan db:seed --class=RandomableTableSeeder
```

Optionally to publish all of the package's resources at once, you can run the following command:

```shell
php artisan vendor:publish --provider="Dotunj\Randomable\RandomableServiceProvider"
```

### Usage
To generate a random first name, last name and email, you can use the Facade at `Dotunj\Randomable\Facades\RandomableFacade`.

```php
<?php

use Dotunj\Randomable\Facades\RandomableFacade as Randomable;

$firstName = Randomable::firstName();

$lastName = Randomable::lastName();

$email = Randomable::email();
```

## Contributing

Want to contribute to this package? Read our [contributor guidelines](CONTRIBUTING.md) to get set up.

## License

This demo is released under the [MIT License](LICENSE.md).
