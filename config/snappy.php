<?php

return array(
    'pdf' => array(
        'enabled' => true,
        'binary' => '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf.exe"',
        'options' => [
            'enable-local-file-access' => true,
            'keep-relative-links' => true,
            'encoding' => 'utf-8',
        ],

    ),
    'image' => array(
        'enabled' => true,
        'binary' => '"C:\Program Files\wkhtmltopdf\bin\wkhtmltoimage.exe"',
        'options' => array(
            'enable-local-file-access' => true,
            'keep-relative-links' => true,
            'encoding' => 'utf-8',
        ),
    ),
);
