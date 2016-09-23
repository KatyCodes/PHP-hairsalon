<?php
  class Client {

    private $id;
    private $stylist_id;
    private $name;

    function __construct($id, $stylist_id, $name){
      $this->id = $id;
      $this->stylist_id = $stylist_id;
      $this->name = $name;
    }

    function getId()
    {
      return $this->id;
    }

    function getStylistId()
    {
      return $this->stylist_id;
    }

    function getName()
    {
      return $this->name;
    }

    function setName($name)
    {
      $this->name = (string) $name;
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO clients (stylist_id, clientName) VALUES ({$this->getStylistId()}, '{$this->getName()}');");
        $this->id = $GLOBALS['DB']->lastInsertId();
    }

    static function findStylist($search_id)
    {
      $found_stylist = null;
            $stylists = Stylist::getAll();
            foreach($stylists as $stylist){
                $stylist_id = $stylist->getId();
                if($stylist_id == $search_id){
                    $found_stylist = $stylist;
                }
            }
          return $found_stylist;
    }

    static function getAll()
    {
      $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach($returned_clients as $client){
                $id = $client['id'];
                $stylist_id = $client['stylist_id'];
                $name = $client['clientName'];
                $new_client = New Client($id, $stylist_id, $name);
                array_push($clients, $new_client);
            }
            return $clients;
    }

    static function deleteAll()
       {
           $GLOBALS['DB']->exec("DELETE FROM clients;");
       }




  }
?>
