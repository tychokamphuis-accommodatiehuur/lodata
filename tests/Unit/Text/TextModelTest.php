<?php

namespace Flat3\OData\Tests\Unit\Text;

use Flat3\OData\ODataModel;
use Flat3\OData\Resource\EntitySet;
use Flat3\OData\Tests\Request;
use Flat3\OData\Tests\TestCase;
use Flat3\OData\Type;

class TextModelTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        ODataModel::add(
            new class(
                'texts',
                ODataModel::entitytype('text')
                    ->addDeclaredProperty('a', Type::string())
            ) extends EntitySet {
                public function generate(): array
                {
                    return array_slice([
                        $this->entity()
                            ->addPrimitive('a', 'a')
                    ], $this->skip, $this->top);
                }
            });
    }

    public function test_set()
    {
        $this->assertJsonResponse(
            Request::factory()
                ->path('/texts')
        );
    }
}