<?php

/*

Template Name: Mail

*/

error_reporting(-1);

ini_set('display_errors', 'On');

get_header(); 

global $wpdb;

require 'src/Mandrill.php';

 $mandrill = new Mandrill("Md2FKh_ohIv5WkqCOB-jBQ");

$message = array(
    'subject' => 'Test message',
    'from_email' => 'sebastian@igniweb.com',
    'html' => '<p>this is a test message with Mandrill\'s PHP wrapper!.</p>',
    'to' => array(array('email' => 'duqueospin94@gmail.com', 'name' => 'Recipient 1')),
    'merge' => true,
    'merge_language' => 'handlebars',
    'global_merge_vars' => array(
            array(
                'name' => 'fname',
                'content' => 'Juan Sebastian Duque'
            )
        ),
    'merge_vars' => array(array(
        'rcpt' => 'duqueospin94@gmail.com',
        'vars' =>
        array(
            array(
                'name' => 'firstname',
                'content' => 'Juan'),
            array(
                'name' => 'lastname',
                'content' => 'Duque')
    ))));

$template_name = 'quotes';

$template_content = array(
    array(
        'name' => 'firstname',
        'content' => 'Recipient name'),
    array(
        'name' => 'lastname',
        'content' => 'Last name')

);

print_r($mandrill->messages->sendTemplate($template_name, $template_content, $message));


?>