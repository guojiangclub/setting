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

/**
 * Interface SettingInterface
 * @package iBrand\Component\Setting\Repositories
 */
interface SettingInterface
{
    /**
     * @param array $settings
     * @return mixed
     */
    public function setSetting(array $settings);

    /**
     * @param $key
     * @return mixed
     */
    public function getSetting($key,$input=null);

    /**
     * @return mixed
     */
    public function allToArray();
}
