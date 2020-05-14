<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\AssetModel;

class AssetModelTest extends TestCase
{
    /**
     * @test
     */
    public function it_sets_eol_to_zero_if_blank()
    {
        $am = new AssetModel;
        $am->eol = '';
        $this->assertTrue($am->eol === 0);
        $am->eol = 4;
        $this->assertTrue($am->eol==4);
    }
}
