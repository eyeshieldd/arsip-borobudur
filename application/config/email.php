<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol'] = 'smtp';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['wordwrap'] = TRUE;
$config['smtp_host'] = 'smtp.mailtrap.io';
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['smtp_port'] = 2525;
$config['smtp_user'] = 'ece0002fd433a1';
$config['smtp_pass'] = '87305945e5a944';
$config['crlf'] = '\r\n';
$config['newline'] = '\r\n';

$config = [
  'protocol' => 'smtp',
  'smtp_host' => 'smtp.mailtrap.io',
  'smtp_port' => 2525,
  'smtp_user' => 'ece0002fd433a1',
  'smtp_pass' => '87305945e5a944',
  'crlf' => "\r\n",
  'newline' => "\r\n",
  'mailtype' => "html"
];