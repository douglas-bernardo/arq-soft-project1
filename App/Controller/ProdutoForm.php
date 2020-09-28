<?php

use CoffeeCode\Uploader\Image;
use Library\Control\Page;
use Library\Database\Transaction;

class ProdutoForm extends Page
{
    public function __construct() 
    {
        parent::__construct();
        $this->template = $this->twig->load('produto-form.html');
    }

    public function home()
    {
        try {
            Transaction::open('self_menu');
            $categories = (new Categoria())->all();
            $data = [
                "item"=>["max_size"=>"max. " . ini_get("upload_max_filesize")],
                "categories" => $categories
            
            ];
            echo $this->template->render($data);
            Transaction::close();

        } catch (\Exception $e) {
            Transaction::rollback();
            echo json_encode(["status" => "error", "data" => message($e->getMessage(),'danger',true)]);
        }        
    }

    public function create($data): void
    {
        $response = new stdClass;
        try {

            $itemData = filter_var_array($data, FILTER_SANITIZE_STRING);

            if (in_array("", $itemData)) {
                $response->status = 'error';
                $response->data = message(
                    'Preencha os campos para criar um item', 'danger', true
                );
                echo json_encode($response);
                return;
            }
            
            // file image validation
            $upload = new Image( __DIR__ . "/../Storage", "images");
            $files = $_FILES;
            if (!empty($files['image'])) {
                $file = $files['image'];

                if ( empty($file["type"]) || !in_array($file["type"], $upload::isAllowed())) {
                    $response->status = 'error';
                    $response->data = message('Informe uma imagem válida!', "warning", true);
                    echo json_encode($response);
                    return;
                } else {
                    $uploaded = $upload->upload($file, pathinfo($file['name'], PATHINFO_FILENAME), 350);
                    $pathImage = str_replace('/var/www/arq-sis-projeto01', BASE_URL, $uploaded);
                }                
            }
            
            Transaction::open('self_menu');

            $item = new Produto();
            $item->fromArray($itemData);
            $item->url_image = isset($pathImage) ? $pathImage : $item->url_image;
            $item->store();

            Transaction::close();

            $response->status = 'success';
            $response->data = message('Item salvo com sucesso', 'success', true);
            echo json_encode($response);

        } catch (\Exception $e) {
            Transaction::rollback();
            echo json_encode(["status" => "error", "data" => message($e->getMessage(),'danger',true)]);
        }
    }

    public function update($param)
    {
        $data = array();
        try {
            if (isset($param['id'])) {
                
                Transaction::open('self_menu');
                $item = Produto::find($param['id']);            
                if ($item) {
                    $data["item"] = $item->toArray();
                }
                Transaction::close();
                $data["item"]["max_size"] = "max. " . ini_get("upload_max_filesize");
                echo $this->template->render($data);
            }
        } catch (\Exception $e) {
            Transaction::rollback();
            echo json_encode(["status" => "error", "data" => $e->getMessage()]);
        }
    }

}