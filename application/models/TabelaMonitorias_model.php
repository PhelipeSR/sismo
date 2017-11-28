<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TabelaMonitorias_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	var $table        = 'monitorias';
	var $colunas      = array('monitorias.id','monitorias.turma','monitorias.status','monitorias.materia_codigo','materia.nome');
	var $order_column = array(null           ,'monitorias.turma','monitorias.status','monitorias.materia_codigo',null);

	function consulta(){

		$this->db->select($this->colunas);
		$this->db->from($this->table);
		$this->db->join('materia', 'monitorias.materia_codigo = materia.codigo','left');

		if (isset($_POST['search']['value'])) {
			$this->db
					->group_start()
						->like(    'monitorias.id',       $this->input->post('search',TRUE)['value'] )
						->or_like( 'monitorias.turma',     $this->input->post('search',TRUE)['value'] )
						->or_like( 'monitorias.status',     $this->input->post('search',TRUE)['value'] )
						->or_like( 'monitorias.materia_codigo',$this->input->post('search',TRUE)['value'] )
					->group_end();
		}

		if ( $this->input->post('order',TRUE) ) {
			$this->db->order_by( $this->order_column[ $this->input->post('order',TRUE)['0']['column'] ], $this->input->post('order',TRUE)['0']['dir'] );
		}else{
			$this->db->order_by( 'id', 'DESC' );
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
		return $this->db->from($this->table)->count_all_results();
	}
}