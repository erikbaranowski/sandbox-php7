<?php

require __DIR__ . "/../vendor/autoload.php";
use Aws\S3\S3Client;

// Initialize an instance of a library class to prove that composer is working as well as the autoload.
$s3Client = new S3Client([
    'version' => 'latest',
    'region'  => 'us-east-1'
]);

phpinfo();

?>