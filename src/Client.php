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

  }
?>
