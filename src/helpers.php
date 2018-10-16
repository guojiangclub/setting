<?php

/*
 * This file is part of ibrand/setting.
 *
 * (c) iBrand <https://www.ibrand.cc>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (!function_exists('settings')) {

    /**
     * get settings.
     * @param null $key
     * @param null $value
     * @return \Illuminate\Foundation\Application|mixed|string
     */
    function settings($key = null, $value=null)
    {
        if (is_null($key)) {
            return app('system_setting');
        }
		
        if (is_string($key)) {
            return app('system_setting')->getSetting($key,$value);
        }

        if (is_array($key)) {
            return app('system_setting')->setSetting($key);
        }

        return '';
    }
}
