<?php
//importa la clase conexión y el modelo para usarlos
require_once 'conexion.php'; 
require_once '../modelos/Producto.php'; 

class DAOProducto
{
    
	private $conexion; 
    
    /**
     * Permite obtener la conexión a la BD
     */
    private function conectar(){
        try{
			$this->conexion = Conexion::conectar(); 
		}
		catch(Exception $e)
		{
			die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un mensaje con el error*/
		}
    }
    
    /**
     * Metodo que obtiene todos los productos de la base de datos y los
     * retorna como una lista de objetos  
     */
	public function obtenerTodos() {
        try {
            $this->conectar();
            $lista = array();
            $sql = "SELECT id, nombre, descripcion, precio, imagen, stock FROM productos";
            $sentenciaSQL = $this->conexion->prepare($sql);
            $sentenciaSQL->execute();
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);

            foreach ($resultado as $fila) {
                $producto = new Producto(
                    $fila->id,
                    $fila->nombre,
                    $fila->descripcion,
                    $fila->precio,
                    $fila->imagen,
                    $fila->stock
                );
                $lista[] = $producto;
            }

            return $lista;
        } catch (PDOException $e) {
            var_dump($e);
            return null;
        } finally {
            Conexion::desconectar();
        }
    }

    /**
     * Metodo que obtiene un registro de la base de datos, retorna un objeto  
     */
    public function obtenerUno($id)
	{
		try
		{ 
            $this->conectar();
            
            //Almacenará el registro obtenido de la BD
			$obj = null; 
            
			$sentenciaSQL = $this->conexion->prepare("SELECT id, nombre, precio, stock FROM Producto WHERE id=?"); 
			//Se ejecuta la sentencia sql con los parametros dentro del arreglo 
            $sentenciaSQL->execute([$id]);
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
            $obj = null;
            if($fila){            
                $obj = new Producto(0, '', '', 0, '', 0);
                $obj->id = $fila->id;
                $obj->nombre = $fila->nombre;
                $obj->descripcion = $fila->descripcion;
                $obj->precio = $fila->precio;
                $obj->imagen = $fila->imagen;
                $obj->stock = $fila->stock;

            }
           
            return $obj;
		}
		catch(Exception $e){
            return null;
		}finally{
            Conexion::desconectar();
        }
	}
        
    /**
     * Elimina el producto con el id indicado como parámetro
     */
	public function eliminar($id)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM Producto WHERE id = ?");			          
			$resultado=$sentenciaSQL->execute(array($id));
			return $resultado;
		} catch (PDOException $e) 
		{
			//Si quieres acceder expecíficamente al numero de error
			//se puede consultar la propiedad errorInfo
			return false;	
		}finally{
            Conexion::desconectar();
        }
	}

	/**
     * Función para editar al producto de acuerdo al objeto recibido como parámetro
     */
	public function editar(Producto $obj)
	{
		try 
		{
			$sql = "UPDATE producto
                    SET
                    nombre = ?,
                    descripcion =?,
                    precio = ?,
                    imagen = ?,
                    stock = ?
                    WHERE id = ?;";

            $this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare($sql);
			$sentenciaSQL->execute(
				[$obj->nombre,
                 $obj->descripcion,
                 $obj->precio,
                 $obj->imagen,
                 $obj->stock,
                 $obj->id]);
            return true;
		} catch (PDOException $e){
            
            //var_dump($e);
			//Si quieres acceder expecíficamente al numero de error
			//se puede consultar la propiedad errorInfo
			return false;
		}finally{
            Conexion::desconectar();
        }
	}

	
	/**
     * Agrega un nuevo producto de acuerdo al objeto recibido como parámetro
     */
    public function agregar(Producto $obj)
	{
        $clave=0;
		try 
		{
            $sql = "INSERT INTO Productos
                (nombre,
                descripcion,
                precio,
                imagen,
                stock
                )
                VALUES
                (?,?,?,?,?);";
                
            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute([
                 $obj->nombre,
                 $obj->descripcion,
                 $obj->precio,
                 $obj->imagen,
                 $obj->stock]);
                 
            $clave=$this->conexion->lastInsertId();
            return $clave;
		} catch (Exception $e){
			// var_dump($e->getMessage());
            return $clave;
		}finally{
            
            /*En caso de que se necesite manejar transacciones, 
			no deberá desconectarse mientras la transacción deba 
			persistir*/
            
            Conexion::desconectar();
        }
	}
}

?>
