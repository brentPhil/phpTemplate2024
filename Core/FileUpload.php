<?php

namespace Core;

class FileUpload
{
    public static function upload(array $file, string $uploadDir = 'uploads/'): array
    {
        // Check if the file array is empty
        if (empty($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            return [
                'success' => true,
                'message' => 'No file to upload.'
            ];
        }

        // Ensure the upload directory exists
        $uploadDir = rtrim($uploadDir, '/') . '/';
        if (!is_dir($uploadDir) && !mkdir($uploadDir, 0755, true)) {
            return [
                'success' => false,
                'message' => 'Failed to create upload directory.'
            ];
        }

        // Check if the file was uploaded properly
        if (!isset($file['error']) || is_array($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
            return [
                'success' => false,
                'message' => 'File upload error.'
            ];
        }

        // Create the destination path
        $tmpName = $file['tmp_name'];
        $fileName = basename($file['name']);
        $destination = $uploadDir . $fileName;

        // Move the uploaded file
        if (move_uploaded_file($tmpName, $destination)) {
            return [
                'success' => true,
                'message' => $fileName
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Failed to move uploaded file.'
            ];
        }
    }
}