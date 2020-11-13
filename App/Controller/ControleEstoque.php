<?php
namespace App\Controller;

use App\Model\Produto;
use Library\Support\Observer;
use Library\Support\Subject;

class ControleEstoque implements Subject
{
    private $observers;

    public function atualizaEstoqueProduto(Produto $produto)
    {
        if($produto->qtd_estoque < 5){
            $this->notificarObserver($produto->toArray());
        }
    }

    public function addObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function removeObserver(Observer $observerRemover): bool
    {
        foreach ($this->observers as $index => $observer) {
            if ($observer === $observerRemover) {
                unset($this->observers[$index]);
                return true;
            }
        }
        return false;
    }

    public function notificarObserver(array $data)
    {
        foreach ($this->observers as $observer) {
            $observer->atualizado($data);
        }
    }
}