<?php
require_once 'conexion.php';
require_once '../modelos/Carrito.php';

class DAOCarrito
{
    private $conexion;

    private function conectar()
    {
        $this->conexion = Conexion::conectar();
    }

    public function obtenerTodos()
    {
        try {
            $this->conectar();
            $sql = "SELECT id, descripcion, precio, cantidad FROM carrito";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);

            $productos = [];
            foreach ($result as $fila) {
                $producto = new Carrito();
                $producto->id = $fila->id;
                $producto->descripcion = $fila->descripcion;
                $producto->precio = $fila->precio;
                $producto->cantidad = $fila->cantidad;
                $productos[] = $producto;
            }
            return $productos;
        } catch (PDOException $e) {
            return [];
        } finally {
            Conexion::desconectar();
        }
    }

    public function obtenerUno($id)
    {
        try {
            $this->conectar();
            $sql = "SELECT id, descripcion, precio, cantidad FROM carrito WHERE id = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([$id]);
            $fila = $stmt->fetch(PDO::FETCH_OBJ);

            if ($fila) {
                $producto = new Carrito();
                $producto->id = $fila->id;
                $producto->descripcion = $fila->descripcion;
                $producto->precio = $fila->precio;
                $producto->cantidad = $fila->cantidad;
                return $producto;
            }
            return null;
        } catch (PDOException $e) {
            return null;
        } finally {
            Conexion::desconectar();
        }
    }

    public function agregar(Carrito $producto)
    {
        try {
            $this->conectar();
            $sql = "INSERT INTO carrito (id, descripcion, precio, cantidad) VALUES (?, ?, ?, ?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([$producto->id, $producto->descripcion, $producto->precio, $producto->cantidad]);
            return true;
        } catch (PDOException $e) {
            return false;
        } finally {
            Conexion::desconectar();
        }
    }

    public function editar(Carrito $producto)
    {
        try {
            $this->conectar();
            $sql = "UPDATE carrito SET cantidad = ? WHERE id = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([$producto->cantidad, $producto->id]);
            return true;
        } catch (PDOException $e) {
            return false;
        } finally {
            Conexion::desconectar();
        }
    }

    public function vaciarCarrito()
    {
        try {
            $this->conectar();
            $sql = "DELETE FROM carrito";
            $this->conexion->exec($sql);
            return true;
        } catch (PDOException $e) {
            return false;
        } finally {
            Conexion::desconectar();
        }
    }
    public function eliminar($id)
{
    try {
        $this->conectar();
        $sql = "DELETE FROM carrito WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$id]);
        return true;
    } catch (PDOException $e) {
        return false;
    } finally {
        Conexion::desconectar();
    }
}

}

?>
