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

    function getID()
    {
      return $this->id;
    }

    function getName()
    {
      return $this->stylistName;
    }

  }

?>
