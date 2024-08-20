# phptemplate2024

This command compiles Tailwind CSS from ./src/input.css to ./src/output.css and automatically watches for changes to recompile when the input file is modified.

```bash
bunx tailwindcss -i ./src/input.css -o ./src/output.css --watch
```

To install dependencies:

```bash
bun install
```

Here's how you can label and create use cases for each function in your README file on GitHub:

---

# PHP Utility Functions

This repository contains a set of utility functions commonly used in PHP projects. Below are the descriptions and use cases for each function.

## `dd($value)`

This function dumps the given value using `var_dump()` wrapped in `<pre>` tags for better readability and then stops the script execution.

### Example Use Case:
```php
$userData = ['name' => 'John Doe', 'email' => 'john@example.com'];
dd($userData);
```
This will output the array in a readable format and terminate the script, which is useful for debugging.

## `assets($src, $default): string`

This function returns the full path to an asset within the `public` directory of your project. If `$src` is empty, it will return the path to a default asset.

### Example Use Case:
```php
$imagePath = assets('images/logo.png', 'images/default-logo.png');
```
If `logo.png` exists, it returns the path to `logo.png`; otherwise, it returns the path to `default-logo.png`.

## `root($src): string`

This function returns the full path to a file within the root directory of your project.

### Example Use Case:
```php
$rootPath = root('config/app.php');
```
This returns the full path to the `app.php` file inside the `config` directory at the project root.

## `getFormattedDate($dateString, $format = 'F j, Y, g:i a'): string`

This function formats a given date string according to the specified format. If the date string is invalid, it returns 'Invalid date'.

### Example Use Case:
```php
$formattedDate = getFormattedDate('2024-08-20 15:30:00');
```
This will return something like `August 20, 2024, 3:30 pm`.

## `urlIs($value): bool`

This function checks if the current URL matches the given string and returns `true` if it matches, otherwise `false`.

### Example Use Case:
```php
if (urlIs('/home')) {
    echo 'You are on the homepage';
}
```
This will print a message if the current URL is `/home`.

## `authurize($condition, $status = Response::FORBIDDEN): void`

This function checks a condition, and if it is false, it aborts the request with the given status code (default is `403 Forbidden`).

### Example Use Case:
```php
authurize($user->isAdmin());
```
This will stop the script and return a `403 Forbidden` response if the user is not an admin.

---

These examples demonstrate how to use the utility functions provided in this repository. Adjust them according to your project's specific needs.