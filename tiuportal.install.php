<?php
/**
 * Install script
 *
 * @package Cotonti
 * @version 0.9.0
 * @author Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2013
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL');

// Modules and plugins checked by default
$default_modules = array('index', 'page', 'users', 'rss', 'payments', 'products');
$default_plugins = array('ckeditor', 'cleaner', 'html', 'htmlpurifier', 'ipsearch', 'mcaptcha', 'news', 'search', 'mavatars', 'useragreement', 'usergroupselector', 'userimages');

$L['install_body_message1'] = "Добро пожаловать в скрипт установки Портала товаров и усгу (Tiuportal) от CMSWorks.ru<br/><br/>".$L['install_body_message1'];

function cot_install_step2_tags()
{
	global $t, $db_name;
	$db_x = "tiu_";
	
	$t->assign(array(
		'INSTALL_DB_X' => $db_x,
		'INSTALL_DB_X_INPUT' => cot_inputbox('text', 'db_x',  $db_x, 'size="32"'),	
		'INSTALL_DB_NAME_INPUT' => cot_inputbox('text', 'db_name',  is_null($db_name) ? 'tiuportal' : $db_name, 'size="32"'),
	));
}

function cot_install_step3_tags()
{
	global $t, $rtheme, $rscheme;

	$rtheme = 'tiuportal';
	$t->assign(array(
			'INSTALL_THEME_SELECT' => cot_selectbox_theme($rtheme, $rscheme, 'theme'),
	));
}

function cot_install_step3_setup()
{
	global $file;
	$config_contents = file_get_contents($file['config']);
	cot_install_config_replace($config_contents, 'admintheme', 'priori');
	file_put_contents($file['config'], $config_contents);
}