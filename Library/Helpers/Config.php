<?php

define('BASE_URL', 'http://localhost/arq-sis-projeto01');

/**
 * @param string $uri
 * @return string
 */
function url(string $uri = null): string
{
    if ($uri) {
        return BASE_URL . '/$uri';
    }
    return BASE_URL;
}

/**
 * Esse helper segue o padrão bootstrap de alertas
 * no parâmetro $type seguir as classes de acordo com a documentação:
 * https://getbootstrap.com/docs/4.5/components/alerts/
 *
 * @param string $message
 * @param string $type
 * @return string
 * @example $message = message("This is a alert message", "primary", true)
 */
function message(string $message, string $type = "info", bool $closable = false): string
{
    $close  = "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
    $close .= "<span aria-hidden='true'>&times;</span></button>";
    return "<div class='alert alert-{$type}' alert-dismissible fade show role='alert'>{$message}" . ( $closable ? $close : '') . "</div>";
}

/**
 * SMTP Conf
 */

 define('CONF_SMTP_MAIL_SB', [
     'host' => 'smtp.sendgrid.net',
     'port' => '587',
     'user' => 'apikey',
     'pass' => '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',
     'from_name' => 'Suporte Self Menu',
     'from_email' => 'jkdouglas21@gmail.com'
 ]);

 define('CONF_SMTP_MAIL_AWS', [
    'host' => 'smtp.gmail.com',
    'port' => '587',
    'user' => 'jacksondouglas@edu.unifor.br',
    'pass' => '87140368',
    'from_name' => 'Suporte Self Menu',
    'from_email' => 'jacksondouglas@edu.unifor.br'
]);