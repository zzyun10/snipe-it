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
    public function testAnAccessoryBelongsToACategory()
    {
        $accessory = factory(Accessory::class)->states('apple-bt-keyboard')
            ->create(['category_id' => factory(Category::class)->states('accessory-keyboard-category')->create(['category_type' => 'accessory'])->id]);
        $this->assertInstanceOf(Category::class, $accessory->category);
        $this->assertEquals('accessory', $accessory->category->category_type);
    }

    /**
     * @test
     */
    public function testCategoryIdMustExist()
    {
        $category = $this->createValidCategory('accessory-keyboard-category', ['category_type' => 'accessory']);
        $accessory = factory(Accessory::class)->states('apple-bt-keyboard')->make(['category_id' => $category->id]);
        $this->createValidManufacturer('apple');

        $accessory->save();
        $this->assertTrue($accessory->isValid());
        $newId = $category->id + 1;
        $accessory = factory(Accessory::class)->states('apple-bt-keyboard')->make(['category_id' => $newId]);
        $accessory->save();

        $this->assertFalse($accessory->isValid());
        $this->assertStringContainsString("The selected category id is invalid.", $accessory->getErrors()->get('category_id')[0]);
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
