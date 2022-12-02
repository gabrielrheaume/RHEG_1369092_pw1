<?php

    // https://www.php.net/manual/en/features.file-upload.post-method.php

    class Upload
    {
        const UPLOAD_TYPE_ERROR = 1000;

        // Original file's name on client's machine
        private $name;

        // file's type, if specified by navigator. An exemple would be 'image/gif'
        private $type;

        // Size, in bytes, of the uploaded file
        private $size;

        // Temporary file's name on server
        private $tmp_name;

        // Error code associated to uploaded fichier
        // https://www.php.net/manual/en/features.file-upload.errors.php
        private $error;

        /**
         * Constructor
         * 
         * @param string $name Attribute name="" of the tag <input type="file">
         * @param array|null $validTypes (optional) An array containing the list of possible extensions
         */
        public function __construct(string $name, $validTypes = null)
        {

            if(!isset($_FILES[$name]))
            {
                echo '<div php-debug style="color: red;">';
                echo '<strong>Error Upload :</strong> No input of type="file" with name="' . $name . '" detected or the form doesn\'t have enctype="multipart/form-data".';
                echo "<br><br>";
                debug_print_backtrace();
                echo "</div>";
                exit();
            }

            $this->name = $_FILES[$name]["name"];
            $this->type = $_FILES[$name]["type"];
            $this->size = $_FILES[$name]["size"];
            $this->tmp_name = $_FILES[$name]["tmp_name"];
            $this->error = $_FILES[$name]["error"];

            if($this->error == UPLOAD_ERR_OK && $validTypes != null)
            {
                $file_separator = explode(".", $this->name);
                $extension = end($file_separator);
                if (in_array($extension, $validTypes) == false)
                {
                    $this->error = $this::UPLOAD_TYPE_ERROR;
                }
            }
        }

        /**
         * Move uploaded file to specified folder
         * 
         * @param string $folder Folder were to move the file. Ex: "uploads"
         * @param string $new_name (optional) Replace the actual file name. Do NOT include file's extension (ex: "my_image")
         * 
         * @return string Uploaded file path
         */
        public function moveTo(string $folder, string $new_name = null)
        {
            if(!$this->isValid()) return false;

            if(!is_dir($folder))
            {
                throw new Exception("Folder '$folder' doesn't exist.");
                return false;
            }

            if(!is_writable($folder))
            {
                throw new Exception("Folder '$folder' doesn't have writing permissions.");
                return false;
            }

            // for security
            $file_name = basename($this->name);

            if($new_name != null)
            {
                $file_separator = explode(".", $this->name);
                $extension = end($file_separator);
                $file_name = $new_name . '.' . $extension;
            }

            $target = $folder . "/" . $file_name;

            $success = move_uploaded_file($this->tmp_name, $target);

            if(!$success) return false;

            return $target;
        }

        /**
         * Indicate if upload was a success
         * 
         * @return bool
         */
        public function isValid()
        {
            return $this->error == UPLOAD_ERR_OK;
        }

        /**
         * Return error message
         * 
         * @return string|null
         */
        public function getError()
        {
            if ($this->error == UPLOAD_ERR_OK) return null;

            $messages = [
                UPLOAD_ERR_OK => 'There is no error, the file uploaded with success',
                UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
                UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
                UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded',
                UPLOAD_ERR_NO_FILE => 'No file was uploaded',
                UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder',
                UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
                UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload.',
                $this::UPLOAD_TYPE_ERROR => 'Type incorrect',
            ];

            return $messages[$this->error];
        }
    }

?>