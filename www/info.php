<?php

require __DIR__ . "/../vendor/autoload.php";
use Aws\S3\S3Client;


$s3Client = new S3Client([
    'version' => 'latest',
    'region'  => 'us-east-1'
]);

phpinfo();

?>