<?php
namespace App\Core;
/**
*  Base View
*/
class View extends Functions
{
	public function __construct()
    {
		parent::__construct();
	}

	/*
	* render the view
	* @params int 		$renderOption  (f0, f1, b0, b1) 0: noInclude, f: frontend, b: backend,
	* @params string 	$name
	* @params array 	$data
	*/
	public static function render($renderOption = 1, $name, $data = array() )
	{

		$paths = array (
			'f0' =>
				array ( 1 => PATH_VIEW . $name . '.php'),
			'f1' =>
				array ( 1 => PATH_VIEW_TMP . 'header.php',
						2 => PATH_VIEW . $name . '.php',
						3 => PATH_VIEW_TMP . 'footer.php'),
			'b0' =>
				array ( 1 =>  PATH_VIEW_ADMIN. $name . '.php'),
			'b1' =>
				array ( 1 => PATH_VIEW_TMP_ADMIN . 'header.php',
						2 => PATH_VIEW_ADMIN . $name . '.php' ,
						3 => PATH_VIEW_TMP_ADMIN . 'footer.php'),

			'd0' =>
				array ( 1 =>  PATH_VIEW_DEV. $name . '.php'),
			'd1' =>
				array ( 1 => PATH_VIEW_TMP_DEV . 'header.php',
						2 => PATH_VIEW_DEV . $name . '.php' ,
						3 => PATH_VIEW_TMP_DEV . 'footer.php'),
		);

		/*renderPage() is in the Function.php file*/
		self::renderPage($renderOption, $paths, $data );
	}

	/**
     * Render a view template using Twig
     *
     * @param string $template  The template file
     * @param array $args  Associative array of data to display in the view (optional)
     *
     * @return void
     */
    public static function renderTemplate($template, $args = [])
    {
        static $twig = null;

        if ($twig === null) {
            //$loader = new \Twig_Loader_Filesystem('../App/Views');
			$loader = new \Twig_Loader_Filesystem( PATH_VIEW );
            $twig = new \Twig_Environment($loader);
        }

        echo $twig->render($template, $args);
    }

} //END CLASS


