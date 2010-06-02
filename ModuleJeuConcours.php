<?php  
   
class ModuleJeuConcours extends Module  
{  

		/**
		 * Template
		 * @var string
		 */
		protected $strTemplate = 'mod_jeu_concours';

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

			// Send file to the browser
			if (strlen($this->Input->get('file', true)) && (in_array($this->Input->get('file', true), $this->pdfSingleSRC) || in_array(dirname($this->Input->get('file')), $this->pdfSingleSRC)))
			{
				$this->sendFileToBrowser($this->Input->get('file', true));
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
			
			if(isset($_POST['FORM_SUBMIT']))
			{
//				echo " POST effectué ";
				switch($_POST['FORM_SUBMIT'])
				{

					case "form_jeuConcours":
						//$this->Template->content = $this->processFormInfoClub();
						$this->processDonneesUtilisateur();
						//$this->processInscriptionJeu();
						break;
					
					case "xkn_form_jeu_end":
							$this->processInscriptionJeu();
							break;
				}
				return;
			}
  
				if($this->Session->get('participationjeux_'.$this->id) == 'second')
				{
					$GLOBALS['TL_HEAD'][] = '<script type="text/javascript" src="system/modules/xkn_ajax/js/ajaxDispatcher.js"></script>';
					$GLOBALS['TL_HEAD'][] = '<link media="screen" type="text/css" href="/plugins/formcheck/theme/red/formcheck.css" rel="stylesheet" />';
					$GLOBALS['TL_HEAD'][] = '<script type="text/javascript" src="/plugins/formcheck/lang/fr.js"> </script>';
					$GLOBALS['TL_HEAD'][] = '<script type="text/javascript" src="/plugins/formcheck/formcheck.js"> </script>';
					$GLOBALS['TL_HEAD'][] = '<script type="text/javascript">
			         window.addEvent(\'domready\', function(){
			          	var myCheck = new FormCheck(\'xkn_form_register_profil\', {

						'. $strFormCheck .'
			            display : {
			                scrollToFirst : true,
			                titlesInsteadNames:1,
			            	showErrors : 1
			             },
						submit:true

			       		})

			       		'.$strFormControls .'

			       		$$(\'a\').addEvent(\'click\', function(){return false;});	
						$(\'submit_jeu_end\').set({\'styles\': {\'display\': \'none\'}});

						ajaxDispatcher.inform = function (el,status)
						{
							$(\'submit_\' + el).set({\'styles\': {\'display\': \'none\'}});

							this.registered = this.registered.erase(el);
							if(this.registered.length==0)
							{
								$(\'submit_jeu_end\').set({\'styles\': {\'display\': \'block\'}});
							} 
						}



					});
				  	</script>
					';
					$_action = $this->Environment->url. $this->Environment->requestUri;

					$this->Template->content = '<form action="'.$_action.'" id="xkn_form_jeu_end" method="post" enctype="application/x-www-form-urlencoded">
			<input type="hidden" name="FORM_SUBMIT" value="xkn_form_jeu_end" />
			<div class="clear"></div><div style="float:right"><div class="submit_container"><input type="submit" class="submit" id="submit_jeu_end" value="Valider votre participation" /></div></div></form>';
					$this->Session->set('participationjeux_'.$this->id, 'final');

					return;
				} elseif ($this->Session->get('participationjeux_'.$this->id) == 'last') {
					$this->Template->content = "Merci de votre participation";
					$this->Session->set('participationjeux_'.$this->id, '');


					return;

				} else {
					$this->Session->set('participationjeux_'.$this->id, '');
			
					$already_played = $this->Database->prepare("select count(*) as played from tl_xkn_jeu_participation where pid = ? and id_participant = ? ")
																					 ->execute($this->xkn_id_game, $this->User->id);

					$played = ($already_played->played > 0)? 1 : 0;
					// si le client a deja joué au jeu on affiche le template deja joué
					if($played){
						$this->Template->action = $this->Environment->url. $this->Environment->requestUri;
						$_form = new FrontendTemplate('xkn_form_jeu_deja_joue');
						$_form->User = $this->User;
						$this->Template->content = $_form->parse();
					}
					else{
						$this->template = new FrontendTemplate('mod_jeu_concours');
			      $arrJeuConcours = array();  
			      $objJeux = $this->Database->prepare("SELECT * FROM tl_xkn_jeu_concours WHERE id = ? ORDER BY id")->execute($this->xkn_id_game);  
			 			
						$this->Template->User = $this->User;
						$this->Template->jeu = $objJeux;

						
						$_action = $this->Environment->url. $this->Environment->requestUri;
						$this->Template->action = $this->Environment->url. $this->Environment->requestUri;
						$_form = new FrontendTemplate('xkn_form_jeu_concours');
						$_form->User = $this->User;
						$this->Template->content = $_form->parse();
								$GLOBALS['TL_HEAD'][] = '<link media="screen" type="text/css" href="/plugins/formcheck/theme/red/formcheck.css" rel="stylesheet" />
						';
								$GLOBALS['TL_HEAD'][] = '<script type="text/javascript" src="/plugins/formcheck/lang/fr.js"> </script>';
								$GLOBALS['TL_HEAD'][] = '<script type="text/javascript" src="/plugins/formcheck/formcheck.js"> </script>';
						$GLOBALS['TL_HEAD'][] = '<script type="text/javascript">
				         window.addEvent(\'domready\', function(){
				          	var myCheck = new FormCheck(\'xkn_form_jeuConcours\', {

				            display : {
				                scrollToFirst : true,
				                titlesInsteadNames:1,
				            	showErrors : 1
				             },
							submit:true

				       		})

						});
					  	</script>';
						
					}
			 }
		}
		
