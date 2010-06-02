<?php  
   
class ModuleJeuConcoursInfo extends Module  
{  		

		/**
		 * Template
		 * @var string
		 */
		protected $strTemplate = 'mod_jeu_concours_info';

		/**
		 * Display a wildcard in the back end
		 * @return string
		 */
		public function generate()
		{
			if (TL_MODE == 'BE')
			{
				$objTemplate = new BackendTemplate('be_wildcard');
				$objTemplate->wildcard = '### Jeu concours ###';

				return $objTemplate->parse();
			}

			return parent::generate();
		}


		/**
		 * Generate module
		 */
		protected function compile()
		{

			
			global $objPage;
			$this->import('FrontendUser', 'User');
			
						$this->Template = new FrontendTemplate($this->xkn_template);
			      $arrJeuConcours = array();  
			      $objJeux = $this->Database->prepare("SELECT * FROM tl_xkn_jeu_concours WHERE id = ? ORDER BY id")->execute($this->xkn_id_game);  

						$this->Template->jeu = $objJeux;
		}
		
}  
   
?>
