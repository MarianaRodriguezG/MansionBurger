<?php
/**
 * Clase que manejará la conexión a la BD
 */
class Conexion
{
    private static $servidor = 'localhost';
    private static $db = 'pwb';
    private static $usuario = 'postgres';
    private static $password = 'root';
    private static $puerto = '5432';
    
    private static $conexion  = null;

    /**
     * No se permite realizar instancias de la clase
     */
    public function __construct() {
        exit('Instancia no permitida');
    }
    
    /**
     * Funcion que permite abrir una nueva conexion a la base de datos 
     */
    public static function conectar()
    {
        if (self::$conexion == null) {     
            try {
                self::$conexion = new PDO("pgsql:host=".self::$servidor.";port=".self::$puerto.";dbname=".self::$db, 
                self::$usuario, self::$password); 
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                exit($e->getMessage()); 
            }
        }
        return self::$conexion;
    }
    
    /**
     * Funcion que permite cerrar la conexion a la base de datos 
     */
    public static function desconectar()
    {
        self::$conexion = null;
    }
}
?>
