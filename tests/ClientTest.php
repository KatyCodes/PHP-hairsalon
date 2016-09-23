<?php

/**
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
 require_once "src/Client.php";

 $server = 'mysql:host=localhost;dbname=hair_salon_test';
 $username = 'root';
 $password = 'root';
 $DB = new PDO($server, $username, $password);
 class ClientTest extends PHPUnit_Framework_TestCase
 {

   function test_getId()
   {
       //arrange
       $stylist_id = null;
       $name = "Katy";
       $test_client = new Client($id=null, $stylist_id, $name);

       //act
       $result = $test_client->getID();

       //assert
       $this->assertEquals($id, $result);
   }

 }
?>
