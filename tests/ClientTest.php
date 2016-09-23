<?php

  /**
   * @backupGlobals disabled
   * @backupStaticAttributes disabled
   */
   require_once "src/Client.php";
   require_once "src/Stylist.php";
   $server = 'mysql:host=localhost;dbname=hair_salon_test';
   $username = 'root';
   $password = 'root';
   $DB = new PDO($server, $username, $password);
   class ClientTest extends PHPUnit_Framework_TestCase
   {
     protected function tearDown()
           {
              Stylist::deleteAll();
              Client::deleteAll();
            }
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

     function test_getStylistId()
     {
         //arrange
         $stylist_id = 2;
         $name = "Katy";
         $test_client = new Client($id=null, $stylist_id, $name);

         //act
         $result = $test_client->getStylistId();

         //assert
         $this->assertEquals($stylist_id, $result);
     }

     function test_getName()
     {
         //arrange
         $stylist_id = 1;
         $name = "Katy";
         $test_client = new Client($id=null, $stylist_id, $name);

         //act
         $result = $test_client->getName();

         //assert
         $this->assertEquals($name, $result);
     }

     function test_Save()
       {
           //arrange
           $stylist_id = 1;
           $stylistName = "Stacy";
           $test_stylist = new Stylist($stylist_id, $stylistName);
           $test_stylist->save();

           $name = "Katy";
           $test_client = new Client($id=null, $stylist_id, $name);
           $test_client->save();


           //act
           $result = Client::getAll();


           //assert
           $this->assertEquals($test_client, $result[0]);

       }


     function test_getAll()
       {
         //arrange
         $id= 1;
         $stylist_name = "Stacy";
         $new_stylist = new Stylist($id, $stylist_name);

         $stylist_id = 1;
         $name = "Katy";
         $test_client = new Client($id=null, $stylist_id, $name);
         $test_client->save();


         $name = "Amy";
         $test_client1 = new Client($id=null, $stylist_id, $name);
         $test_client1->save();


         //act
         $result = Client::getAll();


         //assert
         $this->assertEquals([$test_client, $test_client1], $result);
       }

       function test_deleteAll()
       {
         //arrange
         $id= 1;
         $stylist_name = "Stacy";
         $new_stylist = new Stylist($id, $stylist_name);
         $new_stylist->save();

         $stylist_id = $new_stylist->getId();
         $name = "Katy";
         $test_client = new Client($id=null, $stylist_id, $name);
         $test_client->save();


         $name = "Amy";
         $test_client1 = new Client($id=null, $stylist_id, $name);
         $test_client1->save();


         //act
         $result = Client::deleteAll();
         $result = Client::getAll();


         //assert
         $this->assertEquals([], $result);
         }

       function testfindStylist()
       {
         //arrange
         $id= 1;
         $stylist_name = "Stacy";
         $new_stylist = new Stylist($id, $stylist_name);
         $new_stylist->save();


         $stylist_id = $new_stylist->getID();
         $name = "Katy";
         $test_client = new Client($id=null, $stylist_id, $name);
         $test_client->save();

         $stylist_id1 = 2;
         $name = "Amy";
         $test_client1 = new Client($id=null, $stylist_id1, $name);
         $test_client1->save();

         //act
         $result = Client::findStylist($new_stylist->getId());

         //assert
         $this->assertEquals($new_stylist, $result);
       }

       function testupdate()
       {
         //arrange
         $id= 1;
         $stylist_name = "Stacy";
         $new_stylist = new Stylist($id, $stylist_name);
         $new_stylist->save();


         $stylist_id = $new_stylist->getID();
         $name = "Katy";
         $test_client = new Client($id=null, $stylist_id, $name);
         $test_client->save();

         $new_clientName = "Candy";

         //act
         $test_client->update($new_clientName);

         //assert
         $this->assertEquals($new_clientName, $test_client->getName());
       }

   }
?>
