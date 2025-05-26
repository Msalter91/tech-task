<?php

declare(strict_types=1);

namespace App\Values\Lookup;

use App\Values\Lookup\Contracts\LookupResponseInterface;

class XblLookupResponseValue implements LookupResponseInterface
{
    private string $username;
    private string $id;
    private string $avatar;

    public function __construct($response)
    {
        $this->username = $response->username;
        $this->id = $response->id;
        $this->avatar = $response->meta->avatar;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAvatar(): string
    {
        return $this->avatar;
    }
}
