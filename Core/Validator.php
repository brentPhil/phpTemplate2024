<?php

namespace Core;

class Validator
{
    public static function string($value, $min = 1, $max = INF): bool
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function file($file, array $allowedTypes, $maxSizeMB = INF): array
    {
        // Convert megabytes to bytes
        $maxSizeBytes = $maxSizeMB * 1024 * 1024;

        // Check if the file is empty
        if (empty($file['name']) || $file['error'] === UPLOAD_ERR_NO_FILE) {
            return [
                'success' => true, // Return true for empty files
                'message' => 'No file uploaded.'
            ];
        }

        // Check if the file has been uploaded properly
        if (!isset($file['error']) || is_array($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
            return [
                'success' => false,
                'message' => 'File upload error.'
            ];
        }

        // Validate file type
        $fileType = mime_content_type($file['tmp_name']);
        if (!in_array($fileType, $allowedTypes)) {
            return [
                'success' => false,
                'message' => 'Invalid file type.'
            ];
        }

        // Validate file size
        if ($file['size'] > $maxSizeBytes) {
            return [
                'success' => false,
                'message' => 'File size exceeds the maximum limit.'
            ];
        }

        // Return the file name if valid
        return [
            'success' => true,
            'message' => $file['name']
        ];
    }
}
