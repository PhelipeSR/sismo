<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Grupo_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function addCandidatura($dados){
		if ($this->db->insert('grupo_estudo', $dados))
			return TRUE;
		else
			return FALSE;
	}
	function editCandidatura($dados,$id){
		$this->db->where('id', $id);
		if ($this->db->update('grupo_estudo',$dados)) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function deleteCandidatura($id) {
		$this->db->where('id', $id);
		if ($this->db->delete('grupo_estudo')) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
}