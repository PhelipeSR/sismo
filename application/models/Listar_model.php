<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listar_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function listarMaterias($departamento){

		$this->db->select('codigo,nome');
		$this->db->where( 'departamento_id',$departamento );
		$query = $this->db->get('materia');
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	}
	function listarMonitorias($materia){

		$this->db->select('turma,id');
		$this->db->where( 'materia_codigo',$materia );
		$query = $this->db->get('monitorias');
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	}
	function listarMonitores($monitoria){

		$this->db->select('usuario.email,usuario.nome');
		$this->db->where( 'candidatar.status', '1');
		$this->db->where( 'candidatar.monitorias_id', $monitoria);
		$this->db->join('usuario', 'candidatar.usuario_id = usuario.id');

		$query = $this->db->get('candidatar');
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	}
}