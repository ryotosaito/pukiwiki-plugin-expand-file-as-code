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
		return "Argument not set.";
	}
	require_once "ref.inc.php";
	$page = $vars['page'] ?: '';
	$name = func_get_args()[0];
	$file = UPLOAD_DIR . encode($page) . '_' . encode($name);
	if (!file_exists($file))
	{
		return 'File not found: "' . $name . '" at page "' . $page . '"';
	}
	$html = "";
	$html .= "<details>\n";
	$html .= "  <summary>Source : " . plugin_ref_inline(func_get_args()[0]) . "</summary>\n";
	$html .= "  <pre><code>" . htmlspecialchars(file_get_contents($file)) . "</code></pre>\n";
	$html .= "</details>";
	return $html;
}
