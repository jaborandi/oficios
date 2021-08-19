<?php 
/**
 * Oficios Page Controller
 * @category  Controller
 */
class OficiosController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "oficios";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("oficios.id", 
			"contatos.nome AS contatos_nome", 
			"oficios.oficio", 
			"oficios.pauta", 
			"contatos.nome AS contatos_nome", 
			"oficios.andamento", 
			"oficios.destinatario");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				oficios.oficio LIKE ? OR 
				oficios.pauta LIKE ? OR 
				contatos.nome LIKE ? OR 
				oficios.andamento LIKE ? OR 
				oficios.destino LIKE ? OR 
				oficios.destinatario LIKE ? OR 
				oficios.observacoes LIKE ? OR 
				contatos.partido LIKE ? OR 
				contatos.cargo LIKE ? OR 
				contatos.observacoes LIKE ? OR 
				contatos.pasta LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "oficios/search.php";
		}
		$db->join("contatos", "oficios.destinatario = contatos.nome", "INNER");
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("oficios.id", ORDER_TYPE);
		}
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		if(!empty($request->oficios_data)){
			$vals = explode("-to-", str_replace(" ", "", $request->oficios_data));
			$startdate = $vals[0];
			$enddate = $vals[1];
			$db->where("oficios.data BETWEEN '$startdate' AND '$enddate'");
		}
		if(!empty($request->oficios_andamento)){
			$vals = $request->oficios_andamento;
			$db->where("oficios.andamento", $vals, "IN");
		}
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "Oficios";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("oficios/list.php", $data); //render the full page
	}
	/**
     * Load csv|json data
     * @return data
     */
	function import_data(){
		if(!empty($_FILES['file'])){
			$finfo = pathinfo($_FILES['file']['name']);
			$ext = strtolower($finfo['extension']);
			if(!in_array($ext , array('csv','json'))){
				$this->set_flash_msg("Formato de arquivo não suportado", "danger");
			}
			else{
			$file_path = $_FILES['file']['tmp_name'];
				if(!empty($file_path)){
					$request = $this->request;
					$db = $this->GetModel();
					$tablename = $this->tablename;
					if($ext == "csv"){
						$options = array('table' => $tablename, 'fields' => '', 'delimiter' => ',', 'quote' => '"');
						$data = $db->loadCsvData($file_path , $options , false);
					}
					else{
						$data = $db->loadJsonData($file_path, $tablename , false);
					}
					if($db->getLastError()){
						$this->set_flash_msg($db->getLastError(), "danger");
					}
					else{
						$this->set_flash_msg("Dados importados com sucesso", "success");
					}
				}
				else{
					$this->set_flash_msg("Erro ao fazer o upload do arquivo", "success");
				}
			}
		}
		else{
			$this->set_flash_msg("Nenhum arquivo selecionado para upload", "warning");
		}
		$this->redirect("oficios");
	}
	/**
     * View record detail 
	 * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
	function view($rec_id = null, $value = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = urldecode($rec_id);
		$tablename = $this->tablename;
		$fields = array("oficios.id", 
			"oficios.oficio", 
			"oficios.pauta", 
			"contatos.nome AS contatos_nome", 
			"contatos.partido AS contatos_partido", 
			"contatos.cargo AS contatos_cargo", 
			"contatos.pasta AS contatos_pasta", 
			"oficios.destino", 
			"oficios.agenda", 
			"oficios.data", 
			"oficios.andamento", 
			"oficios.destinatario", 
			"oficios.observacoes", 
			"oficios.arquivos", 
			"oficios.adicionado_por", 
			"oficios.adicionado_em", 
			"oficios.atualizado_em");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("oficios.id", $rec_id);; //select record based on primary key
		}
		$db->join("contatos", "oficios.destinatario = contatos.nome", "INNER ");  
		$record = $db->getOne($tablename, $fields );
		if($record){
			$record['data'] = format_date($record['data'],'d/m/Y');
$record['adicionado_em'] = format_date($record['adicionado_em'],'d/m/Y H:i:s');
$record['atualizado_em'] = format_date($record['atualizado_em'],'d/m/Y H:i:s');
			$page_title = $this->view->page_title = "Detalhes";
		$this->view->report_filename = date('Y-m-d') . '-' . 'oficio';
		$this->view->report_title = 'oficio';
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->view->report_hidden_fields = array('id', 'adicionado_por', 'adicionado_em', 'atualizado_em', 'arquivos', 'contatos_id', 'contatos_telefone', 'contatos_email', 'contatos_observacoes', 'contatos_adicionado_por', 'contatos_adicionado_em', 'contatos_atualizado_em');
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("Registro não encontrado");
			}
		}
		return $this->render_view("oficios/view.php", $record);
	}
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("agenda","data","destino","oficio","pauta","destinatario","andamento","observacoes","arquivos","adicionado_por");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'agenda' => 'numeric',
				'pauta' => 'required',
				'adicionado_por' => 'required',
			);
			$this->sanitize_array = array(
				'agenda' => 'sanitize_string',
				'data' => 'sanitize_string',
				'destino' => 'sanitize_string',
				'oficio' => 'sanitize_string',
				'pauta' => 'sanitize_string',
				'destinatario' => 'sanitize_string',
				'andamento' => 'sanitize_string',
				'arquivos' => 'sanitize_string',
				'adicionado_por' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['adicionado_em'] = datetime_now();
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Registro adicionado com sucesso", "success");
					return	$this->redirect("oficios");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Adicionar novo";
		$this->render_view("oficios/add.php");
	}
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("id","agenda","data","destino","oficio","pauta","destinatario","andamento","observacoes","arquivos","adicionado_por");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'agenda' => 'numeric',
				'pauta' => 'required',
				'adicionado_por' => 'required',
			);
			$this->sanitize_array = array(
				'agenda' => 'sanitize_string',
				'data' => 'sanitize_string',
				'destino' => 'sanitize_string',
				'oficio' => 'sanitize_string',
				'pauta' => 'sanitize_string',
				'destinatario' => 'sanitize_string',
				'andamento' => 'sanitize_string',
				'arquivos' => 'sanitize_string',
				'adicionado_por' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			$modeldata['atualizado_em'] = datetime_now();
			if($this->validated()){
				$db->where("oficios.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Registro atualizado com sucesso", "success");
					return $this->redirect("oficios");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$page_error = "Nenhum registro atualizado";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return	$this->redirect("oficios");
					}
				}
			}
		}
		$db->where("oficios.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Editar Oficios";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("oficios/edit.php", $data);
	}
	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
     * @return BaseView
     */
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("oficios.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Registro excluído com sucesso", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("oficios");
	}
}
