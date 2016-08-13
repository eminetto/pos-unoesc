<?php
namespace Application\Model;

class BeerTableGateway
 {
     protected $tableGateway;

     public function __construct($tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function get($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Não encontrado id $id");
         }
         return $row;
     }

     public function save(Beer $beer)
     {
         $data = array(
             'name'  => $beer->name,
             'style'  => $beer->style,
             'img'  => $beer->img,
         );

         $id = (int) $beer->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->get($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Beer não existe');
             }
         }
     }

     public function delete($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }
