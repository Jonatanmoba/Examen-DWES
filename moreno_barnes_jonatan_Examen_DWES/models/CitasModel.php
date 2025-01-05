<?php
class CitasModel
{
    protected $db;
 
    private $cita_id;
    private $fecha;
    private $hora;
	
    public function __construct()
    {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }
 
    public function getClase_id()
    {
        return $this->clase_id;
    }
    
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }
    
    
    public function getAll()
    {       
        $consulta = $this->db->prepare('select * from citas_citas where cita_id not in (select cita_id from citas_reservas)');
        $consulta->execute();
       
        $resultado = $consulta->fetchAll();
        
		
		return $resultado;
    }
    public function getByCita($cita){
        $consulta = $this->db->prepare('select * from citas_citas where cita_id= ?');
        $consulta->bindParam( 1, $cita );
        $consulta->execute();
       
        $resultado = $consulta->fetch();
        
		
		return $resultado;

    }
   
    public function getClases()
    {       
		$fecha = date('yyyy/mm/dd');
        $consulta = $this->db->prepare('select * from gim_clases INNER JOIN gim_categorias on gim_clases.categoria_id = gim_categorias.categoria_id where fecha >= ?');
		$consulta->bindParam( 1, $fecha );
        $consulta->execute();
       
        $resultado = $consulta->fetchAll();
        
		
		return $resultado;
    }
   public function getCantidad()
    {       
        $consulta = $this->db->prepare(' select libro_id , count(*) as total from biblioteca_reservas GROUP by libro_id ');
        $consulta->execute();
       
        $resultado = $consulta->fetchAll();
        
		
		return $resultado;
    }
   
    
}
?>