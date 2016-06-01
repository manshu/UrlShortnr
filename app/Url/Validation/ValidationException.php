<?php namespace Url\Validation;

class ValidationException extends \Exception
{
    protected $errors;
    /**
     * ValidationException constructor.
     * @param $errors
     */
    public function __construct($errors)
    {
        $this->errors = $errors;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }
}