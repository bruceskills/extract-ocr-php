<?php

/**
 * @author Bruno César <bruno@agenciaskills.com.br>
 * @license https://github.com/bruceskills/ocr-extract-php/blob/master/LICENSE (MIT License)
 */

namespace OCR;

class Service
{

    public $directory_images;
    public $directory_generates;

    public function __construct()
    {
        $this->directory_generates = "../../public/generates/";
        $this->directory_images = "../../public/images/";
    }


    public function upload($file)
    {
        $file_name = $file['name'];

        $file_tmp = $file['tmp_name'];

        move_uploaded_file($file_tmp,$this->directory_images.$file_name);

        $document = self::generate($file_name);

        $data = [
            'document' => $document
        ];

        echo json_encode($data, true);


    }

    public function generate($file_name)
    {

        $filename = pathinfo($file_name, PATHINFO_FILENAME);

        shell_exec('"C:\\Program Files (x86)\\Tesseract-OCR\\tesseract" "'.$this->directory_images.''.$file_name.'" '.$this->directory_generates.''.$filename.' ');

        $generate = $filename . ".txt";

        $myfile = fopen($this->directory_generates.$generate, "r") or die("Unable to open file!");

        $content = fread($myfile,filesize($this->directory_generates.$generate));
        fclose($myfile);
        return $content;
    }



}