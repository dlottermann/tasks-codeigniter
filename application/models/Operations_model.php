<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operations_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }
      

 #categories
 public function getCategorias()
 {
   
     return $this->db->get('category')->result();
 }



 public function getCategoria($codigo)
 {
     return $this->db->where('id', $codigo)->get('category')->result();
 }

 public function setCategoria($data)
 {
     return $this->db->insert('category', $data);
 }

 public function updateCategoria($data)
 {
     return $this->db->where('id', $data['id'])->update('category', $data);
 }

 public function deleteCategoria($codigo)
    {
       return $this->db->where('id', $codigo)->delete('category');
    }


 public function inativaCategoria($codigo)
 {
    $sql = "UPDATE category
            SET
            status = CASE
            WHEN status = 0 THEN 1
            ELSE 0
            END where id = {$codigo}";

    return $this->db->query($sql);
    
 }

#end Categories

#Tasks

#emd Tasks


}