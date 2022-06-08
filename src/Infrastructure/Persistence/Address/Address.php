<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Address;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Address extends Eloquent
{
    public $table = "user_addresses";
    public $timestamps = false;
}