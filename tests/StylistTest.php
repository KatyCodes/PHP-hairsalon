<?php

    /**
     * @backupGlobals disabled
     * @backupStaticAttributes disabled
     */
     require_once "src/Stylist.php";
     require_once "src/Client.php";
     $server = 'mysql:host=localhost;dbname=hair_salon_test';
     $username = 'root';
     $password = 'root';
     $DB = new PDO($server, $username, $password);

  //  class StylistTest extends PHPUnit_Framework_TestCase
  //  {
   //
  //    protected function tearDown()
  //       {
  //         Stylist::deleteAll();
  //          Client::deleteAll();
      //  }
      //
      // function test_getId()
      // {
      //     //arrange
      //     $stylist_name = "Stacy";
      //     $stylist = new Stylist($id=null, $stylist_name);
      //
      //     //act
      //     $result = $stylist->getID();
      //
      //     //assert
      //     $this->assertEquals($id, $result);
      // }
      //
      // function test_getName()
      // {
      //     //arrange
      //     $id = null;
      //     $stylist_name = "Stacy";
      //     $stylist = new Stylist($id=null, $stylist_name);
      //
      //     //act
      //     $result = $stylist->getName();
      //
      //     //assert
      //     $this->assertEquals("$stylist_name", $result);
      // }
      //
      // function test_save()
      // {
      //     //arrange
      //     $id = null;
      //     $stylist_name = "Stacy";
      //     $test_stylist = new Stylist($id=null, $stylist_name);
      //     $test_stylist->save();
      //
      //     //act
      //     $result = Stylist::getAll();
      //     // var_dump($stylist);
      //
      //
      //     //assert
      //     $this->assertEquals($test_stylist, $result[0]);
      // }
      //
      // function test_getAll()
      //   {
      //     //arrange
      //
      //     $stylist_name = "Stacy";
      //     $test_stylist = new Stylist($id=null, $stylist_name);
      //     $test_stylist->save();
      //
      //
      //     $stylist_name_two = "Stacy";
      //     $test_stylist_two = new Stylist($id=null, $stylist_name_two);
      //     $test_stylist_two->save();
      //     //act
      //
      //     $result = Stylist::getAll();
      //
      //     //assert
      //
      //     $this->assertEquals([$test_stylist, $test_stylist_two], $result);
      //   }
      //
      //   function test_deleteAll()
      //   {
      //     //arrange
      //     $stylist_name = "Stacy";
      //     $test_stylist = new Stylist($id=null, $stylist_name);
      //     $test_stylist->save();
      //
      //
      //     $stylist_name_two = "Stacy";
      //     $test_stylist_two = new Stylist($id=null, $stylist_name_two);
      //     $test_stylist_two->save();
      //     //act
      //
      //     $result = Stylist::deleteAll();
      //
      //     //assert
      //
      //     $result = Stylist::getAll();
      //     $this->assertEquals([], $result);
      //   }
      //
      //   function test_find()
      //   {
      //     //arrange
      //     $stylist_name = "Stacy";
      //     $test_stylist = new Stylist($id=null, $stylist_name);
      //     $test_stylist->save();
      //
      //
      //     $stylist_name_two = "Stacy";
      //     $test_stylist_two = new Stylist($id=null, $stylist_name_two);
      //     $test_stylist_two->save();
      //
      //     //act
      //     $result = Stylist::find($test_stylist->getId());
      //
      //     //assert
      //     $this->assertEquals($test_stylist, $result);
      //   }
      //
      //   function test_new_stylist_name()
      //   {
      //     //arrange
      //     $stylist_name = "Stacy";
      //     $test_stylist = new Stylist($id=null, $stylist_name);
      //     $test_stylist->save();
      //
      //
      //     $stylist_name_new = "Amy";
      //
      //
      //     //act
      //     $test_stylist->update($stylist_name_new);
      //
      //     //assert
      //     $this->assertEquals($stylist_name_new, $test_stylist->getName());
      //   }
      //
      //   function test_deleteStylist()
      //   {
      //     //arrange
      //     $stylist_name = "Stacy";
      //     $test_stylist = new Stylist($id=null, $stylist_name);
      //     $test_stylist->save();
      //
      //     $stylist_name_two = "Amy";
      //     $test_stylist_two = new Stylist($id=null, $stylist_name_two);
      //     $test_stylist_two->save();
      //
      //
      //     //act
      //     $test_stylist->delete();
      //
      //     //assert
      //     $this->assertEquals([$test_stylist_two], Stylist::getAll());
      //   }
    //}

 ?>
