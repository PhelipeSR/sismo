<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TabelaUsuario_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	var $table        = 'usuario';
	var $colunas      = array('usuario.id','usuario.nome','usuario.matricula','usuario.email','cursos.denominacao AS curso','usuario.telefone','usuario.privilegio','cursos.codigo');
	var $order_column = array(null,        'usuario.nome','usuario.matricula','usuario.email','cursos.denominacao',         'usuario.telefone', null,                null);

	function consulta(){

		$this->db->select($this->colunas);
		$this->db->from($this->table);
		$this->db->where('privilegio', '0');
		$this->db->join('cursos', 'usuario.curso = cursos.codigo','left');

		if (isset($_POST['search']['value'])) {
			$this->db
					->group_start()
						->like(    'usuario.id',       $this->input->post('search',TRUE)['value'] )
						->or_like( 'usuario.nome',     $this->input->post('search',TRUE)['value'] )
						->or_like( 'usuario.matricula',$this->input->post('search',TRUE)['value'] )
						->or_like( 'usuario.email',    $this->input->post('search',TRUE)['value'] )
						->or_like( 'cursos.denominacao',$this->input->post('search',TRUE)['value'] )
						->or_like( 'usuario.telefone', $this->input->post('search',TRUE)['value'] )
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
		return $this->db->from($this->table)->where('privilegio', '0')->count_all_results();
	}
}