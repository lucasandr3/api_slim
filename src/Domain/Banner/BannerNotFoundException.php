<?php

declare(strict_types=1);

namespace App\Domain\Banner;

use App\Domain\DomainException\DomainRecordNotFoundException;

class BannerNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The banner you requested does not exist.';
}
