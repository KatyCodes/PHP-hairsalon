<?php
  class Stylist
  {
    private $id;
    private $stylist_name;

    function __construct($id = null, $stylist_name)
    {
        $this->id = $id;
        $this->stylist_name = $stylist_name;
    }

    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->stylist_name;
    }

    function setName($stylist_name)
    {
        $this->stylist_name = (string) $stylist_name;
    }

    function update($new_stylist_name)
    {
      $GLOBALS['DB']->exec("UPDATE stylists SET stylist_name = '{$new_stylist_name}' WHERE id = {$this->getId()};");
            $this->setName($new_stylist_name);
    }

    function delete()
    {
      $GLOBALS['DB']->exec("DELETE FROM stylists WHERE id = {$this->getId()};");
      $GLOBALS['DB']->exec("DELETE FROM clients WHERE stylist_id = {$this->getId()};");
    }

    function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stylists (stylist_n ame) VALUES ('{$this->getName()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }


    function getClients()
       {
           $clients = array();
           $returned_client = $GLOBALS['DB']->query("SELECT * FROM clients WHERE stylist_id = {$this->getId()};");
           foreach($returned_client as $client){
               $id = $client['id'];
               $stylist_id = $client['stylist_id'];
               $name = $client['clientName'];
               $new_client = new Client($id, $stylist_id, $name);
               array_push($clients, $new_client);
           }
           return $clients;
       }

    static function getAll()
     {
         $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
         $stylists = array();
         foreach($returned_stylists as $stylist){
             $id = $stylist['id'];
             $stylist_name = $stylist['stylist_name'];
             $new_stylist = new Stylist($id, $stylist_name);
             array_push($stylists, $new_stylist);
         }

         return $stylists;
     }

    static function deleteAll()
      {
          $GLOBALS['DB']->exec("DELETE FROM stylists;");
      }

    static function find($search_id)
      {
          $found_stylist = null;
          $stylists = Stylist::getAll();
            foreach($stylists as $stylist){
                $stylist_id = $stylist->getId();
              if ($stylist_id == $search_id){
                $found_stylist = $stylist;
              }
            }
          return $found_stylist;
      }


  }
?>
