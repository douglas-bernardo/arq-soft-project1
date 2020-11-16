<?php

namespace App\Controller;

use App\Model\Produto;
use CoffeeCode\Cropper\Cropper;
use Library\Control\Page;
use Library\Database\Criteria;
use Library\Database\Repository;
use Library\Database\Transaction;
use Library\Log\Log;
use Monolog\Handler\StreamHandler;

/**
 * Implementação classe controller
 * High Cohesion - Divisão conforme responsabilidade
 *               - uso de demais classes para completar suas atividades
 *               - Poucos métodos
 */
class ProdutoList extends Page
{
    private Log $logger;

    public function __construct() 
    {
        parent::__construct();
        $this->template = $this->twig->load('produto-list.html');
        $this->logger = new Log('product');
        $this->logger->addHandler(new StreamHandler('App/Tmp/logs/product.log', $this->logger::DEBUG));
    }

    /**
     * Lista os produtos cadastrados no sistema
     *
     * @return void
     */
    public function index(): void
    {
        
        try {

            $data = array();

            Transaction::open('self_menu');

            $repository = new Repository(Produto::class);
            $criteria = new Criteria();
            $criteria->setProperty('order', 'id desc');
            $objects = $repository->load($criteria);
            
            $products = $this->makeThumbnail($objects);
            $data = ["products" => $products, 'title' => 'Produtos'];

            echo $this->template->render($data);

            Transaction::close();

        } catch (\Exception $e) {
            Transaction::rollback();
            $this->logger->info('Error: ' . $e->getMessage(), ['class' => get_class($this), 'method' => explode('::', __METHOD__)[1]]);
            echo json_encode(["status" => "error", "data" => message('Algo deu errado :(', 'danger', true)]);
        }        
    }

    /**
     * Deleta um produto da base
     *
     * @param [mixed] $param
     * @return void
     */
    public function delete($param): void
    {

        try {

            if (empty($param['id'])) {
                return;
            }
            $id = filter_var($param['id'], FILTER_VALIDATE_INT);

            Transaction::open('self_menu');    

            $item = Produto::find($id);
            if ($item) {
                $item->delete();
            }    

            Transaction::close();

            echo json_encode(['status' => 'success']);
            return;
            
        } catch (\Exception $e) {
            Transaction::rollback();
            $this->logger->info('Error: ' . $e->getMessage(), ['class' => get_class($this), 'method' => explode('::', __METHOD__)[1]]);
            echo json_encode(["status" => "error", "data" => message('Algo deu errado :(', 'danger', true)]);
        }
    }

    private function makeThumbnail(array $objects): array
    {
        $array = array();
        if ($objects) {
            $cropper = new Cropper("App/Include/images/cache");
            foreach ($objects as $obj) {
                $url = str_replace(BASE_URL.'/', '', $obj->url_image);
                $obj->url = $cropper->make($url, 200, 200);
                $array[] = $obj;                
              }              
        }
        return $array;
    }

}