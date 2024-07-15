<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public $fromEmail  = 'email@example.com';
    public $fromName   = 'Your Name';
    public $recipients = '';

    public $protocol   = 'smtp';
    public $SMTPHost   = 'smtp.example.com';  // Alamat SMTP server Anda
    public $SMTPUser   = 'your-email@example.com';  // Email SMTP Anda
    public $SMTPPass   = 'your-email-password';  // Password SMTP Anda
    public $SMTPPort   = 587;  // Port SMTP Anda
    public $SMTPCrypto = 'tls';

    public $mailType   = 'html';
    public $charset    = 'utf-8';
    public $newline    = "\r\n";
    public $wordWrap   = true;
}
