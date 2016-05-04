<?php

namespace PhpMyDivx\Engine;

class Cache
{
    private $cache = NULL;
    private $connected = false;
    private $servers = array(
        array('localhost', 11211)
    );
    private $expire;
    private $prefix;

    public function __construct()
    {
        $this->expire = 3600;

        self::connect();
    }

    private function connect()
    {
        if (defined('DISABLE_CACHE')) {
            return false;
        }

        $this->cache = new \memcached;

        if ($this->cache->addServers($this->servers)) {
            $this->connected = true;
        }

        return $this->connected;
    }

    private function set($key, $val, $expire = NULL)
    {
        if (defined('DISABLE_CACHE') || !$this->connected) {
            return false;
        }

        if ($expire != NULL) {
            if ($expire < 1) {
                $expire = 1;
            }

            if (!is_numeric($expire)) {
                $expire = strtotime($expire);
            }
        } else {
            $expire = $this->expire;
        }

        return $this->cache->set($key, $val, $expire);
    }

    private function get($key)
    {
        if (defined('DISABLE_CACHE') || !$this->connected) {
            return false;
        }

        return $this->cache->get($key);
    }

    private function delete($key)
    {
        if (defined('DISABLE_CACHE') || !$this->connected) {
            return false;
        }

        return $this->cache->set($key, NULL, 1);
    }
}