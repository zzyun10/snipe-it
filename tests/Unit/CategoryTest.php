<?php

namespace Tests\Unit;

use App\Models\Category;
use Tests\TestCase;


class CategoryTest extends TestCase
{
    /**
     * @test
     */
    public function testFailsEmptyValidation()
    {
        // An Asset requires a name, a qty, and a category_id.
        $a = Category::create();
        $this->assertFalse($a->isValid());

        $fields = [
            'name' => 'name',
            'category_type' => 'category type'
        ];
        $errors = $a->getErrors();
        foreach ($fields as $field => $fieldTitle) {
            $this->assertEquals($errors->get($field)[0], "The ${fieldTitle} field is required.");
        }
    }
}
