<?php

use Library\Control\Page;
use Library\Database\Criteria;
use Library\Database\Repository;
use Library\Database\Transaction;

class CategoriaList extends Page
{

    public function __construct() 
    {
        parent::__construct();
        $this->template = $this->twig->load('categoria-list.html');
    }

    public function home()
    {
        $data = array();
        try {
            Transaction::open('self_menu');

            $repository = new Repository('Categoria');
            $criteria = new Criteria();
            $criteria->setProperty('order', 'id desc');
            $objects = $repository->load($criteria);
            $data = ['categories' => $objects];

            echo $this->template->render($data);
        } catch (\Exception $e) {
            Transaction::rollback();
            echo json_encode(["status" => "error", "data" => message($e->getMessage(),'danger',true)]);
        }        
    }

    public function create($data): void
    {
        $response = new stdClass;
        try {
            $catData = filter_var_array($data, FILTER_SANITIZE_STRING);

            if (in_array("", $catData)) {
                $response->status = 'error';
                $response->data = message(
                    'Preencha os campos para criar uma nova categoria', 'danger', true
                );
                echo json_encode($response);
                return;
            }
            
            Transaction::open('self_menu');

            $categoria = new Categoria();
            $categoria->fromArray($catData);
            $categoria->store();

            Transaction::close();

            $response->status = 'success';
            $response->message = message('Categoria criada com sucesso!', 'success', true);
            $response->data = $this->twig->load('categoria.html')->render( ['category' => $categoria] );
            echo json_encode($response);

        } catch (\Exception $e) {
            Transaction::rollback();
            echo json_encode(["status" => "error", "data" => message($e->getMessage(),'danger',true)]);
        }
    }

}