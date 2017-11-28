<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TabelaCursos_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	var $table        = 'cursos	';
	var $colunas      = array('id','modalidade','codigo','denominacao','turno');
	var $order_column = array(null,'modalidade','codigo','denominacao','turno');

	function consulta(){

		$this->db->select($this->colunas);
		$this->db->from($this->table);

		if (isset($_POST['search']['value'])) {
			$this->db
					->group_start()
						->like(    'id',          $this->input->post('search',TRUE)['value'] )
						->or_like( 'modalidade',  $this->input->post('search',TRUE)['value'] )
						->or_like( 'codigo',      $this->input->post('search',TRUE)['value'] )
						->or_like( 'denominacao', $this->input->post('search',TRUE)['value'] )
						->or_like( 'turno',       $this->input->post('search',TRUE)['value'] )
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