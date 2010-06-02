<?php  
   
// Add a palette to tl_module  
$GLOBALS['TL_DCA']['tl_module']['palettes']['jeu_concours'] = 'name,type,headline;xkn_id_game,jumpTo,xkn_jumpTo;align,space,cssID';  
$GLOBALS['TL_DCA']['tl_module']['palettes']['jeu_concours_info'] = 'name,type,headline;xkn_id_game,xkn_template;align,space,cssID';  
   
$GLOBALS['TL_DCA']['tl_module']['fields']['xkn_id_game'] = array
(
	'label'         => &$GLOBALS['TL_LANG']['tl_module']['xkn_id_game'],
	'exclude'       => true,
	'inputType'     => 'select',
	'foreignKey'    => 'tl_xkn_jeu_concours.title',
	'eval'					=> array('mandatory'=>true),
);
?>