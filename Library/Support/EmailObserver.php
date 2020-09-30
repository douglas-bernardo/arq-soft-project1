<?php

namespace Library\Support;

/**
 * Pattern: Observer
 */
class EmailObserver implements Observer
{
    function atualizado(array $data)
    {
        $this->enviaEmailEstoque($data);
    }

    public function enviaEmailEstoque($data)
    {
        $email = new Email;

        $email->add(
            "Self Menu | Estoque Report",
            "<p>Produto: " . $data['nome'] . ", com estoque em baixa! <br> Estoque atual: " . $data['qtd_estoque'] ."</p>",
            "Equipe Self Menu",
            "jkdouglas21@gmail.com"
        )->send();        
    }
}