<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * contatos_pasta_option_list Model Action
     * @return array
     */
	function contatos_pasta_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT pasta AS value,pasta AS label FROM contatos ORDER BY pasta ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * contatos_partido_option_list Model Action
     * @return array
     */
	function contatos_partido_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT partido AS value,partido AS label FROM contatos ORDER BY partido ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * contatos_cargo_option_list Model Action
     * @return array
     */
	function contatos_cargo_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT cargo AS value,cargo AS label FROM contatos ORDER BY cargo ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * oficios_destino_option_list Model Action
     * @return array
     */
	function oficios_destino_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT destino AS value,destino AS label FROM oficios ORDER BY destino ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * oficios_pauta_option_list Model Action
     * @return array
     */
	function oficios_pauta_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT pauta AS value,pauta AS label FROM oficios ORDER BY pauta ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * oficios_destinatario_option_list Model Action
     * @return array
     */
	function oficios_destinatario_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT nome AS value , nome AS label FROM contatos ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * usuarios_login_value_exist Model Action
     * @return array
     */
	function usuarios_login_value_exist($val){
		$db = $this->GetModel();
		$db->where("login", $val);
		$exist = $db->has("usuarios");
		return $exist;
	}

	/**
     * usuarios_email_value_exist Model Action
     * @return array
     */
	function usuarios_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("usuarios");
		return $exist;
	}

	/**
     * oficios_oficiosandamento_option_list Model Action
     * @return array
     */
	function oficios_oficiosandamento_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT andamento AS value,andamento AS label FROM oficios ORDER BY andamento ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * getcount_todos Model Action
     * @return Value
     */
	function getcount_todos(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM oficios";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_oficiosentregues Model Action
     * @return Value
     */
	function getcount_oficiosentregues(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM oficios where andamento='OFICIO ENTREGUE'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_semprotocolo Model Action
     * @return Value
     */
	function getcount_semprotocolo(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM oficios where andamento='SEM PROTOCOLO'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_projetosemandamento Model Action
     * @return Value
     */
	function getcount_projetosemandamento(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM oficios where andamento='PROJETO EM ANDAMENTO'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_finalizados Model Action
     * @return Value
     */
	function getcount_finalizados(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM oficios where andamento='FINALIZADO'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_cancelados Model Action
     * @return Value
     */
	function getcount_cancelados(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM oficios where andamento='CANCELADO'";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_seminformao Model Action
     * @return Value
     */
	function getcount_seminformao(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM oficios where andamento='' or andamento = null";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

}
