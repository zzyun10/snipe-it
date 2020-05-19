<?php

namespace Tests\Unit;

use App\Models\Company;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    /**
     * @test
     */
    public function testFailsEmptyValidation()
    {
        // An Company requires a name, a qty, and a category_id.
        $a = Company::create();
        $this->assertFalse($a->isValid());

        $fields = [
            'name' => 'name',
        ];
        $errors = $a->getErrors();
        foreach ($fields as $field => $fieldTitle) {
            $this->assertEquals($errors->get($field)[0], "The ${fieldTitle} field is required.");
        }
    }

}
