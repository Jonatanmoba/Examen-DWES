<?php
class UsuarioModel
{
    protected $db;

    private $personaID;
    private $nombre;
    private $apellidos;
    private $dni;
    private $telefono;
    private $email;

    public function __construct()
    {
        // Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }

    // Métodos GET y SET para personaID
    public function getCodigo()
    {
        return $this->personaID;
    }
    public function setCodigo($codigo)
    {
        return $this->personaID = $codigo;
    }

    // Métodos GET y SET para nombre
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($valor)
    {
        return $this->nombre = $valor;
    }

    // Métodos GET y SET para apellidos
    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function setApellidos($valor)
    {
        return $this->apellidos = $valor;
    }

    // Métodos GET y SET para dni
    public function getDni()
    {
        return $this->dni;
    }
    public function setDni($valor)
    {
        return $this->dni = $valor;
    }

  

    // Métodos GET y SET para telefono
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($valor)
    {
        return $this->telefono = $valor;
    }

    // Métodos GET y SET para email
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($valor)
    {
        return $this->email = $valor;
    }

    // Obtener todos los registros
    
    public function getAll()
    {
        $gsent = $this->db->prepare('SELECT * FROM viaje_personas, viaje_institutos WHERE viaje_personas.instituto_id = viaje_institutos.instituto_id ORDER BY viaje_personas.instituto_id, apellidos, nombre');
        $gsent->execute();
        $resultado = $gsent->fetchAll();
        return $resultado;
    }

    // Obtener un registro por ID
    public function getById($id)
    {
        $gsent = $this->db->prepare('SELECT * FROM viaje_personas WHERE codigo = ?');
        $gsent->bindParam(1, $id);
        $gsent->execute();
        $gsent->setFetchMode(PDO::FETCH_CLASS, "PersonaModel");
        $resultado = $gsent->fetch();
        return $resultado;
    }

    // Obtener un registro por DNI
    public function getByDni($id)
    {
        $gsent = $this->db->prepare('SELECT * FROM citas_usuarios WHERE dni = ?');
        $gsent->bindParam(1, $id);
        $gsent->execute();
        $gsent->setFetchMode(PDO::FETCH_CLASS, "PersonaModel");
        $resultado = $gsent->fetch();
        return $resultado;
    }

    // Guardar un registro
    public function save()
    {
        if (!isset($this->personaID)) {
            $consulta = $this->db->prepare('INSERT INTO citas_usuarios ( dni, nombre, apellidos, telefono, email) VALUES ( ?, ?, ?, ?, ?)');
            $consulta->bindParam(1, $this->dni);
            $consulta->bindParam(2, $this->nombre);
            $consulta->bindParam(3, $this->apellidos);
            $consulta->bindParam(4, $this->telefono);
            $consulta->bindParam(5, $this->email);
            $consulta->execute();
        } 
    }

    // Eliminar un registro
    public function delete()
    {
        $gsent = $this->db->prepare('DELETE FROM viaje_personas WHERE codigo = ?');
        $codigo = $this->getCodigo();
        $gsent->bindParam(1, $codigo);
        $gsent->execute();
    }
}
?>
