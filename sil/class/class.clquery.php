<?php
    include_once( CLASS_PATH . "class.clmysql.php" );
        ini_set('memory_limit','512M');
	class clQuery
	{
		private $strProcedimientoAlmacenado;
		private $strConsulta;
		public function __construct()
			{
				$this->strProcedimientoAlmacenado = "";
				$this->strConsulta = "";
			}
		
		// Funciones Get y Set de la Clase clQuery
		public function getStrProcedimientoAlmacenado()
			{
				return $this->strProcedimientoAlmacenado;
			}

		public function setStrProcedimientoAlmacenado($sp)
			{
				$this->strProcedimientoAlmacenado = $sp;
			}
			
		public function getStrConsulta()
			{
				return $this->strConsulta;
			}

		public function setStrConsulta($c)
			{
				$this->strConsulta = $c;
			}

		//Funci�n para realizar un SELECT
		public function getStrSqlSelect()
			{			  
				$mysql = new clMySql();
				
				$cn = $mysql->getStrAbrirConexion();
				$procedimiento = $this->getStrProcedimientoAlmacenado();
			
				$this->setStrConsulta(mysqli_query($cn, $procedimiento));			
				$resultado = array ();
				
				if ($this->getStrConsulta())
					while ($r = mysqli_fetch_assoc ($this->getStrConsulta()))
						array_push ($resultado, $r);			

				//Libera la consulta
				$this->getStrLiberarConsulta();			

				//Libera Conexi�n
				$mysql->getStrCerrarConexion($cn);
				
				return  $resultado;
			}			
					
		//Funci�n para realizar el Ingreso, Actualizaci�n y/o Eliminaci�n
		public function getStrSqlInsertUpdateDelete()
			{	
				$mysql = new clMySql();
				
				$cn = $mysql->getStrAbrirConexion();
				$procedimiento = $this->getStrProcedimientoAlmacenado();
			
				$this->setStrConsulta(mysqli_query($cn, $procedimiento));			
				
				//Libera Conexi�n
				$mysql->getStrCerrarConexion($cn);


				return  $this->getStrConsulta();
			}
			
		public function getStrLiberarConsulta()
			{
				return mysqli_free_result($this->getStrConsulta());				
			}
			
	}
?>