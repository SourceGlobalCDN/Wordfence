<?php

namespace GeoIp2\Model;

/**
 * @ignore
 */
abstract class AbstractModel implements \JsonSerializable
{
    protected $raw;

    /**
     * @param mixed $raw
     * @ignore
     *
     */
    public function __construct($raw)
    {
        $this->raw = $raw;
    }

    /**
     * @param mixed $attr
     * @ignore
     *
     */
    public function __get($attr)
    {
        if ($attr !== 'instance' && property_exists($this, $attr)) {
            return $this->$attr;
        }

        throw new \RuntimeException("Unknown attribute: $attr");
    }

    /**
     * @param mixed $attr
     * @ignore
     *
     */
    public function __isset($attr)
    {
        return $attr !== 'instance' && isset($this->$attr);
    }

    public function jsonSerialize()
    {
        return $this->raw;
    }

    /**
     * @param mixed $field
     * @ignore
     *
     */
    protected function get($field)
    {
        if (isset($this->raw[$field])) {
            return $this->raw[$field];
        }
        if (preg_match('/^is_/', $field)) {
            return false;
        }

        return null;
    }
}
