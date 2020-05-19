<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\CustomField;

/*
 * Test strings for db column names  gathered from
 * http://www.omniglot.com/language/phrases/hovercraft.htm
 */

class CustomFieldTest extends TestCase
{

    /**
     * @test
     */
    public function Ip_format_does_something()
    {
        // What is this really testing?
        $this->markTestIncomplete();

        $customfield = factory(CustomField::class)->make(['format' => 'IP']);
        $values = [
            'name' => $customfield->name,
            'format' => $customfield->format,
            'element' => $customfield->element,
        ];

        $this->assertEquals($customfield->getAttributes()['format'], CustomField::PREDEFINED_FORMATS['IP']); //this seems undocumented...
        $this->assertEquals($customfield->format, "IP");
    }

    /**
     * ASCII text to slug
     *
     * @test
     */
    public function it_converts_ascii_names_to_db_safe_slug()
    {
        $customfield = new CustomField();
        $customfield->name = "My hovercraft is full of eels";
        $customfield->id = 1337;
        $this->assertEquals($customfield->convertUnicodeDbSlug(), "_snipeit_my_hovercraft_is_full_of_eels_1337");
    }

    /**
     * Western Europe text to slug
     *
     * @test
     */
    public function it_converts_western_european_names_to_db_safe_slug()
    {
        $customfield = new CustomField();
        $customfield->name="My hovercraft is full of eels";
        $customfield->id = 1337;
        $this->assertEquals($customfield->convertUnicodeDbSlug(), "_snipeit_my_hovercraft_is_full_of_eels_1337");
    }


    /**
     * Chinese text to slug
     *
     * @test
     */
    public function it_converts_chinese_to_db_safe_slug()
    {
        $customfield = new CustomField();
        $customfield->name="我的氣墊船裝滿了鱔魚";
        $customfield->id = 1337;
        if (function_exists('transliterator_transliterate')) {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), "_snipeit_wo_de_qi_dian_chuan_zhuang_man_le_shan_yu_1337");
        } else {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), "_snipeit_aecsae0ase1eaeaeoees_1337");
        }
    }

    /**
     * Japanese text to slug
     *
     * @test
     */
    public function it_converts_japanese_to_db_safe_slug()
    {
        $customfield = new CustomField();
        $customfield->name="私のホバークラフトは鰻でいっぱいです";
        $customfield->id = 1337;
        if (function_exists('transliterator_transliterate')) {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), "_snipeit_sinohohakurafutoha_manteihhaitesu_1337");
        } else {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), "_snipeit_caafafafaafcafafae0aaaaaaa_1337");
        }
    }

    /**
     * Korean text to slug
     *
     * @test
     */
    public function it_converts_korean_to_db_safe_slug()
    {
        $customfield = new CustomField();
        $customfield->name = "내 호버크라프트는 장어로 가득 차 있어요";
        $customfield->id = 1337;
        if (function_exists('transliterator_transliterate')) {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), "_snipeit_nae_hobeokeulapeuteuneun_jang_eolo_gadeug_1337");
        } else {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), "_snipeit_e_ie2ieiises_izieoe_e0e_i0_iziis_1337");
        }

    }

    /**
     * Non-Latin Euro text to slug
     *
     * @test
     */
    public function it_converts_nordic_to_db_safe_slug()
    {
        $customfield = new CustomField();
        $customfield->name = "Mój poduszkowiec jest pełen węgorzy";
        $customfield->id = 1337;
        if (function_exists('transliterator_transliterate')) {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), "_snipeit_moj_poduszkowiec_jest_pelen_wegorzy_1337");
        } else {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), "_snipeit_ma3j_poduszkowiec_jest_peaen_waegorzy_1337");
        }
    }

    /**
     * Turkish text to slug
     *
     * @test
     */
    public function it_converts_turkish_to_db_safe_slug()
    {
        $customfield = new CustomField();
        $customfield->name = "Hoverkraftım yılan balığı dolu";
        $customfield->id = 1337;
        if (function_exists('transliterator_transliterate')) {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), "_snipeit_hoverkraftim_yilan_baligi_dolu_1337");
        } else {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), "_snipeit_hoverkraftaem_yaelan_balaeaeyae_dolu_1337");
        }
    }

    /**
     * Arabic text to slug
     *
     * @test
     */
    public function it_converts_arabic_to_db_safe_slug()
    {
        $customfield = new CustomField();
        $customfield->name="حَوّامتي مُمْتِلئة بِأَنْقَلَيْسون";
        $customfield->id = 1337;
        if (function_exists('transliterator_transliterate')) {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), "_snipeit_hwamty_mmtlyt_banqlyswn_1337");
        } else {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), "_snipeit_ouzuuouoaus_uuuuoauuooc_ououzuuuuzuuzusuo_1337");
        }
    }
}
