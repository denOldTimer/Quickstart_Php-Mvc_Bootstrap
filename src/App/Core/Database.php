<?php
namespace App\Core;
use PDO;
use App\Config\Config;

class Database extends PDO
{
  /* __construct
 */
    public function __construct()
    {
      $pdo = Config::getPdoConnection();
      parent::__construct($pdo['dns'],$pdo['user'],$pdo['psw']);
        //parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTIONS);
    }

  /* rowcount
   * @param string $sql An SQL string
   * @param
   * @param
   * @return integer
   */
    public function rowcount($sql)
    {
        $sth = $this->prepare($sql);
        $sth->execute();
        return $sth->rowCount();
    }

  /* Select
   * @param string $sql An SQL string
   * @param array $array Paramters to bind
   * @param constant $fetchMode A PDO Fetch mode
   * @return mixed
   */
    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
    {
        $sth = $this->prepare($sql);
        foreach ($array as $key => $value) {
            $sth->bindValue("$key", $value);
        }

        $sth->execute();
        return $sth->fetchAll($fetchMode);
        //return $sth;
    }

  /* Create
   * @param string $table A name of table to insert into
   * @param string $data An associative array
   */
    public function create($table, $data = array() )
    {
      //ksort($data);
      $key_string = "";
      $value_string = "";
      foreach( $data as $key => $value) {
          $key_string .= $key . "," ;
          $value_string .= ":" . $key . ",";
      }
      $key_string = substr( $key_string, 0, -1 );
      $value_string = substr( $value_string, 0, -1 );

      $query = "INSERT INTO " . $table . " (" . $key_string . ") VALUES (" . $value_string . ")";
      $sth = $this->prepare( $query );
      foreach ($data as $key => $value) {
          $sth->bindValue("$key", $value);
      }
      $count = $sth->execute();
      $id = $this->lastInsertId();
      return $id;
    }

  /* Update
   * @param string $table A name of table to insert into
   * @param string $data An associative array
   * @param string $where the WHERE query part
   */
    public function update($table, $data = array(), $where )
    {
        $key_string = "";
        foreach($data as $key=> $value) {
            $key_string .= "`" . $key . "` = :" . $key . ", ";
        }
        $key_string = rtrim($key_string, ", ");
        var_dump($key_string);

        $query = "UPDATE $table SET $key_string WHERE $where";
        $sth = $this->prepare( $query );

        foreach ($data as $key => $value) {
          $sth->bindValue(":$key", $value);
        }

        $count = $sth->execute();
        echo $count;

        return $count;
    }

  /* Delete
   *
   * @param string $table
   * @param string $where
   * @param integer $limit
   * @return integer Affected Rows
   */
    public function delete($table, $where, $limit = 1)
    {
        $count = $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
        return $count;
    }


}
