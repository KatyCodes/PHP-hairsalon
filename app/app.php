<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";
    require_once __DIR__."/../src/Client.php";

    $app = new Silex\Application();

      use Symfony\Component\Debug\Debug;
      Debug::enable();
      $app = new Silex\Application();
      $app['debug'] = true;

      $server = 'mysql:host=localhost;dbname=hair_salon';
      $username = 'root';
      $password = 'root';
      $DB = new PDO($server, $username, $password);
      $app->register(new Silex\Provider\TwigServiceProvider(), array(
      'twig.path' => __DIR__.'/../views'
      ));

      //for CRUD functionality
         use Symfony\Component\HttpFoundation\Request;
         Request::enableHttpMethodParameterOverride();

        //homepage
     $app->get("/", function() use ($app) {
         return $app['twig']->render('index.html.twig', array('stylists' =>  Stylist::getAll()));
     });

     //add a stylist on home page
     $app->post("/addStylist", function() use ($app) {
         $stylist = new Stylist($id= null, $_POST['stylist']);
         $stylist->save();
         var_dump($stylist);
         return $app['twig']->render('index.html.twig', array('stylists' =>  Stylist::getAll()));
     });

     //delete stylist
     $app->post("/deleteAllStylist", function() use ($app) {
        Stylist::deleteAll();
        return $app['twig']->render('index.html.twig', array('stylist' =>  Stylist::getAll()));
    });

    $app->get("/updateStylist{id}", function($id) use ($app) {
          $stylist = Stylist::find($id);
          return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });

    $app->post("/addClient", function() use ($app){
       $clientname = $_POST['clientName'];
       $stylist_id = $_POST['stylist_id'];
       $client = new Client($id= null, $stylist_id, $clientname);
       $client ->save();
       $stylist = Stylist::find($stylist_id);
       return $app['twig']->render('client.html.twig', array('stylist' => $stylist, 'client' => $client));
      });

      $app->get("/getClient/{id}", function($id) use ($app){
          $client = Client::find($id);
          return $app['twig']->render('client.html.twig', array('client' => $client));
      });

      $app->patch("/updatedClient{id}", function ($id) use ($app){
      $name = $_POST['clientName'];
      $client = Client::find($id);
      $client-> update($name);
      return $app['twig']->render('client.html.twig', array('client' => $client));
  });

    $app->patch("/updatedStylist{id}", function ($id) use ($app){
    $name = $_POST['name'];
    $client = Client::find($id);
    $stylist = Stylist::find($id);
    $stylist-> update($name);
    return $app['twig']->render('index.html.twig', array('client' => $client, 'stylists' => Stylist::getAll()));
  });

      $app->delete("/confirmDeleteStylist/{id}", function ($id) use ($app){
      $stylist = Stylist::find($id);
      $stylist->delete();
      return $app['twig']->render('index.html.twig',  array('stylists' => Stylist::getAll()));
    });

    $app->delete("/confirmDeleteclient/{id}", function ($id) use ($app){
    $client = Client::find($id);
    $client->delete();
    return $app['twig']->render('index.html.twig',  array('stylists' => Stylist::getAll()));
  });
    return $app;
?>
