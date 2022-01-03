<?php

namespace App;

use Illuminate\Support\Arr;

abstract class ServiceRequest extends DTO
{
    /** @return array */
    public function input()
    {
        return $this->getData();
    }

    /** @return array */
    public function toArray()
    {
        return $this->all();
    }

    /**
     * Get all of the input and files for the request.
     *
     * @param array|mixed $keys
     *
     * @return array
     */
    public function all($keys = null)
    {
        $input = $this->input();

        if (! $keys) {
            return $input;
        }

        $results = [];

        foreach (is_array($keys) ? $keys : func_get_args() as $key) {
            Arr::set($results, $key, Arr::get($input, $key));
        }

        return $results;
    }

    /**
     * Determine if the request contains a given input item key.
     *
     * @param string|array $key
     *
     * @return bool
     */
    public function has($key)
    {
        $keys = is_array($key) ? $key : func_get_args();

        $input = $this->all();

        foreach ($keys as $value) {
            if (! Arr::has($input, $value)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Determine if the request contains any of the given inputs.
     *
     * @param string|array $keys
     *
     * @return bool
     */
    public function hasAny($keys)
    {
        $keys = is_array($keys) ? $keys : func_get_args();

        $input = $this->all();

        foreach ($keys as $key) {
            if (Arr::has($input, $key)) {
                return true;
            }
        }

        return false;
    }
}
