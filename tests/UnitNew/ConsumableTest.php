<?php

namespace Tests\Unit;

use App\Models\Consumable;
use Tests\TestCase;

class ConsumableTest extends TestCase
{
    /**
     * @test
     */
    public function testFailsEmptyValidation()
    {
        // An Consumable requires a name, a qty, and a category_id.
        $a = Consumable::create();
        $this->assertFalse($a->isValid());

        $fields = [
            'name' => 'name',
            'qty' => 'qty',
            'category_id' => 'category id'
        ];
        $errors = $a->getErrors();
        foreach ($fields as $field => $fieldTitle) {
            $this->assertEquals($errors->get($field)[0], "The ${fieldTitle} field is required.");
        }
    }

}
