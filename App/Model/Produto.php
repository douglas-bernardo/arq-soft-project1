<?php
namespace App\Model;

use App\Controller\ControleEstoque;
use Library\Database\Record;
use Library\Support\EmailObserver;
use Library\Support\TelegramObserver;

class Produto extends Record
{
    const TABLENAME = 'produto';

    public function get_categoria(): string
    {
        return (new Categoria($this->categoria_id))->descricao;
    }

    /**
     * Deve ser chamado após o método store
     *
     * @return void
     */
    public function atualizaEstoque(): void
    {
        $estoque = new ControleEstoque;
        $estoque->addObserver(new EmailObserver);
        $estoque->addObserver(new TelegramObserver);
        $estoque->atualizaEstoqueProduto($this);
    }
}