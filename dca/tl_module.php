<?php  
   
// Add a palette to tl_module  
$GLOBALS['TL_DCA']['tl_module']['palettes']['jeu_concours'] = 'name,type,headline;xkn_id_game,jumpTo,xkn_mkg_attributes,xkn_jumpTo;align,space,cssID';  
$GLOBALS['TL_DCA']['tl_module']['palettes']['jeu_concours_info'] = 'name,type,headline;xkn_id_game,xkn_template,;align,space,cssID';  
   
$GLOBALS['TL_DCA']['tl_module']['fields']['xkn_id_game'] = array
(
	'label'         => &$GLOBALS['TL_LANG']['tl_module']['xkn_id_game'],
	'exclude'       => true,
	'inputType'     => 'select',
	'foreignKey'    => 'tl_xkn_jeu_concours.title',
	'eval'					=> array('mandatory'=>true),
);


// Adding Marketing Attributes if extension is installed
if($GLOBALS['XKN_MODULES']['XKN_MKG_ATTRIBUTES']['installed'])
{ 
	$GLOBALS['TL_DCA']['tl_module']['fields']['xkn_mkg_attributes'] = array
	(
		'label'         => &$GLOBALS['TL_LANG']['tl_module']['xkn_id_game'],
		'exclude'       => true,
		'inputType'     => 'checkboxWizard',
		'foreignKey'    => 'tl_xkn_mkg_attribute_groups.name',
		'eval'			=> array('multiple'=>true, 'mandatory'=>true),
	);
}					



?>