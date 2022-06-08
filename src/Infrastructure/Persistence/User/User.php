<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;

use App\Helpers\Helpers;
use App\Infrastructure\Persistence\Address\Address;
use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    /** @var string */
    protected $table = 'users';

    /** @var bool */
    public $timestamps = true;

    /** @var string[] */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public $hidden = [
        'password',
    ];

    public function addresses()
    {
        $addresses = $this->hasMany(Address::class)->get();

        foreach ($addresses as $address) {
            $address->street = ucfirst($address->street);
            $address->zipcode = Helpers::formatZipcode($address->zipcode);
        }

        return $addresses;
    }
}
