<?php

    /**
     * @backupGlobals disabled
     * @backupStaticAttributes disabled
     */
     require_once "src/Stylist.php";
    //  require_once "src/Client.php";
     $server = 'mysql:host=localhost;dbname=hair_salon_test';
     $username = 'root';
     $password = 'root';
     $DB = new PDO($server, $username, $password);

   class StylistTest extends PHPUnit_Framework_TestCase
   {
      function test_getId()
      {
        //arrange
        $id = 1;
        $stylistName = "Stacy";
        $stylist = new Stylist($id, $stylistName);

        //act
        $result = $stylist->getID();

        //assert
        $this->assertEquals($id, $result);
      }

   }

 ?>
