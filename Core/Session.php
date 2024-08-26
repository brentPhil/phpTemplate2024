<?php
//video ref: https://www.youtube.com/watch?v=eBpyc5iMqBc&list=PL3VM-unCzF8ipG50KDjnzhugceoSG3RTC&index=45

namespace Core;

class Session
{
    public static function has($key): bool
    {
        // Check if a session key exists by trying to retrieve its value
        return (bool) static::get($key);
    }

    public static function put($key, $value): void
    {
        // Store a value in the session under the specified key
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        // Retrieve a session message or a default value if the message does not exist
        return $_SESSION['_message'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function setMessage($key, $value): void
    {
        // Store a message in the session under the '_message' array with the specified key
        $_SESSION['_message'][$key] = $value;
    }

    public static function clearMessages(): void
    {
        // Remove all messages stored in the '_message' array from the session
        unset($_SESSION['_message']);
    }

    public static function clearSession(): void
    {
        $_SESSION = [];
    }
    public static function destroy(): void
    {
        static::clearSession();
        session_destroy();
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

}