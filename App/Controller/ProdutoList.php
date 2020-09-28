<?php

use CoffeeCode\Cropper\Cropper;
use Library\Control\Page;
use Library\Database\Criteria;
use Library\Database\Repository;
use Library\Database\Transaction;

class ProdutoList extends Page
{

    public function __construct() 
    {
        parent::__construct();
        $this->template = $this->twig->load('produto-list.html');
    }

    public function home()
    {
        $data = array();
        try {            
            Transaction::open('self_menu');
            $repository = new Repository('Produto');
            $criteria = new Criteria();
            $criteria->setProperty('order', 'id desc');
            $objects = $repository->load($criteria);
            
            if ($objects) {
                $cropper = new Cropper("App/Include/images/cache");
                foreach ($objects as $obj) {
                    $url = str_replace('http://localhost/arq-sis-projeto01/', '', $obj->url_image);  
                    $obj->url = $cropper->make($url, 200, 200);
                    $products[] = $obj;                
                  }
                  $data = ["products" => $products];
            }

            echo $this->template->render($data);            
            Transaction::close();

        } catch (\Exception $e) {
            Transaction::rollback();
            echo json_encode(["status" => "error", "data" => message($e->getMessage(),'danger',true)]);
        }        
    }

    public function delete($param)
    {
        $response = new stdClass;
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

            echo json_encode($response->status = "success");
            return;
            
        } catch (\Exception $e) {
            Transaction::rollback();
            echo json_encode(["status" => "error", "data" => message($e->getMessage(),'danger',true)]);
        }
    }

}