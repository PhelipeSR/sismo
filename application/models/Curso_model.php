<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function addCurso($dados){

		if ($this->db->insert('cursos', $dados))
			return TRUE;
		else
			return FALSE;
	}

	function editCurso($dados,$id){
		$this->db->where('id', $id);
		if ($this->db->update('cursos',$dados)) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function deleteCurso($id) {

		$this->db->where('id', $id);
		if ($this->db->delete('cursos')) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
}