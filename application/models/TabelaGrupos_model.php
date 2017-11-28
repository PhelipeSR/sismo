<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TabelaGrupos_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	var $table        = 'grupo_estudo';
	var $colunas      = array(
		'grupo_estudo.id',
		'grupo_estudo.nome',
		'grupo_estudo.horario',
		'grupo_estudo.quantidade_pessoas',
		'grupo_estudo.descricao',
		'usuario.nome AS usuario',
		'usuario.matricula',
		'materia.nome AS materia',
		'materia.codigo',
		'usuario.id AS user_id',
	);
	var $order_column = array(
		null,
		'grupo_estudo.nome',
		'grupo_estudo.horario',
		'grupo_estudo.quantidade_pessoas',
		'grupo_estudo.descricao',
		'usuario.nome',
		'usuario.matricula',
		'materia.nome',
	);
	function consulta(){
		$this->db->select($this->colunas);
		$this->db->from($this->table);
		$this->db->join('usuario', 'grupo_estudo.usuario_id = usuario.id','left');
		$this->db->join('materia', 'grupo_estudo.materia_codigo = materia.codigo','left');
		if (isset($_POST['search']['value'])) {
			$this->db
					->group_start()
						->like(    'grupo_estudo.id',                 $this->input->post('search',TRUE)['value'] )
						->or_like( 'grupo_estudo.nome',               $this->input->post('search',TRUE)['value'] )
						->or_like( 'grupo_estudo.horario',            $this->input->post('search',TRUE)['value'] )
						->or_like( 'grupo_estudo.quantidade_pessoas', $this->input->post('search',TRUE)['value'] )
						->or_like( 'grupo_estudo.descricao',          $this->input->post('search',TRUE)['value'] )
						->or_like( 'usuario.nome',                    $this->input->post('search',TRUE)['value'] )
						->or_like( 'usuario.matricula',               $this->input->post('search',TRUE)['value'] )
						->or_like( 'materia.nome',                    $this->input->post('search',TRUE)['value'] )
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