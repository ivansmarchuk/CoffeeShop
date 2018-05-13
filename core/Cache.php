<?php
/**
 * Created by PhpStorm.
 * User: Ivan Marchuk
 * Date: 28.03.2018
 * Time: 17:00
 */

namespace coffeeshop;


class Cache
{
    use TSingletone;

    /**
     * saves cache into files unten tmp
     * @param $key key id
     * @param $data information
     * @param int $seconds duration
     * @return bool flag
     */
    public function set($key, $data, $seconds = 3600)
    {
        if ($seconds) {
            $content['data'] = $data;
            $content['end_time'] = time() + $seconds;
            if (file_put_contents(CACHE . '/' . md5($key) . '.txt', serialize($content))) {
                return true;
            }
        }
        return false;
    }

    public function get($key)
    {
        $file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($file)) {
            $content = unserialize(file_get_contents($file));
            if (time() <= $content['end_time']) {
                return $content['data'];
            }
            unlink($file);
        }
        return false;
    }

    public function delete($key)
    {
        $file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($file)) {
            unlink($file);
        }
    }

}