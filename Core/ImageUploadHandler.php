<?php

namespace Core;

class ImageUploadHandler
{
    private string $targetDir;
    private array $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    private int|float $maxFileSize = 2 * 1024 * 1024; // 2MB
    private $error;

    public function __construct($targetDir) {
        $this->targetDir = rtrim($targetDir, '/') . '/';
    }

    public function upload($file): false|string
    {
        $fileName = basename($file['name']);
        $targetFilePath = $this->targetDir . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        // Check if the file type is allowed
        if (!in_array($fileType, $this->allowedTypes)) {
            $this->error = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed.";
            return false;
        }

        // Check file size
        if ($file['size'] > $this->maxFileSize) {
            $this->error = "Sorry, your file is too large. Maximum size is 2MB.";
            return false;
        }

        // Check if the file already exists
        if (file_exists($targetFilePath)) {
            $this->error = "Sorry, file already exists.";
            return false;
        }

        // Attempt to move the uploaded file
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            return $fileName;
        } else {
            $this->error = "Sorry, there was an error uploading your file.";
            return false;
        }
    }

    public function getError() {
        return $this->error;
    }
}