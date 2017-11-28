<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function listarUser() {
		$this->load->view('menu/listarUser');
	}
	public function listarChefe() {
		$this->load->view('menu/listarChefe');
	}
	public function listarFuncionario() {
		$this->load->view('menu/listarFuncionario');
	}
	public function listarCursos() {
		$this->load->view('menu/listarCursos');
	}
	public function listarDepartamentos() {
		$this->load->view('menu/listarDepartamentos');
	}
	public function listarMaterias() {
		$this->load->view('menu/listarMaterias');
	}
	public function listarMonitorias() {
		$this->load->view('menu/listarMonitorias');
	}
	public function listarCanditaturas() {
		$this->load->view('menu/listarCanditaturas');
	}
	public function listarGrupos() {
		$this->load->view('menu/listarGrupos');
	}
	public function chefeListarFuncionario() {
		$this->load->view('menu/chefeListarFuncionario');
	}
	public function chefeListarMaterias() {
		$this->load->view('menu/chefeListarMaterias');
	}
	public function chefeListarMonitorias() {
		$this->load->view('menu/chefeListarMonitorias');
	}
	public function chefeListarCanditaturas() {
		$this->load->view('menu/chefeListarCanditaturas');
	}
	public function chefePerfil() {
		$this->load->view('menu/chefePerfil');
	}
	public function usuarioPerfil() {
		$this->load->view('menu/usuarioPerfil');
	}
	public function listarMonitoriasUser() {
		$this->load->view('menu/listarMonitoriasUser');
	}
	public function candidatarMonitoria() {
		$this->load->view('menu/candidatarMonitoria');
	}
	public function listarMinhasMonitorias() {
		$this->load->view('menu/listarMinhasMonitorias');
	}
	public function montarGrupo() {
		$this->load->view('menu/montarGrupo');
	}
	public function listarMeusGrupos() {
		$this->load->view('menu/listarMeusGrupos');
	}
}
