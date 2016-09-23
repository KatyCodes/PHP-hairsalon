<?php
  class Stylist
  {
    private $id;
    private $stylistName;

    function __construct($id = null, $stylistName)
    {
        $this->id = $id;
        $this->stylistName = $stylistName;
    }

    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->stylistName;
    }

    function setName($stylistName)
    {
        $this->stylistName = (string) $stylistName;
    }

    function update($new_stylistName)
    {
      $GLOBALS['DB']->exec("UPDATE stylists SET stylistName = '{$new_stylistName}' WHERE id = {$this->getId()};");
            $this->setName($new_stylistName);
    }

    function delete()
    {
      $GLOBALS['DB']->exec("DELETE FROM stylists WHERE id = {$this->getId()};");
      $GLOBALS['DB']->exec("DELETE FROM clients WHERE stylist_id = {$this->getId()};");
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO stylists (stylistName) VALUES ('{$this->getName()}')");
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
             $stylistName = $stylist['stylistName'];
             $new_stylist = new Stylist($id, $stylistName);
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
