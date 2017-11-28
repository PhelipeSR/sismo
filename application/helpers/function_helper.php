<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
	Verifica se o valor já está cadastrado no banco

 *	unique[usuarios.nome]
		retorna FALSE se o valor postado já estiver no campo nome da tabela usuarios

 *	unique[usuarios.nome.10]
		retorna FALSE se o valor postado já estiver no campo nome da tabela usuarios,
		desde que o id seja diferente de 10. Isso é útil quando for atualizar os dados

 *	unique[usuarios.nome.10:id_nome]
		retorna FALSE se o valor postado já estiver no campo nome da tabela usuarios,
		desde que o id_nome seja diferente de 10. Se não for passado o valor após o : será usado o id.
**/
if (!function_exists('unique')) {
	function unique($str = '', $field = ''){
		$ci =& get_instance();
		// $str = preg_replace('/[^A-Za-z0-9]/', '', (string) $str);
		$res = explode('.', $field, 3);

		$table	= $res[0];
		$column	= $res[1];

		$ci->db->select('COUNT(*) as total');
		$ci->db->where($column, $str);

		if( isset($res[2]) ) {
			$res2 = explode(':', $res[2], 2);
			$ignore_value = $res2[0];

			if( isset($res2[1]) )
				$ignore_field = $res2[1];
			else
				$ignore_field = 'id';

			$ci->db->where($ignore_field . ' !=', $ignore_value);
		}
		$total = $ci->db->get($table)->row()->total;
		$ci->form_validation->set_message('unique', '{field} já cadastrado');
		return ($total > 0) ? FALSE : TRUE;
	}
}

/**
 * Verifica se o cpf é válido e se já existe no banco de dados
**/

if (!function_exists('valida_cpf')) {
	function valida_cpf($cpf = ''){

		$ci = & get_instance();

		// Elimina possivel mascara
		$cpf = preg_replace('/[^0-9]/', '', (string) $cpf);

		// Verifica se nenhuma das sequências invalidas abaixo foi digitada
		if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
			$ci->form_validation->set_message('valida_cpf', 'O {field} é inválido');
			return FALSE;
		}else {
			for ($t = 9; $t < 11; $t++) {
				for ($d = 0, $c = 0; $c < $t; $c++)
					$d += $cpf{$c} * (($t + 1) - $c);
				$d = ((10 * $d) % 11) % 10;
				if ($cpf{$c} != $d){
					$ci->form_validation->set_message('valida_cpf', 'O {field} é inválido');
					return FALSE;
				}
			}
			return TRUE;
		}
	}
}

if (!function_exists('valida_telefone')) {
	function valida_telefone($tel = ''){
		$ci = & get_instance();
		if(!preg_match('/^\([0-9]{2}\) [0-9]{5}-[0-9]{4}$/', $tel)){
			$ci->form_validation->set_message('valida_telefone', 'O {field} é inválido');
			return FALSE;
		}else{
			return TRUE;
		}
	}
}
if (!function_exists('valida_matricula')) {
	function valida_matricula($tel = ''){
		$ci = & get_instance();
		if(!preg_match('/^[0-9]{2}\/[0-9]{7}$/', $tel)){
			$ci->form_validation->set_message('valida_matricula', 'A {field} é inválido');
			return FALSE;
		}else{
			return TRUE;
		}
	}
}

if (!function_exists('valida_cep')) {
	function valida_cep($cep = ''){
		$ci = & get_instance();
		if(!preg_match('/^\d{2}.\d{3}-\d{3}?$|^\d{5}-?\d{3}?$/', $cep)){
			$ci->form_validation->set_message('valida_cep', 'O {field} é inválido');
			return FALSE;
		}else{
			return TRUE;
		}
	}
}

if (!function_exists('valida_cnpj')) {
	function valida_cnpj($cnpj = ''){

		$ci = & get_instance();

		// Elimina possivel mascara
		$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

		// Valida tamanho
		if (strlen($cnpj) != 14)
			return false;

		if ($cnpj == "00000000000000" ||
	        $cnpj == "11111111111111" ||
	        $cnpj == "22222222222222" ||
	        $cnpj == "33333333333333" ||
	        $cnpj == "44444444444444" ||
	        $cnpj == "55555555555555" ||
	        $cnpj == "66666666666666" ||
	        $cnpj == "77777777777777" ||
	        $cnpj == "88888888888888" ||
	        $cnpj == "99999999999999")
        	return false;

		// Valida primeiro dígito verificador
		for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
			$soma += $cnpj{$i} * $j;
			$j = ($j == 2) ? 9 : $j - 1;
		}

		$resto = $soma % 11;
		if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
			return false;

		// Valida segundo dígito verificador
		for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
			$soma += $cnpj{$i} * $j;
			$j = ($j == 2) ? 9 : $j - 1;
		}
		$resto = $soma % 11;
		return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);

	}
}

if (!function_exists('gerarCaracteres')) {
	function gerarCaracteres($tamanho = 6) {

		$caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$retorno = '';
		$len = strlen($caracteres);
		for ($i = 1; $i <= $tamanho; $i++) {
			$rand = mt_rand(1, $len);
			$retorno .= $caracteres[$rand-1];
		}
		return $retorno;
	}
}

if (!function_exists('enviaEmail')) {
	function enviaEmail($id,$email) {
		$ci = & get_instance();

		$token = sha1(uniqid( mt_rand(), TRUE));
		$data_expirar = date('Y-m-d H:i:s', strtotime('+1 day'));
		$link['link'] = base_url()."reminder/atualizar/".$token;

		$ci->load->library('email');
		$ci->email->from('contato@sismo.com', 'SISMO');
		$ci->email->to($email);
		$ci->email->subject('Recuperação de senha - SISMO');
		$ci->email->message($ci->load->view('email',$link,TRUE));

		if ($ci->email->send()) {
			$dados = array(
				'data_expiracao' => $data_expirar,
				'token'          => $token,
				'usuario_id'     => $id
			);
			//varifica se o usuário já está na tabela de recuperação
			$ci->db->where('usuario_id', $id );
			$ci->db->delete('recuperacao');
			//Adiciona as informações de recuperação no banco
			$ci->db->insert('recuperacao', $dados);
			return TRUE;
		}else{
			return FALSE;
		}
	}
}

if (!function_exists('contatoUser')) {
	function contatoUser($dados) {
		$ci = & get_instance();
		$ci->load->library('email');
		$ci->email->from($dados['email'], $dados['nome']);
		$ci->email->to('phelipeuni@gmail.com');
		$ci->email->subject('Contato - '.$dados['nome']);
		$ci->email->message($dados['conteudo']);

		if ($ci->email->send()) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
}