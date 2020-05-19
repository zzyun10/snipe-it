<?php

namespace Tests\Unit;

use App\Models\Accessory;
use App\Models\Category;
use App\Models\Location;
use App\Models\Company;
use App\Models\Manufacturer;
use Tests\TestCase;


class AccessoryTest extends TestCase
{
    /**
     * @test
     */
    public function testFailsMinValidation()
    {
        // An Accessory name has a min length of 3
        // An Accessory has a min qty of 1
        // An Accessory has a min amount of 0
        $a = factory(Accessory::class)->make([
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

    /**
     * @test
     */
    public function testAnAccessoryBelongsToACompany()
    {
        $accessory = factory(Accessory::class)
            ->create(['company_id' => factory(Company::class)->create()->id]);
        $this->assertInstanceOf(Company::class, $accessory->company);
    }

    /**
     * @test
     */
    public function testAnAccessoryHasALocation()
    {
        $accessory = factory(Accessory::class)
            ->create(['location_id' => factory(Location::class)->create()->id]);
        $this->assertInstanceOf(Location::class, $accessory->location);
    }
    



    /**
     * @test
     */
    public function testAnAccessoryHasAManufacturer()
    {
        $manufacturer = $this->createValidManufacturer('apple');
        $category = $this->createValidCategory('accessory-keyboard-category');
        $accessory = factory(Accessory::class)->states('apple-bt-keyboard')->create(['category_id' => $category->id]);
        $this->assertInstanceOf(Manufacturer::class, $manufacturer);
    }

}
