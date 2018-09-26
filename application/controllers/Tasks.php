<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tasks extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
 
        $this->load->model('operations_model');
        $this->template->title="Tasks";
    }

    public function index()
    {
          $dados['categorias'] = $this->operations_model->getCategoriasAtivas();
          $dados['tasks'] = $this->operations_model->getTasks();
          $this->template->content->view('tasks_view', $dados);
          $this->template->publish();
      }


      public function getTask($codigo)
      {
          echo json_encode($this->operations_model->getTask($codigo));
          
      }
  
  
      public function setTask()
      {
          $form  = $this->input->post();


          $form['created'] = dataBanco($form['created']);
          unset($form['action']);
  
          if ($form['id']!=0) {
              if ($this->operations_model->updateTask($form)) {
                  redirect('tasks');
              }
          } else {
              if ($this->operations_model->setTask($form)) {
                  redirect('tasks');
              }
          }
      }
  
  
      public function deleteTask($codigo)
      {
          if ($this->operations_model->deleteTask($codigo)) {
              redirect('tasks');
          }
      }
  
      
      public function inativaTask($codigo)
      {
          if ($this->operations_model->inativaTask($codigo)) {
              redirect('tasks');
          }
      }

}