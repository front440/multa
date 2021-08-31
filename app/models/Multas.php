<?php

require_once("DBAbstractModel.php");

class Multas extends DBAbstractModel
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
    private $id_agente;
    private $id_conductor;
    private $matricula;
    private $id_tipo_sanciones;
    private $descripcion;
    private $fecha;
    private $importe;
    private $descuento;
    private $estado;

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
     * Get the value of id_agente
     */
    public function getId_agente()
    {
        return $this->id_agente;
    }

    /**
     * Set the value of id_agente
     *
     * @return  self
     */
    public function setId_agente($id_agente)
    {
        $this->id_agente = $id_agente;

        return $this;
    }

    /**
     * Get the value of id_conductor
     */
    public function getId_conductor()
    {
        return $this->id_conductor;
    }

    /**
     * Set the value of id_conductor
     *
     * @return  self
     */
    public function setId_conductor($id_conductor)
    {
        $this->id_conductor = $id_conductor;

        return $this;
    }

    /**
     * Get the value of matricula
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set the value of matricula
     *
     * @return  self
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * Get the value of id_tipo_sanciones
     */
    public function getId_tipo_sanciones()
    {
        return $this->id_tipo_sanciones;
    }

    /**
     * Set the value of id_tipo_sanciones
     *
     * @return  self
     */
    public function setId_tipo_sanciones($id_tipo_sanciones)
    {
        $this->id_tipo_sanciones = $id_tipo_sanciones;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of importe
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set the value of importe
     *
     * @return  self
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get the value of descuento
     */
    public function getDescuento()
    {
        return $this->descuento;
    }

    /**
     * Set the value of descuento
     *
     * @return  self
     */
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }


    public function set()
    {
        $this->query = "INSERT INTO multas (id_agente, id_conductor, matricula, id_tipo_sanciones, descripcion, fecha, importe, descuento, estado) VALUES (:id_agente, :id_conductor, :matricula, :id_tipo_sanciones, :descripcion, :fecha, :importe, :descuento, :estado)";
        $this->parametros['id_agente'] = $this->id_agente;
        $this->parametros['id_conductor'] = $this->id_conductor;
        $this->parametros['matricula'] = $this->matricula;
        $this->parametros['id_tipo_sanciones'] = $this->id_tipo_sanciones;
        $this->parametros['descripcion'] = $this->descripcion;
        $this->parametros['fecha'] = $this->fecha;
        $this->parametros['importe'] = $this->importe;
        $this->parametros['descuento'] = $this->descuento;
        $this->parametros['estado'] = $this->estado;
        $this->get_results_from_query();
        $this->mensaje = "Usuario añadido ";
    }
    public function get($id = "")
    {
        // si el id no esta vacio se hace la consulta
        if ($id != "") {
            $this->query = "SELECT * FROM multas WHERE id = :id";
            // cargamos los parametros
            $this->parametros['id'] = $id;

            //Ejecutamos la consulta que devuelve registros
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $value) {
                $this->$propiedad = $value;
            }
            $this->mensaje = "Usuario encontrado";
        } else {
            $this->mensaje = "Usuario no encontrado";
        }
        return $this->rows;
    }
    public function edit($id = "")
    {
        $this->query = "UPDATE multas SET id_agente=:id_agente, id_conductor=:id_conductor, matricula=:matricula, id_tipo_sanciones=:id_tipo_sanciones, descripcion= :descripcion, fecha=:fecha, importe=:importe, descuento= :descuento, estado=:estado  WHERE id=:id";
        $this->parametros['id_agente'] = $this->id_agente;
        $this->parametros['id_conductor'] = $this->id_conductor;
        $this->parametros['matricula'] = $this->matricula;
        $this->parametros['id_tipo_sanciones'] = $this->id_tipo_sanciones;
        $this->parametros['descripcion'] = $this->descripcion;
        $this->parametros['fecha'] = $this->fecha;
        $this->parametros['importe'] = $this->importe;
        $this->parametros['descuento'] = $this->descuento;
        $this->parametros['estado'] = $this->estado;
        $this->parametros['id'] = $id;

        $this->get_results_from_query();
        $this->mensaje = "Usuario modificado";
    }
    public function delete($id = "")
    {
        $this->query = "DELETE FROM usuario WHERE id=:id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = "Usuario ELIMINADO";
    }


    public function getAllMultas()
    {
        $this->query = "SELECT * FROM multas ORDER BY fecha DESC ";
        $this->get_results_from_query();
        $this->mensaje = "Todos los usuarios";
        return $this->rows; //array indexado asociativo ...[0]['loquesea']
    }

    public function pagarMulta($id)
    {
        $this->query = "UPDATE multas SET estado=:estado  WHERE id=:id";
        $this->parametros['estado'] = "Pagada";
        $this->parametros['id'] = $id;

        $this->get_results_from_query();
        $this->mensaje = "Todos los usuarios";
    }

    public function getMultaByAgente($agente)
    {
        $this->query = "SELECT * FROM multas WHERE id_agente = :id_agente";
        $this->parametros['id_agente'] = $agente;
        $this->get_results_from_query();
        $this->mensaje = "Todos los usuarios";
        return $this->rows; //array indexado asociativo ...[0]['loquesea']
    }

}
