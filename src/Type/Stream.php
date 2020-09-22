<?php

namespace Flat3\OData\Type;

use Flat3\OData\Type;

class Stream extends Type
{
    public const EDM_TYPE = 'Edm.Stream';

    /** @var ?string $value */
    protected $value;

    public function toUrl(): string
    {
        if (null === $this->value) {
            return $this::URL_NULL;
        }

        return sprintf("'%s'", $this->value);
    }

    public function toJson()
    {
        if (null === $this->value) {
            return null;
        }

        return (string) $this->value;
    }

    public function toInternal($value): void
    {
        $this->value = $this->maybeNull(null === $value ? null : $value);
    }
}