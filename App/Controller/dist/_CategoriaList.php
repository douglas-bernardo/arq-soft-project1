<?php

namespace App\Controller;

use App\Model\Categoria;
use Library\Control\Page;
use Library\Database\Criteria;
use Library\Database\Repository;
use Library\Database\Transaction;
use Library\Log\Log;
use Monolog\Handler\StreamHandler;

class CategoriaList extends Page
{

    private Log $logger;

    public function __construct()
    {
        parent::__construct();
        $this->template = $this->twig->load('categoria-list.html');
        $this->logger = new Log('category');
        $this->logger->addHandler(new StreamHandler('App/Tmp/logs/category.log', $this->logger::DEBUG));
    }

    public function index()
    {
        $data = array();
        try {

            Transaction::open('self_menu');

            $repository = new Repository('App\Model\Categoria');
            $criteria = new Criteria();
            $criteria->setProperty('order', 'id desc');
            $objects = $repository->load($criteria);
            $data = ['categories' => $objects, 'title' => 'Categorias'];
            echo $this->template->render($data);

            Transaction::close();

        } catch (\Exception $e) {
            Transaction::rollback();
            $this->logger->info('Error: ' . $e->getMessage(), ['class' => get_class($this), 'method' => explode('::', __METHOD__)[1]]);
            echo json_encode(["status" => "error", "data" => message('Algo deu errado :(', 'danger', true)]);
        }
    }

    public function create($data): void
    {

        try {

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

            Transaction::open('self_menu');

            $categoria = new Categoria();
            $categoria->fromArray($catData);
            $categoria->fake_field = 'anything';
            $categoria->store();

            Transaction::close();

            $response->status = 'success';
            $response->message = message('Categoria criada com sucesso!', 'success', true);
            $response->data = $this->twig->load('categoria.html')->render(['category' => $categoria]);
            echo json_encode($response);
        } catch (\Exception $e) {
            Transaction::rollback();
            $this->logger->info('Error: ' . $e->getMessage(), ['class' => get_class($this), 'method' => explode('::', __METHOD__)[1]]);
            echo json_encode(["status" => "error", "data" => message('Algo deu errado :(', 'danger', true)]);
        }
    }

    public function changeStatus(array $param)
    {

        try {

            if (empty($param['id'])) {
                return;
            }
            $id = filter_var($param['id'], FILTER_VALIDATE_INT);
            $status = filter_var($param['status'], FILTER_VALIDATE_BOOLEAN);

            Transaction::open('self_menu');

            $item = Categoria::find($id);

            if ($item) {
                $item->ativo = $status ? "1" : "0";
                $item->fake_field = 'anything';
                $item->store();
            }

            Transaction::close();

            echo json_encode(['status' => 'success', 'data' => $item->toArray()]);
            
        } catch (\Exception $e) {
            Transaction::rollback();
            $this->logger->info('Error: ' . $e->getMessage(), ['class' => get_class($this), 'method' => explode('::', __METHOD__)[1]]);
            echo json_encode(["status" => "error", "data" => message('Algo deu errado :(', 'danger', true)]);
        }
    }
}
