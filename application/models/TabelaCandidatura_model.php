<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TabelaCandidatura_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	var $table        = 'candidatar';
	var $colunas      = array(
		'candidatar.id',
		'usuario.nome',
		'candidatar.cpf',
		'usuario.matricula',
		'candidatar.remunerada',
		'candidatar.agencia',
		'candidatar.conta',
		'candidatar.banco',
		'candidatar.status',
		'materia.nome AS materia',
		'monitorias.turma',
		'materia.codigo',
		'candidatar.usuario_id',
		'candidatar.monitorias_id',
	);
	var $order_column = array(
		null,
		'usuario.nome',
		'candidatar.cpf',
		'usuario.matricula',
		'candidatar.remunerada',
		'candidatar.status',
		'materia.nome AS materia',
		'monitorias.turma',
		'candidatar.agencia',
		'candidatar.conta',
		'candidatar.banco',
	);
	function consulta(){

		$this->db->select($this->colunas);
		$this->db->from($this->table);
		$this->db->join('usuario', 'candidatar.usuario_id = usuario.id','left');
		$this->db->join('monitorias', 'candidatar.monitorias_id = monitorias.id','left');
		$this->db->join('materia', 'monitorias.materia_codigo = materia.codigo','left');

		if (isset($_POST['search']['value'])) {
			$this->db
					->group_start()
						->like(    'candidatar.id',       $this->input->post('search',TRUE)['value'] )
						->or_like( 'usuario.nome',       $this->input->post('search',TRUE)['value'] )
						->or_like( 'candidatar.cpf',       $this->input->post('search',TRUE)['value'] )
						->or_like( 'usuario.matricula',       $this->input->post('search',TRUE)['value'] )
						->or_like( 'candidatar.remunerada',       $this->input->post('search',TRUE)['value'] )
						->or_like( 'candidatar.agencia',       $this->input->post('search',TRUE)['value'] )
						->or_like( 'candidatar.conta',       $this->input->post('search',TRUE)['value'] )
						->or_like( 'candidatar.banco',       $this->input->post('search',TRUE)['value'] )
						->or_like( 'candidatar.status',       $this->input->post('search',TRUE)['value'] )
						->or_like( 'materia.nome',       $this->input->post('search',TRUE)['value'] )
						->or_like( 'monitorias.turma',       $this->input->post('search',TRUE)['value'] )
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