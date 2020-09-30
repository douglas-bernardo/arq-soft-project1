<?php

namespace Library\Support;

use Library\Log\Log;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\TelegramBotHandler;

/**
 * Pattern: Observer
 */
class TelegramObserver implements Observer
{
    function atualizado(array $data)
    {
        $this->notificacaoTelegramEstoque($data);
    }

    public function notificacaoTelegramEstoque($data)
    {
        $logger = new Log('aterta_estoque');

        $tele_key = "1327532846:AAF2gYt_joUol3SJhk8iZ8cYJaCV4I4Y0iE";
        $tele_channel = "@SuporteSelfMenu";
        $tele_handler = new TelegramBotHandler($tele_key, $tele_channel, $logger::EMERGENCY);
        $tele_handler->setFormatter(new LineFormatter("%level_name%: %message%"));
        $logger->addHandler($tele_handler);

        $logger->emergency("Produto: " . $data['nome'] . ", com estoque em baixa! | Estoque atual: " . $data['qtd_estoque']);

    }
}