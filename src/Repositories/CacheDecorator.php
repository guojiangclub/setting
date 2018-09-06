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
 * Class CacheDecorator
 * @package iBrand\Component\Setting\Repositories
 */
class CacheDecorator implements SettingInterface
{
    /**
     * @var SettingInterface
     */
    private $repo;
    /**
     * @var mixed
     */
    private $cache;

    /**
     * @var string
     */
    private $key;

    /**
     * CacheDecorator constructor.
     * @param SettingInterface $repo
     */
    public function __construct(SettingInterface $repo)
    {
        $this->repo = $repo;
        $this->cache = cache();
        $this->key = md5('ibrand.setting');
    }

    /**
     * @param array $settings
     * @return mixed
     */
    public function setSetting(array $settings)
    {
        $cacheKey = $this->key;

        $this->cache->forget($cacheKey);

        return $this->repo->setSetting($settings);
    }

    /**
     * @param $key
     * @return string
     */
    public function getSetting($key)
    {
        $allSettings = $this->allToArray();

        return isset($allSettings[$key]) ? $allSettings[$key] : '';
    }

    /**
     * @return mixed
     */
    public function allToArray()
    {
        $cacheKey = $this->key;

        $data = [];

        if ($this->cache->has($cacheKey)) {
            $data = $this->cache->get($cacheKey);
        }

        if (!$this->cache->has($cacheKey) || empty($data)) {

            $data = $this->repo->allToArray();

            // Store in cache for next request
            $this->cache->put($cacheKey, $data, 60);

        }

        return $data;
    }
}
