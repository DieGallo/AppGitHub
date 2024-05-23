<?php 
	class SuscriptoresModel extends Mysql
	{
		public function selectSuscriptores()
		{
			$sql = "SELECT idsuscripcion, nombre, email, DATE_FORMAT(datecreated, '%d/%m/%Y') AS fecha
					FROM suscripciones ORDER BY idsuscripcion DESC";
			$request = $this->select_all($sql);
			return $request;
		}
	}

?>