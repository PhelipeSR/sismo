<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departamento_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function addDepartamento($dados){

		if ($this->db->insert('departamento', $dados))
			return TRUE;
		else
			return FALSE;
	}

	function editDepartamento($dados,$id){
		$this->db->where('id', $id);
		if ($this->db->update('departamento',$dados)) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function deleteDepartamento($id) {

		$this->db->where('id', $id);
		if ($this->db->delete('departamento')) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
}