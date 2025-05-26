<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use App\Values\Lookup\LookupValue;

interface LookupInterface
{
    public function handle(LookupValue $lookupValue);
}
