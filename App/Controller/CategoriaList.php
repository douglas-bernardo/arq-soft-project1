<?php

namespace App\Controller;

use App\Model\Categoria;
use Library\Control\Page;
use Library\Database\Criteria;
use Library\Database\Repository;
use Library\Annotation\Transactional;

class CategoriaList extends Page
{

    public function __construct()
    {
        parent::__construct();
        $this->template = $this->twig->load('categoria-list.html');
    }

    /**
     * @Transactional
     *
     * @return void
     */
    public function index()
    {
        $data = array();
        $repository = new Repository(Categoria::class);
        $criteria = new Criteria();
        $criteria->setProperty('order', 'id desc');
        $objects = $repository->load($criteria);
        $data = ['categories' => $objects, 'title' => 'Categorias'];
        echo $this->template->render($data);
    }

    /**
     * @Transactional
     *
     * @param array $data
     * @return void
     */
    public function create(array $data): void
    {
        $response = new \stdClass;
        $catData = filter_var_array($data, FILTER_SANITIZE_STRING);
        if (in_array("", $catData)) {
            $response->status = 'error';
            $response->data = message(
                'Preencha os campos para criar uma nova categoria',
                'danger',
                true
            );
            echo json_encode($response);
            return;
        }
        $categoria = new Categoria();
        $categoria->fromArray($catData);
        $categoria->store();
        $response->status = 'success';
        $response->message = message('Categoria criada com sucesso!', 'success', true);
        $response->data = $this->twig->load('categoria.html')->render(['category' => $categoria]);
        echo json_encode($response);
    }


    /**
     * @Transactional
     *
     * @param array $param
     * @return void
     */
    public function changeStatus(array $param): void
    {
        if (empty($param['id'])) {
            return;
        }
        $id = filter_var($param['id'], FILTER_VALIDATE_INT);
        $status = filter_var($param['status'], FILTER_VALIDATE_BOOLEAN);

        $item = Categoria::find($id);

        if ($item) {
            $item->ativo = $status ? "1" : "0";
            $item->store();
        }
        echo json_encode(['status' => 'success', 'data' => $item->toArray()]);
    }
}
