<?php

require_once("DBAbstractModel.php");

class Conductores extends DBAbstractModel
{
    private static $instancia; // esto es el modelo singleton

    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miClase = __CLASS__;
            self::$instancia = new $miClase;
        }
        return self::$instancia;
    }

    // Funcion clone para evitar que no se pueda clonar

    public function __clone()
    {
        trigger_error("La clonación no está permitida!", E_USER_ERROR);
    }
    private $id;
    private $nombre;
    private $puntos;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of puntos
     */
    public function getPuntos()
    {
        return $this->puntos;
    }

    /**
     * Set the value of puntos
     *
     * @return  self
     */
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;

        return $this;
    }

    public function set()
    {
    }
    public function get($id = "")
    {
    }
    public function edit($id = "")
    {
    }
    public function delete($id = "")
    {
    }

    public function getAllConductores()
    {
        $this->query = "SELECT * FROM conductores";
        $this->get_results_from_query();
        $this->mensaje = "Todos los usuarios";
        return $this->rows; //array indexado asociativo ...[0]['loquesea']
    }

    public function getConductoresByNombre($nombre)
    {
        $this->query = "SELECT * FROM conductores WHERE nombre LIKE '%$nombre%'";
        $this->parametros['nombre'] = $nombre;

        $this->get_results_from_query();
        $this->mensaje = "Todos los usuarios";
        return $this->rows; //array indexado asociativo ...[0]['loquesea']
    }

    public function quitarPuntos($puntos, $id)
    {
        $this->query = "UPDATE conductores SET puntos=:puntos WHERE id=:id";
        $this->parametros['puntos'] = $puntos;
        $this->parametros['id'] = $id;

        $this->get_results_from_query();
    }
}
