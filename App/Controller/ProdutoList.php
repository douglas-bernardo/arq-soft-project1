<?php
namespace App\Controller;

use App\Model\Produto;
use CoffeeCode\Cropper\Cropper;
use Library\Control\Page;
use Library\Database\Criteria;
use Library\Database\Repository;
use Library\Database\Transaction;

/**
 * Implementação classe controller
 * High Cohesion - Divisão conforme responsabilidade
 *               - uso de demais classes para completar suas atividades
 *               - Poucos métodos
 */
class ProdutoList extends Page
{

    public function __construct() 
    {
        parent::__construct();
        $this->template = $this->twig->load('produto-list.html');
    }

    /**
     * Lista os produtos cadastrados no sistema
     *
     * @return void
     */
    public function index(): void
    {
        $data = array();
        try {

            /**
             * Information Expert
             * aciona a classe responsável por recuperar objetos da classe Produto:
             */
            Transaction::open('self_menu');
            $repository = new Repository(Produto::class);
            $criteria = new Criteria();
            $criteria->setProperty('order', 'id desc');
            $objects = $repository->load($criteria);
            
            /**
             * Miniaturas
             */
            $products = $this->makeThumbnail($objects);
            $data = ["products" => $products, 'title' => 'Produtos'];

            /**
             * envia os dados para a camada de visão:
             */
            echo $this->template->render($data);            
            Transaction::close();

        } catch (\Exception $e) {
            Transaction::rollback();
            echo json_encode(["status" => "error", "data" => message("erro: " . $e->getMessage(),'danger',true)]);
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
            /**
             * validações da GUI
             */
            if (empty($param['id'])) {
                return;
            }
            $id = filter_var($param['id'], FILTER_VALIDATE_INT);

            /**
             * aciona a classe responsável por recuperar um registro do bd e 
             * realiza a exclusão
             */
            Transaction::open('self_menu');            
            $item = Produto::find($id);
            if ($item) {
                $item->delete();
            }            
            Transaction::close();

            /**
             * envia a confirmação para a camada de visão:
             */
            echo json_encode(['status' => 'success']);
            return;
            
        } catch (\Exception $e) {
            Transaction::rollback();
            echo json_encode(["status" => "error", "data" => message($e->getMessage(),'danger',true)]);
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