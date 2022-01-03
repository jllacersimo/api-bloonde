<?php

namespace App;

use App\Exceptions\DTOException;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;

abstract class DTO implements Arrayable, Jsonable, JsonSerializable
{
    /**
     * Mandatory fields in the DTO
     *
     * @var array
     */
    protected $fields = [];
    private $didSetProperties = false;

    /**
     * DTO data
     *
     * @var array
     */
    private $data = [];

    /**
     * DTO constructor.
     *
     * @param array $data
     *
     * @throws DTOException
     */
    public function __construct(array $data)
    {
        $this->checkFields($data);
        $this->setData($data);
        $this->didSetProperties = true;
    }

    /**
     * @param $name
     * @param $value
     *
     * @throws DTOException
     */
    public function __set($name, $value)
    {
        if ($this->didSetProperties) {
            //debug_print_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
            throw new DTOException("You are triying to mutate the object. Cannot assign value to '{$name}'.");
        }
    }

    /**
     * @param $property
     *
     * @throws DTOException
     *
     * @return mixed
     */
    public function __get($property)
    {
        if (array_key_exists($property, $this->data)) {
            return $this->data[$property];
        } else {
            //debug_print_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
            throw new DTOException("Undefined property '{$property}'.");
        }
    }

    /**
     * Returns an array representation of the object.
     *
     * @return array
     */
    abstract public function toArray();

    /**
     * @param int $options
     *
     * @return false|string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }

    /**
     * @return false|string
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /** @return array */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Sets the data.
     *
     * @param array $data
     */
    private function setData($data)
    {
        foreach ($this->fields as $field) {
            if (!$data[$field] instanceof NotModifiedField) {
                $this->data[$field] = $data[$field];
            }
        }
    }

    /**
     * Check if the given DTO has all the mandatory fields
     *
     * @param $data
     *
     * @throws DTOException
     */
    private function checkFields($data)
    {
        foreach ($this->fields as $field) {
            if (!array_key_exists($field, $data)) {
                throw new DTOException("Missing field '{$field}' in DTO object");
            }
        }
    }
}
