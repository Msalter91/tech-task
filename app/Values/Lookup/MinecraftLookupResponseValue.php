<?php

declare(strict_types=1);

namespace App\Values\Lookup;

use App\Values\Lookup\Contracts\LookupResponseInterface;

class MinecraftLookupResponseValue implements LookupResponseInterface
{
    private string $username;
    private string $id;
    private string $avatar;

    public function __construct($response)
    {
        $this->username = $response->name;
        $this->id = $response->id;
        $this->avatar = "https://crafatar.com/avatars{$this->id}";
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
