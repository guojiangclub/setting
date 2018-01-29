<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/29
 * Time: 13:31
 */
class SettingTest extends BaseTest
{
    public function testSet()
    {
        //test string value.
        $setting = settings(['key' => 'value']);
        $this->assertEquals(iBrand\Component\Setting\Models\SystemSetting::class, get_class($setting));
        $this->assertEquals('key', $setting->key);
        $this->assertEquals('value', $setting->value);

        //test 0 value.
        $setting0 = settings(['key0' => 0]);
        $this->assertEquals(0, $setting0->value);

        //test "" string.
        $setting1 = settings(['key1' => ""]);
        $this->assertEquals("", $setting1->value);

        //test array
        $setting2 = settings(['key2' => ['key1' => 'value1', 'key2' => 'value2']]);
        $this->assertEquals(2, count($setting2->value));
        $this->assertEquals(['key1' => 'value1', 'key2' => 'value2'], $setting2->value);

        //test bool
        $setting3 = settings(['key3' => true]);
        $this->assertEquals(true, $setting3->value);

        $setting4 = settings(['key4' => false]);
        $this->assertEquals(false, $setting4->value);
    }

    public function testGet()
    {
        //test string value.
        $setting = settings(['key' => 'value']);
        $this->assertEquals('value', settings('key'));
        //test 0 value.
        $setting0 = settings(['key0' => 0]);
        $this->assertEquals(0, settings('key0'));

        //test "" string.
        $setting1 = settings(['key1' => ""]);
        $this->assertEquals("", settings('key1'));

        //test array
        $setting2 = settings(['key2' => ['key1' => 'value1', 'key2' => 'value2']]);
        $this->assertEquals(2, count(settings('key2')));
        $this->assertEquals(['key1' => 'value1', 'key2' => 'value2'],settings('key2'));

        //test bool
        $setting3 = settings(['key3' => true]);
        $this->assertEquals(true, settings('key3'));

        $setting4 = settings(['key4' => false]);
        $this->assertEquals(false, settings('key4'));
    }
}