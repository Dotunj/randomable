<?php

namespace Dotunj\Randomable\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Randomable extends Model
{
    protected $guarded = [];

    protected $table = 'randomables';

    public function getTable()
    {
        return config('randomable.table_name');
    }

    public static function getRandomFirstName()
    {
        return self::getRandomRow()->first_name;
    }

    public static function getRandomLastName()
    {
        return self::getRandomRow()->last_name;
    }

    public static function getRandomEmail()
    {
        return self::getRandomRow()->email;
    }

    public static function getRandomRow()
    {
        return self::inRandomOrder()->first();
    }
}
