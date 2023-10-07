<?php

namespace App\Services;

class Toast implements \ArrayAccess
{
    /**
     * Message of the toast
     * @var string
     */
    public $message;

    /**
     * Level of the toast: informantion | success | warning | error
     * @var string
     */
    public $level = 'information';

    /**
     * Style of the toast's status or level
     * @var string[][]
     */
    public $style = [
        'warning' => [
            'icon' => 'alert-triangle',
            'color' => 'btn-warning',
        ],
        'success' => [
            'icon' => 'check-circle',
            'color' => 'btn-success',
        ],
        'information' => [
            'icon' => 'alert-circle',
            'color' => 'btn-primary',
        ],
        'error' => [
            'icon' => 'x-octagon',
            'color' => 'btn-danger',
        ],
    ];

    /**
     * Whether the toast should autohide or not
     * @var bool
     */
    public $autohide;

    /***
     * Toast constructor.
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        $this->autohide = true;
        $this->update($attributes);
    }

    /**
     * Update the attributes
     * @param array $attributes
     * @return $this
     */
    public function update($attributes = [])
    {
        $attributes = array_filter($attributes);

        foreach ($attributes as $key => $attribute) {
            $this->$key = $attribute;
        }

        return $this;
    }

    /**
     * Whether the given offset exists.
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }

    /**
     * Fetch the offset.
     *
     * @param  mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->$offset;
    }

    /**
     * Assign the offset.
     *
     * @param  mixed $offset
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }

    /**
     * Unset the offset.
     *
     * @param  mixed $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        //
    }
}
