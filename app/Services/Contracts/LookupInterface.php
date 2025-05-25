<?php 

namespace App\Services\Contracts;

use App\Values\Lookup\LookupValue;

interface LookupInterface

{
  public function handle(LookupValue $lookupValue);
}