<?php
class ReservaModel
{
    protected $db;
 
    private $reserva_id;
    private $cita_id;
	private $usuario_id;
	
	public function __construct()
    {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }
 
	public function setClase_id( $codigo )
    {
        return $this->libro_id = $codigo;
    }
    public function setUsuario_id( $codigo )
    {
        return $this->usuario_id = $codigo;
    }
    
    public function setCita_id($valor){
        return $this->cita_id = $valor;
    }
    
	
	public function getReservasUsuario( $nif, $telefono )
    {       
		
        $consulta = $this->db->prepare('select * from citas_citas, citas_reservas, citas_usuarios where citas_usuarios.usuario_id = citas_reservas.usuario_id and citas_reservas.cita_id = citas_citas.cita_id nif = ? and telefono = ? ');
		$consulta->bindParam( 1, $nif );
		$consulta->bindParam( 1, $telefono );
        $consulta->execute();
       
        $resultado = $consulta->fetchAll();
        
		
		return $resultado;
    }
	
	
    public function getByLibroIdByUsuarioId( $libro_id, $usuario_id )
    {       
		
        $consulta = $this->db->prepare('select * from biblioteca_reservas , biblioteca_libros ,biblioteca_categorias where biblioteca_libros.categoria_id = biblioteca_categorias.categoria_id and biblioteca_reservas.libro_id = biblioteca_libros.libro_id and biblioteca_reservas.libro_id =  ? and biblioteca_reservas.usuario_id = ?');
		$consulta->bindParam( 1, $libro_id );
        $consulta->bindParam( 2, $usuario_id );
        $consulta->execute();
		$consulta->setFetchMode(PDO::FETCH_CLASS, "ReservaModel");
		$resultado = $consulta->fetch();
		return $resultado;
    }
     
    public function save()
    {
		
        if( ! isset( $this->reserva_id ) )
        {
			$consulta = $this->db->prepare('INSERT INTO `citas_reservas` ( `cita_id`, `usuario_id`) VALUES ( ?,?)');
            
            $consulta->bindParam( 1,  $this->cita_id );
            $consulta->bindParam( 2,  $this->usuario_id );
            $resultado = $consulta->execute();
            $this->reserva_id = $this->db->lastInsertId();
        }
        else
        {
            $consulta = $this->db->prepare('UPDATE `citas_reservas` SET `cita_id`=?,`usuario_id`=? WHERE reserva_id =?');
            
            $consulta->bindParam( 1,  $this->cita_id );
            $consulta->bindParam( 2,  $this->usuario_id );
            $consulta->bindParam( 3,  $this->reserva_id  );
            $resultado = $consulta->execute();
        }
        
        return $resultado;
    }
    
     public function delete()
    {
        
        if( isset( $this->reserva_id ) )
        {
            $consulta = $this->db->prepare('DELETE FROM `biblioteca_reservas` WHERE reserva_id =?');
            
            $consulta->bindParam( 1,  $this->reserva_id );
            
            
            $resultado = $consulta->execute();
            return $resultado;
            
        }
       
        
      
    }
    
    
}
?>