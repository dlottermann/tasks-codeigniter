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

 public function getCategoriasAtivas()
 {
            $this->db->where('status', 1);
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

public function getTasks()
 {

            $this->db->select('t.*, c.description as cat_description, c.id as cat_id');
            $this->db->join('category as c','t.category_id = c.id');
     return $this->db->get('task as t')->result();
 }



 public function getTask($codigo)
 {
                    $this->db->select('t.*, c.description as cat_description, c.id as cat_id');
                    $this->db->join('category as c','t.category_id = c.id');
     return $this->db->where('t.id', $codigo)->get('task as t')->result();
 }

 public function setTask($data)
 {
     return $this->db->insert('task', $data);
 }

    public function updateTask($data)
    {
        return $this->db->where('id', $data['id'])->update('task', $data);
    }

    public function deleteTask($codigo)
    {
       return $this->db->where('id', $codigo)->delete('task');
    }

    public function inativaTask($codigo)
    {
       $sql = "UPDATE task
               SET
               status = CASE
               WHEN status = 0 THEN 1
               ELSE 0
               END where id = {$codigo}";
   
       return $this->db->query($sql);
       
    }

#end Tasks


}