<?php
/* 
 * Change mysql_connect to reflect local environment and rename to mysql.php.
 * An export of the database should be available in the db_exports folder.
 */

define("DB_HOST", "Your host name");
define("DATABASE", "Name of database");
define("DB_USER", "Database user name");
define("DB_PASS", "Password for that user");

$con = mysql_connect(DB_HOST, DB_USER, DB_PASS);

if (!$con) {
        die('Could not connect: ' . mysql_error());
}

mysql_select_db(DATABASE, $con);


$db['default']['db_debug'] = FALSE;

$db = & CDB::get_db();

/* The code below was written by Hazar Kahera for a different project, it is being reused here*/
class CDB
{
    var $link_id;
    
    function CDB()
    {
        $this->link_id = mysql_connect(DB_HOST, DB_USER, DB_PASS);
        mysql_select_db(DATABASE, $this->link_id) or die(mysql_error().' SQL: '.$sql);
    }
    
    function &get_db()
    {
        global $db;
        if (!is_object($db))
            $db = new CDB();
        return $db;
    }
    
    function &get_array($sql, $key='')
    {
        $data = array();
        $res = mysql_query($sql, $this->link_id) or die(mysql_error().' SQL: '.$sql);

        if (!$key)
            while ($row = mysql_fetch_array($res, MYSQL_ASSOC))
                $data[] = $row;
        else
            while ($row = mysql_fetch_array($res, MYSQL_ASSOC))
                $data[$row[$key]] = $row;

        mysql_free_result($res);
        
        return $data;
    }
    
    function get_scalar($sql)
    {
        $res = mysql_query($sql, $this->link_id) or die(mysql_error().' SQL: '.$sql);
        if ($row = mysql_fetch_row($res)) {
            $ret = $row[0];
        }
        else {
            $ret = false;
        }
        
        mysql_free_result($res);
        
        return $ret;
    }
    
    function &get_row($sql) {
        $res = mysql_query($sql, $this->link_id) or die(mysql_error().' SQL: '.$sql);
        $row = mysql_fetch_array($res, MYSQL_ASSOC);
        mysql_free_result($res);
        
        return $row;
    }
    
    function exec($sql)
    {
        $res = mysql_query($sql, $this->link_id) or die(mysql_error().' SQL: '.$sql);
        return mysql_affected_rows($this->link_id);
    }
    
    function get_last_id()
    {
        return mysql_insert_id($this->link_id);
    }
    
    ///////////////////////////////////////////////////////////////////
    // Common routines
    ///////////////////////////////////////////////////////////////////
    
    function implode($ids)
    {
        $ret = $delim = '';
        
        for ($i = count($ids) - 1; $i >= 0; $i --) {
            $id = intval($ids[$i]);
            if ($id > 0) {
                $ret .= $delim . $id;
                $delim = ',';
            }
        }
        
        return $ret;
    }

    function str($str) {
        return mysql_escape_string($str);
    }

}


?>