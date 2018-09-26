<?php
namespace App\Config;

class Config
{
  public function __construct(){}

  //1. Define the absolute path
  private static $PATH_ABS = "http://localhost/html/";
  public function getPathABS(){
    return self::$PATH_ABS;
  }

  /**
  * 2. Define ERROR HANDLING
  * Show or hide error messages on screen
  * @var boolean
  */
  private static $SHOW_ERRORS = true;
  public function showErrors(){
    return self::$SHOW_ERRORS;
  }

  //3.    define database attributes
  private static $DB_TYPE = "mysql";
  private static $DB_HOST = "127.0.0.1";
  private static $DB_NAME = "dB";
  private static $DB_USER = "dBuser";
  private static $DB_PASS = "dBpsw";
  public function getPdoConnection()
  {
    $dns = "";
    $dns .= self::$DB_TYPE;
    $dns .= ':host=';
    $dns .= self::$DB_HOST;
    $dns .= ';dbname=';
    $dns .= self::$DB_NAME;
    $pdo = array(
      'dns' => $dns,
      'user' => self::$DB_USER,
      'psw' => self::$DB_PASS
    );
    return $pdo;
  }

  // ------------- DO NOT CHANGE AFTER INSTALL -----------------------------
  //4. Hash codes
  // This is for database passwords only
  private static $HASH_KEY_PSW = 'pigsFlyOnly@night';
  public function getHashKeyPsw(){
    return self::$HASH_KEY_PSW;
  }
  // This is for other hash keys... Not sure yet
  private static $HASH_KEY_GEN = 'hipHopSucks';
  public function getHashKeyGen(){
    return self::$HASH_KEY_GEN;
  }
  // ------------- DO NOT CHANGE AFTER INSTALL -----------------------------


} //END CLASS

?>
