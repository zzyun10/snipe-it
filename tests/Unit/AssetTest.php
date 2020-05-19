<?php

namespace Tests\Unit;

use App\Models\Asset;
// use Tests\TestCase;
use PHPUnit\Framework\TestCase;

class AssetTest extends TestCase
{
    private $asset;

    public function setUp() :void  {
        $this->asset = new Asset();
    }



    public function testAutoIncrementMixed()
    {
        $expected = '123411';
        $next = Asset::nextAutoIncrement(
            collect([
                ['asset_tag' => '0012345'],
                ['asset_tag' => 'WTF00134'],
                ['asset_tag' => 'WTF-745'],
                ['asset_tag' => '0012346'],
                ['asset_tag' => '00123410'],
                ['asset_tag' => 'U8T7597h77']
            ])
        );

        $this->assertEquals($expected, $next);
    }


    public function testAutoIncrementMixedFullTagNumber()
    {
        $expected = '123411';
        $next = Asset::nextAutoIncrement(
            [
                ['asset_tag' => '0012345'],
                ['asset_tag' => 'WTF00134'],
                ['asset_tag' => 'WTF-745'],
                ['asset_tag' => '0012346'],
                ['asset_tag' => '00123410'],
                ['asset_tag' => 'U8T7597h77']
            ]
        );
        $this->assertEquals($expected, $next);
    }



}
