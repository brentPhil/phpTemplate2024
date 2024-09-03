<?php

function displayMessage($field, $icon): string
{
    return !empty($field)
        ? "<span class='text-error'><i class='{$icon}'></i> {$field}</span>"
        : '';
}

function renderRadioGroup(string $name, array $options = [], string $labelText = '', string $selected = '', array $errors = []): void
{
    // Determine error class and error message if applicable
    $errorClass = isset($errors[$name]) ? 'input-error' : '';
    $errorMessage = $errors[$name] ?? '';
    $errorHtml = $errorMessage ? displayMessage($errorMessage, 'bi bi-exclamation-diamond-fill') : '';

    echo <<<HTML
    <div class="form-control">
        <label for="{$name}" class="label">
            <span class="label-text">{$labelText}:</span>
        </label>
        <div class="flex gap-3">
HTML;

    foreach ($options as $value => $displayText) {
        $checked = $value === $selected ? 'checked' : '';
        echo <<<HTML
        <label class="label cursor-pointer w-fit md:w-full input input-bordered {$errorClass} flex items-center gap-2">
            <input type="radio" value="{$value}" {$checked} name="{$name}" class="radio checked:bg-primary" />
            <span class="label-text">{$displayText}</span>
        </label>
HTML;
    }

    echo <<<HTML
        </div>{$errorHtml}</div>
HTML;
}


function createFormInput($labelText, $name, $placeholder, $value, $errors = [], $type = 'text'): string
{
    $inputClass = isset($errors[$name]) ? 'input-error' : '';
    $errorMessage = displayMessage($errors[$name] ?? '', 'bi bi-exclamation-diamond-fill');

    return <<<HTML
    <div class="form-control w-full">
        <label for="{$name}" class="label">
            <span class="label-text">{$labelText}</span>
        </label>
        <input type="{$type}" id="{$name}" placeholder="{$placeholder}" name="{$name}"
               value="{$value}"
               class="input input-bordered input-md {$inputClass}"
        />
        {$errorMessage}
    </div>
HTML;
}

function renderSelectDropdown(
    string $name,
    array $options = [],
    string $labelText = '',
    string $selected = '',
    array $errors = []): void
{
    // Determine error class and error message if applicable
    $errorClass = isset($errors[$name]) ? 'select-error' : '';
    $errorMessage = $errors[$name] ?? '';
    $errorHtml = $errorMessage ? displayMessage($errorMessage, 'bi bi-exclamation-diamond-fill') : '';

    echo <<<HTML
    <div class="form-control">
        <label for="{$name}" class="label">
            <span class="label-text">{$labelText}</span>
        </label>
        <select id="{$name}" name="{$name}" class="w-full select select-bordered {$errorClass}">
HTML;

    foreach ($options as $option) {
        $isSelected = $option['id'] === $selected ? 'selected' : '';
        echo "<option value='{$option['id']}' {$isSelected}>{$option['name']}</option>";
    }

    echo <<<HTML
        </select>
        {$errorHtml}
    </div>
HTML;
}
