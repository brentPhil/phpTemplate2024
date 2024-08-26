<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class ValidateForm
{
    protected array $errors = [];

    public function __construct(public array $attributes)
    {
        $this->validateFields($attributes);
    }

    // General field validation method
    protected function validateFields(array $fields): void
    {
        foreach ($fields as $key => $value) {
            // General validation for any string fields
            if (!Validator::string($value)) {
                $this->errors[$key] = "This field is required";
            }

            // Specific validation for email
            if ($key === 'email' && !Validator::email($value)) {
                $this->errors[$key] = "Invalid email address";
            }

            // Specific validation for password with a minimum length of 8 characters
            if ($key === 'password' && !Validator::string($value, 3)) {
                $this->errors[$key] = "Password must be at least 8 characters long";
            }
        }
    }

    public static function validate(array $attributes): static
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        return ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed(): bool
    {
        return !empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error(string $field, string $message): static
    {
        $this->errors[$field] = $message;

        return $this;
    }
}
