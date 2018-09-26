<?php
namespace App\Core;

use RecursiveIteratorIterator;
use RecursiveArrayIterator;

/**
*  Base Controller
*/
abstract class Controller
{

	protected $route_params = [];

	public function __construct( $route_params = array() )
    {
		//parent::__construct();
		$this->route_params = $route_params;
	}
	public function getRouteParams()
	{
		return $this->route_params;
	}

	/**
     * Magic method called when a non-existent or inaccessible method is
     * called on an object of this class. Used to execute before and after
     * filter methods on action methods. Action methods need to be named
     * with an "Action" suffix, e.g. indexAction, showAction etc.
     *
     * @param string $name  Method name
     * @param array $args Arguments passed to the method
     *
     * @return void
     */
    public function __call($name, $args)
    {
        $method = $name . 'Action';

        if (method_exists($this, $method)) {
            if ($this->before() !== false) {
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        } else {
			 throw new \Exception("Controller.php : Method $method not found in controller : ". get_class($this) );
        }
    }

	/**
     * Before filter - called before an action method.
     *
     * @return void
     */
    protected function before() {}

    /**
     * After filter - called after an action method.
     *
     * @return void
     */
    protected function after() {}



	protected function getScVariables()
	{
		$file = PATH_LIBS .'scVariables.php';
		if ( is_readable( $file ) )
		{
			require($file);
			return $scVariables;
		}
		else
			throw new Exception("Controller.php : getScVariables : File doesn't exist : $file");
	}
	protected function getScMeta()
	{
		$file = PATH_LIBS .'scMeta.php';
		if ( is_readable( $file ) )
		{
			require($file);
			return $scMeta;
		}
		else
			throw new Exception("Controller.php : getScVariables : File doesn't exist : $file");
	}
	protected function getScImages()
	{
		$file = PATH_LIBS .'scImages.php';
		if ( is_readable( $file ) )
		{
			require($file);
			return $scImages;
		}
		else
			throw new Exception("Controller.php : getScImages : File doesn't exist : $file");
	}

	protected function getScLinks()
	{
		$file = PATH_LIBS .'scLinks.php';
		if ( is_readable( $file ) )
		{
			require($file);
			return $scLinks;
		}
		else
			throw new Exception("Controller.php : getScLinks : File doesn't exist : $file");
	}

	protected function getScLinksFooter()
	{
		$file = PATH_LIBS .'scLinks.php';
		if ( is_readable( $file ) )
		{
			require($file);
			return $scLinksFooter;
		}
		else
			throw new Exception("Controller.php : getScLinksFooter : File doesn't exist : $file");
	}


	protected function getScTest()
	{
		$file = PATH_LIBS .'scTest.php';
		if ( is_readable( $file ) )
		{
			require($file);
			return $scTest;
		}
		else
			throw new Exception("Controller.php : getScTest : File doesnt exist : $file");
	}

	public function html2text($Document) {
			$Rules = array ('@<script[^>]*?>.*?</script>@si',
											'@<[\/\!]*?[^<>]*?>@si',
											'@([\r\n])[\s]+@',
											'@&(quot|#34);@i',
											'@&(amp|#38);@i',
											'@&(lt|#60);@i',
											'@&(gt|#62);@i',
											'@&(nbsp|#160);@i',
											'@&(iexcl|#161);@i',
											'@&(cent|#162);@i',
											'@&(pound|#163);@i',
											'@&(copy|#169);@i',
											'@&(reg|#174);@i',
											'@&#(d+);@e'
							 );
			$Replace = array ('',
												'',
												'',
												'',
												'&',
												'<',
												'>',
												' ',
												chr(161),
												chr(162),
												chr(163),
												chr(169),
												chr(174),
												'chr()'
									);
		return preg_replace($Rules, $Replace, $Document);
	}


    /**
     * Before filter - called before an action method.
     *
     * @paran  string $lang  'en, nl, fr , etc'
     * @return object $trans
     */
	protected function getTranslation($lang)
	{
		//a method to access / bind the translation to a view/ Model variables
		//eg.    in the template header the title
		// en.json  en  - title = english
		// nl.json  nl  - title = nederlands

		//these translation files can be outsourced

		//these translations are for our core elements and not dynamic content...
		//like buttons, links, headers, fixed content,

		// the translation array is then sent to the view where the array is extracted into separate variables
		// which can be found in the templates.

		 $file = PATH_TRANS . $lang.'.json';
		 if ( is_readable( $file ) )
		 {
		     $data = file_get_contents($file);
		     $data = json_decode($data, TRUE);
		 	return $data;
		 } else {
             throw new Exception("Controller.php : getTranslation : File doesn't exist : $file");
         }
	}

}//END CLASS

