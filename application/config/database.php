<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database 
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/


$active_record = TRUE;

switch ($_SERVER['SERVER_NAME']) {
    case 'lavivencia.hol.es':
         $active_group = 'online';
        break;
  
    default:
        $active_group = 'test';
        break;
}

$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'SYSDBA';
$db['default']['password'] = 'akuma2010';
$db['default']['database'] = '/home/ivan/Área de Trabalho/database2.gdb';
$db['default']['dbdriver'] = 'firebird';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = FALSE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;


$db['test']['hostname'] = 'localhost';
$db['test']['username'] = 'root';
$db['test']['password'] = '12345';
$db['test']['database'] = 'db_lavivencia';
$db['test']['dbdriver'] = 'mysql';
$db['test']['dbprefix'] = '';
$db['test']['pconnect'] = FALSE;
$db['test']['db_debug'] = TRUE;
$db['test']['cache_on'] = FALSE;
$db['test']['cachedir'] = '';
$db['test']['char_set'] = 'utf8';
$db['test']['dbcollat'] = 'utf8_general_ci';
$db['test']['swap_pre'] = '';
$db['test']['autoinit'] = TRUE;
$db['test']['stricton'] = FALSE;


$db['office']['hostname'] = 'localhost';
$db['office']['username'] = 'SYSDBA';
$db['office']['password'] = 'akuma2010';
$db['office']['database'] = '/home/imartins/Área de Trabalho/database.gdb';
$db['office']['dbdriver'] = 'firebird';
$db['office']['dbprefix'] = '';
$db['office']['pconnect'] = FALSE;
$db['office']['db_debug'] = TRUE;
$db['office']['cache_on'] = FALSE;
$db['office']['cachedir'] = '';
$db['office']['char_set'] = 'NONE';
$db['office']['dbcollat'] = 'NONE';
$db['office']['swap_pre'] = '';
$db['office']['autoinit'] = TRUE;
$db['office']['stricton'] = FALSE;

$db['online']['hostname'] = 'localhost';
$db['online']['username'] = 'u514233581_laviv';
$db['online']['password'] = 'akuma2010';
$db['online']['database'] = 'u514233581_laviv';
$db['online']['dbdriver'] = 'mysql';
$db['online']['dbprefix'] = '';
$db['online']['pconnect'] = FALSE;
$db['online']['db_debug'] = TRUE;
$db['online']['cache_on'] = FALSE;
$db['online']['cachedir'] = '';
$db['online']['char_set'] = 'utf8';
$db['online']['dbcollat'] = 'utf8_general_ci';
$db['online']['swap_pre'] = '';
$db['online']['autoinit'] = TRUE;
$db['online']['stricton'] = FALSE;

/* End of file database.php */
/* Location: ./application/config/database.php */