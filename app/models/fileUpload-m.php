<?php

class fileUpload{

    private $file;

    public function __construct()
    {}

    // method to set File
    public function setFile($file) {
        $this->file = $file;
    }

    public function handleUpload(){
        if ($this->file['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $filename = uniqid() . '-' . basename($this->file['name']);
            $destination = $uploadDir . $filename;

            // allowed file extension
            $allowedExtension = ['jpg', 'jpeg', 'png'];
            $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if (in_array($fileExtension, $allowedExtension)) {
                if (move_uploaded_file($this->file['tmp_name'], $destination)) {
                    return $destination;
                }else {
                    return false;
                }
            }
            
        }
    }
}