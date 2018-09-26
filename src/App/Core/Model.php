<?php
namespace App\Core;
use App\Core\Database;
/**
 * Base Model
 */
class Model
{
  private static $dB = null;

  public static function getdB()
  {

      if (self::$dB === null)
      {
        self::$dB = new Database();
      }
      return self::$dB;
  }



} //END CLASS
