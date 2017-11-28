<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materia_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function addMateria($dados){

		if ($this->db->insert('materia', $dados))
			return TRUE;
		else
			return FALSE;
	}

	function editMateria($dados,$codigo){
		$this->db->where('codigo', $codigo);
		if ($this->db->update('materia',$dados)) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function deleteMateria($codigo) {

		$this->db->where('codigo', $codigo);
		if ($this->db->delete('materia')) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
}