		protected function processDonneesUtilisateur()
		{
			//$this->params = base64_encode(serialize(array('mod_id'=> $this->id, 'lang' => $GLOBALS['TL_LANGUAGE'])));

			$_param[] = array();
			
			$_param['title'] 			= isset($_POST['title']) ? $_POST['title'] : null;
			$_param['lastname'] 		= isset($_POST['lastname']) ? stripcslashes($_POST['lastname']) : null;
			$_param['firstname'] 		= isset($_POST['firstname']) ? stripcslashes($_POST['firstname']) : null;
			$_param['postal'] 			= isset($_POST['postal']) ? $_POST['postal'] : null;
			$_param['city'] 			= isset($_POST['city']) ? stripcslashes($_POST['city']) : null;
			$_param['country'] 			= isset($_POST['country']) ? $_POST['country'] : null;
			$_param['phone']			= isset($_POST['phone']) ? $_POST['phone'] : null;
			$_param['mobile']			= isset($_POST['mobile']) ? $_POST['mobile'] : null;
			$_param['email'] 			= isset($_POST['email']) ? $_POST['email'] : null;
			$_param['num_street']		= isset($_POST['num_street']) ? $_POST['num_street'] : null;
			$_param['street']			= isset($_POST['street']) ? stripcslashes($_POST['street']) : null;
			$_param['ext_street']		= isset($_POST['ext_street']) ? $_POST['ext_street'] : null;
			$_param['complt_street'] 	= isset($_POST['complt_street']) ? stripcslashes($_POST['complt_street']) : null;
			
			$this->import('FrontendUser', 'User');
		
			
			$UserData = $this->Database->prepare("update tl_member set title = ?, lastname = ?, firstname = ?, postal = ?, city = ?, country = ?
								, phone = ?, mobile = ?, email = ?, num_street = ?, street = ?, ext_street = ?, complt_street = ? where id=?")
								->execute(
									$_param['title'],
									$_param['lastname'],
									$_param['firstname'],
									$_param['postal'],
									$_param['city'],
									$_param['country'],
									$_param['phone'],
									$_param['mobile'],
									$_param['email'],
									$_param['num_street'],
									$_param['street'],
									$_param['ext_street'],
									$_param['complt_street'],
									$this->User->id);
									//echo $UserData->query;

									// Redirect to jumpTo page
									if (strlen($this->jumpTo))
									{
										$objNextPage = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
																	  ->limit(1)
																	  ->execute($this->jumpTo);
										$this->Session->set('participationjeux_'.$this->id, 'second');

										if ($objNextPage->numRows)
										{
											$this->redirect($this->generateFrontendUrl($objNextPage->fetchAssoc()));
										}
									}



		}
		protected function processInscriptionJeu()
		{
			//$this->params = base64_encode(serialize(array('mod_id'=> $this->id, 'lang' => $GLOBALS['TL_LANGUAGE'])));

			$_param[] = array();
		
			
			//var_dump($_param);
			$this->import('FrontendUser', 'User');

			$inscriptionJeu = $this->Database->prepare("insert into tl_xkn_jeu_participation (id, tstamp, pid, id_participant, date, reponse, upload) 
				value(?, ?, ?, ? , ?, ?, ?)")
				->execute("", time(), $this->xkn_id_game, $this->User->id, date("Y/m/d"), NULL, NULL );
				//echo $inscriptionJeu->query;
				// Redirect to jumpTo page
				if (strlen($this->xkn_jumpTo))
				{
					$objNextPage = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
												  ->limit(1)
												  ->execute($this->xkn_jumpTo);
					$this->Session->set('participationjeux_'.$this->id, 'last');

					if ($objNextPage->numRows)
					{
						$this->redirect($this->generateFrontendUrl($objNextPage->fetchAssoc()));
					}
				}


		}
			
}  
   
?>
