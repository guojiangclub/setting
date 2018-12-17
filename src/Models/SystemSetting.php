<?php

/*
 * This file is part of ibrand/setting.
 *
 * (c) iBrand <https://www.ibrand.cc>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace iBrand\Component\Setting\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SystemSetting
 * @package iBrand\Component\Setting\Models
 */
class SystemSetting extends Model
{

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * SystemSetting constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('ibrand.setting.table_name'));
    }

    /**
     * @param $value
     * @return mixed|string
     */
    public function getValueAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * @param $value
     * @return string
     */
    public function setValueAttribute($value)
    {
        if ($value or 0 == $value) {
            $this->attributes['value'] = json_encode($value);
        }

        return '';
    }
}
