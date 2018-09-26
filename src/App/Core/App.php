<?php
namespace App\Core;

use App\Core\Router;

// ------------------------------ THE WRAPPER -------------------------------------------

/**
 *       remember $this->  refers to its self the class App
 *       so does self::   and    App::   they to references to itself
 */
class App extends Functions
{
    public function __construct()
    {
        parent::__construct();
        self::init();
		self::autoload();
        self::router();
    }

    private static function init()
    {
      // MAKE SHORE THAT THE FILENAMES ARE SPELLED CORRECTLY
      //config.php is not the same as Config.php
      //Classes are with capital letter Config


      //      Load configuration file
      //no globals allowed by hosting company
      //$GLOBALS['config'] = include PATH_CONFIG . "config.php";
      require PATH_CONFIG . "Config.php";

      //      Load core classes
      require PATH_CORE . "Router.php";
      require PATH_CORE . "Database.php";
      require PATH_CORE . "Controller.php";
      require PATH_CORE . "Model.php";
      require PATH_CORE . "View.php";
      require PATH_CORE . "Session.php";

    }

    private static function autoload()
    {
      //AUTOLOADER WITH CUSTOM LOAD METHOD
      spl_autoload_register(function ($class)
      {
        // echo '<br> Within autoloader class = '.$class;

          $fileName  = '';
          $namespace = '';
          $parentDir = '';

          $class = ltrim($class, '\\');
          $lastNsPos = strrpos($class, '\\');
          $namespace = substr($class, 0, $lastNsPos);
          $class = substr($class, $lastNsPos + 1);

          $lastNsPos = strrpos($namespace, '\\');
          $parentDir = substr($namespace, $lastNsPos + 1);

          $fileName  = str_replace("\\", "/", $namespace) .'/';
          $fileName .= str_replace('_', DS, $class) . '.php';

          //echo 'class : '.$class.'<br> namespace : '.$namespace.'<br> filename : '.$fileName.'<br>';

          switch ($parentDir)
          {
              case 'Controllers':
                  $file = PATH_CONTROLLER . $class . ".php";
                  if ( is_readable( $file ) ) require $file;
                  break;
              case 'Admin':
                  $file = PATH_CONTROLLER_ADMIN . $class . ".php";
                  if ( is_readable( $file ) ) require $file;
                  break;
              case 'Dev' :
                  $file = PATH_CONTROLLER_DEV . $class . ".php";
                  if ( is_readable( $file ) ) require $file;
                  break;
              case 'Libs' :
                   $file = PATH_LIBS . $class . ".php";
                  if ( is_readable( $file ) ) require $file;
                  break;
              default:
                   $file = PATH_MODELS . $class . ".php";
                  if ( is_readable( $file ) ) require $file;
                  break;
          }

      });

    }

    private static function router()
    {
        //ROUTING
        $router = new Router();

        //ADD ROUTES
        //- 1 For default urls with Namespace (backend) Admin, Dev, User (profiles)
        $router->add( '{lang}/{namespace}/{controller}/{action}' );
        //- 2 For default urls that require an id - for Login to Admin, Dev, etc...
        $router->add( '{lang}/{namespace}/{controller}/{action}/{id:\d+}');
        //- 3 For default urls that require an id and a ptitle - for blog post, edit, delete, update, etc.
        $router->add( '{lang}/{namespace}/{controller}/{action}/{id:\d+}/{ptitle}');
        //- 4 For default urls that require a name - e.g. Contact/succes/{{username}}
        $router->add( '{lang}/{namespace}/{controller}/{action}/{name}' );

        //- 5 For default urls for the frontend
        $router->add( '{lang}/{controller}/{action}' );
        //- 6 For default urls that require a name - e.g. Contact/succes/{{username}}
        $router->add( '{lang}/{controller}/{action}/{name}' );
        //- 7 For default urls that require an id and a ptitle - e.g. en/Blog/page/002541/my-first-dumass-post
        $router->add( '{lang}/{controller}/{action}/{id:\d+}/{ptitle}');

        //Backwards compatiblity, before the introduction of translation.
        //- 2 For LINKS urls already in ciculation that don't have the language selector - we give a default language => en
        $router->add( '{controller}/{action}' , ['lang' => 'en'] );
        //- 3 For BLOG urls already in circulation that don't have the language selector - we give a default language => en
        $router->add( '{controller}/{action}/{id:\d+}/{title}' , [ 'lang' => 'en', 'controller' => 'blog', 'action' => 'page' ] );

        //In case off
        //- 1 If url is emtpy this I handle with the default router, but in case off....lol...
        $router->add( '', ['lang' => 'en', 'controller' => 'Home' , 'action' => 'index'] );




        //---------------------- Router Samples ---- how to be more exact in your routing ------------------
        //$router->add( '{lang}/{controller}/{action}/{data}', ['data => $data'] );
        //$router->add( '{controller}/{action}/{name}' , [ 'controller' => 'Contact', 'action' => 'succes' ] );
        //$router->add( '{controller}/{action}/{id:\d+}/{title}' , [ 'controller' => 'BlogList', 'action' => 'index' ] );
        //$router->add( '{controller}/{action}/{id:\d+}/{title}' , [ 'controller' => 'Blog', 'action' => 'page' ] );
        // $router->add( '{namespace}/{controller}/{action}' , ['namespace' => 'Admin'] );
        // $router->add( '{namespace}/{controller}/{action}/{id:\d+}' , ['namespace' => 'Admin'] );
        // $router->add( '{namespace}/{controller}/{action}' , ['namespace' => 'Dev'] );
        //$router->add( '{controller}/{action}/{id:\d+}');
        //$router->add( '{controller}/{action}/{id:\d+}/{title}' );
        //---------------------- Router Samples ---- how to be more exact in your routing ------------------

        //PARSING URL
        $tokens = htmlspecialchars($_GET['url']);
        //var_dump($tokens);

        //DISPATCH
        $router->dispatch($tokens);

    }



} //END CLASS

