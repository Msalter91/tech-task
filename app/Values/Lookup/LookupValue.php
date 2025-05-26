<?php

declare(strict_types=1);

namespace App\Values\Lookup;

class LookupValue
{
    public ?string $username;
    public ?string $id;
    public ?string $type;
    public ?string $apiDetails;

    public function __construct(array $requestArray)
    {
        $this->type = $requestArray['type'];
        if (isset($requestArray['id'])) {
            $this->id = $requestArray['id'];
            $this->username = null;
        } else {
            $this->username = $requestArray['username'];
            $this->id = null;
        }
        $this->setApiDetails();
    }

    private function setApiDetails()
    {
        $lookupBy = isset($this->id) ? 'id' : 'username';
        $configString = "api-details.{$this->type}.{$lookupBy}Url";

        if ($this->type === 'xbl' && $this->username) {
            $this->apiDetails = sprintf(config($configString), $this->username);
        } else {
            $this->apiDetails = config($configString) . ($this->id ?? $this->username);
        }
    }
}
