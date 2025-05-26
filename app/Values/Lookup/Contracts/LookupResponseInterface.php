<?php

declare(strict_types=1);

namespace App\Values\Lookup\Contracts;

interface LookupResponseInterface
{
    public function getUsername(): string;
    public function getId(): string;
    public function getAvatar(): string;
}
