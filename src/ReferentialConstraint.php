<?php

namespace Flat3\Lodata;

use Flat3\Lodata\Type\Property;

class ReferentialConstraint
{
    /** @var Property $property */
    protected $property;

    /** @var Property $referenced_property */
    protected $referenced_property;

    public function __construct(Property $property, Property $referenced_property)
    {
        $this->property = $property;
        $this->referenced_property = $referenced_property;
    }

    public function getProperty(): Property
    {
        return $this->property;
    }

    public function getReferencedProperty(): Property
    {
        return $this->referenced_property;
    }

    public function __toString()
    {
        return $this->property->getIdentifier().'/'.$this->referenced_property->getIdentifier();
    }
}
