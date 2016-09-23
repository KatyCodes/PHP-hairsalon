<?php

    /**
     * @backupGlobals disabled
     * @backupStaticAttributes disabled
     */
     require_once "src/Stylist.php";
     $server = 'mysql:host=localhost;dbname=hair_salon_test';
     $username = 'root';
     $password = 'root';
     $DB = new PDO($server, $username, $password);

   class StylistTest extends PHPUnit_Framework_TestCase
   {

     protected function tearDown()
        {
          Stylist::deleteAll();
        }

      function test_getId()
      {
          //arrange

          $stylistName = "Stacy";
          $stylist = new Stylist($id=null, $stylistName);

          //act
          $result = $stylist->getID();

          //assert
          $this->assertEquals($id, $result);
      }

      function test_getName()
      {
          //arrange
          $id = null;
          $stylistName = "Stacy";
          $stylist = new Stylist($id=null, $stylistName);

          //act
          $result = $stylist->getName();

          //assert
          $this->assertEquals("$stylistName", $result);
      }

      function test_save()
      {
          //arrange
          $id = null;
          $stylistName = "Stacy";
          $test_stylist = new Stylist($id=null, $stylistName);
          $test_stylist->save();

          //act
          $result = Stylist::getAll();
          // var_dump($stylist);


          //assert
          $this->assertEquals($test_stylist, $result[0]);
      }

      function test_getAll()
        {
          //arrange

          $stylistName = "Stacy";
          $test_stylist = new Stylist($id=null, $stylistName);
          $test_stylist->save();


          $stylistName_two = "Stacy";
          $test_stylist_two = new Stylist($id=null, $stylistName_two);
          $test_stylist_two->save();
          //act

          $result = Stylist::getAll();

          //assert

          $this->assertEquals([$test_stylist, $test_stylist_two], $result);
        }

        function test_deleteAll()
        {
          //arrange
          $stylistName = "Stacy";
          $test_stylist = new Stylist($id=null, $stylistName);
          $test_stylist->save();


          $stylistName_two = "Stacy";
          $test_stylist_two = new Stylist($id=null, $stylistName_two);
          $test_stylist_two->save();
          //act

          $result = Stylist::deleteAll();

          //assert

          $result = Stylist::getAll();
          $this->assertEquals([], $result);
        }

        function test_find()
        {
          //arrange
          $stylistName = "Stacy";
          $test_stylist = new Stylist($id=null, $stylistName);
          $test_stylist->save();


          $stylistName_two = "Stacy";
          $test_stylist_two = new Stylist($id=null, $stylistName_two);
          $test_stylist_two->save();

          //act
          $result = Stylist::find($test_stylist->getId());

          //assert
          $this->assertEquals($test_stylist, $result);
        }
    }

 ?>
