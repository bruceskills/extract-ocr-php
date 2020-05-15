<?php
require "../../vendor/autoload.php";

use OCR\Service;


$service = new Service();
if (!empty($_FILES['image']))
{
    $service->upload($_FILES['image']);
}



