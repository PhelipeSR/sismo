<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoria_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function addMonitoria($dados){

		if ($this->db->insert('monitorias', $dados))
			return TRUE;
		else
			return FALSE;
	}

	function editMonitoria($dados,$id){
		$this->db->where('id', $id);
		if ($this->db->update('monitorias',$dados)) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function deleteMonitoria($id) {

		$this->db->where('id', $id);
		if ($this->db->delete('monitorias')) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
}