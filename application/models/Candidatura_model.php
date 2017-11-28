<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidatura_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function addCandidatura($dados){

		if ($this->db->insert('candidatar', $dados))
			return TRUE;
		else
			return FALSE;
	}

	function editCandidatura($dados,$id){
		$this->db->where('id', $id);
		if ($this->db->update('candidatar',$dados)) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function deleteCandidatura($id) {

		$this->db->where('id', $id);
		if ($this->db->delete('candidatar')) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
}