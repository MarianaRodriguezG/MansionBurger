<?php
class Producto
{
    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $imagen;
    public $stock;

    public function __construct($id, $nombre, $descripcion, $precio, $imagen, $stock)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->imagen = $imagen;
        $this->stock = $stock;
    }
}
