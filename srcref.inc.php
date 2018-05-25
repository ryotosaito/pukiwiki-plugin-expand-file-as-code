<?php
// PukiWiki - Yet another WikiWikiWeb clone
// // $Id: srcref.inc.php $
// // Copyright (C)
// //   2018 Ryoto Saito
// // License: MIT
// //
// // Source code reference plugin
// // Include an attached source-file as a link and a preformatted-text
//
function plugin_srcref_convert()
{
	global $vars;
	if(!func_num_args())
	{
		return "";
	}
	$page = $vars['page'] ?: '';
	$name = func_get_args()[0];
	$file = UPLOAD_DIR . encode($page) . '_' . encode($name);
	$html = plugin_ref_inline(func_get_args()[0]);
	$html .= "<pre>".file_get_contents($file)."</pre>";
	return $html;
}
