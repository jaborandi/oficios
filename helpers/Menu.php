<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbartopleft = array(
		array(
			'path' => 'home', 
			'label' => 'Painel', 
			'icon' => ''
		),
		
		array(
			'path' => 'oficios', 
			'label' => 'Oficios', 
			'icon' => ''
		),
		
		array(
			'path' => 'contatos', 
			'label' => 'Contatos', 
			'icon' => ''
		)
	);
		
	
	
			public static $andamento = array(
		array(
			"value" => "OFICIO ENTREGUE", 
			"label" => "Ofício Entregue", 
		),
		array(
			"value" => "PROJETO EM ANDAMENTO", 
			"label" => "Projeto em Andamento", 
		),
		array(
			"value" => "FINALIZADO", 
			"label" => "Finalizado", 
		),
		array(
			"value" => "CANCELADO", 
			"label" => "Cancelado", 
		),
		array(
			"value" => "SEM PROTOCOLO", 
			"label" => "Voltou Sem Protocolo", 
		),);
		
}