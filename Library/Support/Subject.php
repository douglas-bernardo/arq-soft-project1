<?php

namespace Library\Support;

interface Subject
{
    public function addObserver(Observer $observer);
    public function removeObserver(Observer $observer);
    public function notificarObserver(array $data);
}