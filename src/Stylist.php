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

    function save()
       {
           $GLOBALS['DB']->exec("INSERT INTO stylists (stylistName) VALUES ('{$this->getName()}')");
           $this->id = $GLOBALS['DB']->lastInsertId();
       }



    static function getAll()
       {
           $returned_stylist = $GLOBALS['DB']->query("SELECT * FROM stylists;");
           $stylists = array();
           foreach($returned_stylist as $stylist){
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

  }

?>
