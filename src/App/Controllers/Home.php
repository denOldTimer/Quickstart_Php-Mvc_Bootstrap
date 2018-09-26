<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Core\View;
/**
 *  Home
 */
class Home extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    protected function before(){}

    public function indexAction( $args = array() ){
        $scMeta = self::getScMeta();
        $scMeta['scMetaDescription']    = 'This is the official homepage of YourWebSiteName';
        $scMeta['scMetaOgUrl']          = $scMeta['scMetaOgUrl'] .'/'.$args['lang'].'/'.$args['controller'].'/'.$args['action'];
        $scMeta['scMetaOgTitle']        = ucfirst ( $args['controller'] );
        $scMeta['scMetaOgDescription']  = $scMeta['scMetaOgDescription'].' '.$scMeta['scMetaDescription'];
        $scMeta['scMetaOgImage']        = $scMeta['scMetaOgImage'].'homepage.gif';

        $scVariables = self::getScVariables();
        $scVariables['scLang'] 			= $args['lang'];
        $scVariables['scController'] 	= $args['controller'];
        $scVariables['scAction'] 		= $args['action'];
        $scVariables['scTitle'] 		= ucfirst ( $args['controller'] );
        $scVariables['scSlogan'] 		= 'Welcome to YourWebSiteName';

        $trans = self::getTranslation($args['lang']);

        //$data = array_merge($scMeta, $scVariables, $scImages, $scLinks, $scLinksFooter);
        $data = array_merge($scMeta, $scVariables, $trans);
        $t = 'home';

        View::render('f1', $t, $data);
    }

    protected function after(){}


}
