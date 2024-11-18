<?php
require_once 'conexion.php'; 
require_once '../modelos/Carrito.php'; 

class DAOCarrito
{
    private $conexion; 

    private function conectar(){
        try {
            $this->conexion = Conexion::conectar(); 
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function autenticar($correo, $password)
    {
        try { 
            $this->conectar();
            $obj = null; 
            
            $sentenciaSQL = $this->conexion->prepare("SELECT id, descripcion, precio 
            FROM carrito WHERE correo = ? AND contrasenia = sha224(?)");
            $sentenciaSQL->execute([$correo, $password]);

            $fila = $sentenciaSQL->fetch(PDO::FETCH_OBJ);
            if($fila) {
                $obj = new Carrito();
                $obj->id = $fila->id;
                $obj->descripcion = $fila->descripcion;
                $obj->precio = $fila->precio;
            }
            return $obj;
        } catch(Exception $e) {
            var_dump($e);
            return null;
        } finally {
            Conexion::desconectar();
        }
    }

    public function obtenerTodos()
    {
        try {
            $this->conectar();
            $lista = array();
            
            $sentenciaSQL = $this->conexion->prepare("SELECT id, descripcion, precio FROM carrito");
            $sentenciaSQL->execute();
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);

            foreach($resultado as $fila) {
                $obj = new Carrito();
                $obj->id = $fila->id;
                $obj->descripcion = $fila->descripcion;
                $obj->precio = $fila->precio;
                $lista[] = $obj;
            }
            
            return $lista;
        } catch(PDOException $e) {
            var_dump($e);
            return null;
        } finally {
            Conexion::desconectar();
        }
    }

    public function obtenerUno($id)
    {
        try { 
            $this->conectar();
            $obj = null; 
            
            $sentenciaSQL = $this->conexion->prepare("SELECT id, descripcion, precio FROM carrito WHERE id = ?"); 
            $sentenciaSQL->execute([$id]);

            $fila = $sentenciaSQL->fetch(PDO::FETCH_OBJ);
            if($fila) {
                $obj = new Carrito();
                $obj->id = $fila->id;
                $obj->descripcion = $fila->descripcion;
                $obj->precio = $fila->precio;
            }
           
            return $obj;
        } catch(Exception $e) {
            return null;
        } finally {
            Conexion::desconectar();
        }
    }

    public function eliminar($id)
    {
        try {
            $this->conectar();
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM carrito WHERE id = ?");			          
            $resultado = $sentenciaSQL->execute([$id]);
            return $resultado;
        } catch (PDOException $e) {
            return false;	
        } finally {
            Conexion::desconectar();
        }
    }

    public function editar(Carrito $obj)
    {
        try {
            $sql = "UPDATE carrito
                    SET
                    descripcion = ?,
                    precio = ?,
                    cantidad = ?
                    WHERE id = ?;";
    
            $this->conectar();
            $sentenciaSQL = $this->conexion->prepare($sql);
            $sentenciaSQL->execute([
                $obj->descripcion,
                $obj->precio,
                $obj->cantidad,
                $obj->id
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        } finally {
            Conexion::desconectar();
        }
    }
    

    public function agregar(Carrito $obj)
    {
        $clave = 0;
        try {
            $sql = "INSERT INTO carrito
                (descripcion, precio)
                VALUES
                (?, ?);";
                
            $this->conectar();
            $this->conexion->prepare($sql)->execute([
                $obj->descripcion,
                $obj->precio
            ]);
                 
            $clave = $this->conexion->lastInsertId();
            return $clave;
        } catch (Exception $e) {
            return $clave;
        } finally {
            Conexion::desconectar();
        }
    }
}
?>
