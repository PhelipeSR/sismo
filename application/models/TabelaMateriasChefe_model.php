<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TabelaMateriasChefe_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	var $table        = 'materia';
	var $colunas      = array('materia.codigo','materia.nome');
	var $order_column = array('materia.codigo','materia.nome');

	function consulta(){

		$this->db->select($this->colunas);
		$this->db->from($this->table);
		$this->db->where('departamento_id', $this->session->departamento);

		if (isset($_POST['search']['value'])) {
			$this->db
					->group_start()
						->like(    'materia.codigo',   $this->input->post('search',TRUE)['value'] )
						->or_like( 'materia.nome',     $this->input->post('search',TRUE)['value'] )
					->group_end();
		}

		if ( $this->input->post('order',TRUE) ) {
			$this->db->order_by( $this->order_column[ $this->input->post('order',TRUE)['0']['column'] ], $this->input->post('order',TRUE)['0']['dir'] );
		}else{
			$this->db->order_by( 'codigo', 'DESC' );
		}
	}

	function datatable(){
		if ( $this->input->post( 'length',TRUE) != -1) {
			$this->db->limit( $this->input->post( 'length',TRUE), $this->input->post('start',TRUE) );
		}
		$this->consulta();
		return $this->db->get()->result();
	}

	function dados_filtrados(){
		$this->consulta();
		return $this->db->get()->num_rows();
	}

	function dados_completos(){
		return $this->db->from($this->table)->where('departamento_id', $this->session->departamento)->count_all_results();
	}
}