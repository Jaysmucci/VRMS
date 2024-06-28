<?php

class fileUpload {
    private $file;
    private $maxfileSize = 1 * 1024 * 1024;

    public function __construct() {}

    // Method to set file
    public function setFile($file) {
        $this->file = $file;
    }

    // Method to upload file to the provided DIR
    public function handleUpload($uploadDir) {
        if ($this->file['error'] === UPLOAD_ERR_OK) {

            // Check file size
            if ($this->file['size'] > $this->maxfileSize) {
                return ['success' => false, 'message' => 'File size exceeds the maximum limit of 1MB'];
            }

            // Sanitize upload directory
            $uploadDir = rtrim($uploadDir, '/') . '/';

            // Check and create upload dir if not exists
            if (!is_dir($uploadDir)) {
                if (!mkdir($uploadDir, 0755, true)) {
                    return ['success' => false, 'message' => 'Failed to create upload directory'];
                }
            }

            // Sanitize filename and create unique id
            $filename = uniqid() . '-' . basename($this->file['name']);
            $regulate = preg_replace('/[^a-zA-Z0-9-_\.]/', '', $filename);
            $destination = $uploadDir . $regulate;

            // Allowed file extension
            $allowedExtension = ['jpg', 'jpeg', 'png'];
            $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            // Validate file extension
            if (!in_array($fileExtension, $allowedExtension)) {
                return ['success' => false, 'message' => 'Invalid file extension'];
            }

            // Validate file MIME type
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($finfo, $this->file['tmp_name']);
            finfo_close($finfo);

            $allowedMimeTypes = ['image/jpeg', 'image/png'];

            if (!in_array($mimeType, $allowedMimeTypes)) {
                return ['success' => false, 'message' => 'Invalid file MIME type'];
            }

            // Move uploaded files to folder destination created
            if (move_uploaded_file($this->file['tmp_name'], $destination)) {
                return ['success' => true, 'path' => $destination];
            } else {
                return ['success' => false, 'message' => 'Failed to upload file'];
            }

        } else {
            return ['success' => false, 'message' => 'File upload error'];
        }
    }
}
