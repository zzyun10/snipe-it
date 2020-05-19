<?php

namespace Tests\Unit;

use App\Models\Component;
use Tests\TestCase;

class ComponentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testFailsEmptyValidation()
    {
        // An Component requires a name, a qty, and a category_id.
        $a = Component::create();
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

    public function testFailsMinValidation()
    {
        // An Component name has a min length of 3
        // An Component has a min qty of 1
        // An Component has a min amount of 0
        $a = factory(Component::class)->make([
            'name' => 'a',
            'qty' => 0,
            'min_amt' => -1
        ]);
        $fields = [
            'name' => 'name',
            'qty' => 'qty',
            'min_amt' => 'min amt'
        ];
        $this->assertFalse($a->isValid());
        $errors = $a->getErrors();
        foreach ($fields as $field => $fieldTitle) {
            $this->assertStringContainsString("The ${fieldTitle} must be at least", $errors->get($field)[0]);
        }
    }
}
