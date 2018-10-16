<?php

/*
 * This file is part of ibrand/setting.
 *
 * (c) iBrand <https://www.ibrand.cc>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace iBrand\Component\Setting\Repositories;

use iBrand\Component\Setting\Models\SystemSetting;

/**
 * Class EloquentSetting
 * @package iBrand\Component\Setting\Repositories
 */
class EloquentSetting implements SettingInterface
{
    /**
     * @var SystemSetting
     */
    private $model;

    /**
     * EloquentSetting constructor.
     * @param SystemSetting $model
     */
    public function __construct(SystemSetting $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $settings
     * @return bool
     */
    public function setSetting(array $settings)
    {
        if (count($settings) <= 0) {
            return false;
        }

        foreach ($settings as $key => $val) {
            $var = $this->model->where('key', $key)->first();
            if ($var) {
                $var->value = $val;
                $var->save();
            } else {
                $var = $this->model->create(['key' => $key, 'value' => $val]);
            }
        }

        return $var;
    }

    /**
     * @param $key
     * @param null $default
     * @return bool|mixed|string
     */
    public function getSetting($key, $default = null)
    {
        $value = $this->model->where('key', $key)->get(['value'])->first();

        if (!is_null($value)) {
            return $value->value;
        }

        if (!is_null($default)) {
            return $default;
        }

        return '';
    }

    /**
     * @return array
     */
    public function allToArray()
    {
        $collection = $this->model->all();
        $keyed = $collection->mapWithKeys(function ($item) {
            return [$item->key => $item->value];
        });

        return $keyed->toArray();
    }
}
