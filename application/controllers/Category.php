<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
 
        $this->load->model('operations_model');
        $this->template->title="Categorias";
    }

    public function index()
  {
        $dados['categorias'] = $this->operations_model->getCategorias();
        $this->template->content->view('categorias_view', $dados);
        $this->template->publish();
    }

    public function getCategoria($codigo)
    {
        echo json_encode($this->operations_model->getCategoria($codigo));
        
    }


    public function setCategoria()
    {
        $form  = $this->input->post();
       
        unset($form['action']);

        if ($form['id']!=0) {
            if ($this->operations_model->updateCategoria($form)) {
                redirect('category');
            }
        } else {
            if ($this->operations_model->setCategoria($form)) {
                redirect('category');
            }
        }
    }


    public function deleteCategoria($codigo)
    {
        if ($this->operations_model->deleteCategoria($codigo)) {
            redirect('category');
        }
    }

    
    public function inativaCategoria($codigo)
    {
        if ($this->operations_model->inativaCategoria($codigo)) {
            redirect('category');
        }
    }

   

}