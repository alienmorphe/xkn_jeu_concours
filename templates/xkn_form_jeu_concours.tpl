
<form action="<?php echo $this->action; ?>" id="xkn_form_jeuConcours" method="post" name="FormRelation">
<input type="hidden" name="FORM_SUBMIT" value="form_jeuConcours" />

    <div class="TestDriveLeft">
        <div class="title">Vos Coordonn&eacute;es</div>

        <div class="formbody">
    		<div class="box">
    			
    			<div class="item"><label for="ctrl_title" class="mandatory">Civilit&eacute;<span class="mandatory">*</span></label><select class="validate['required']" id="ctrl_title" name="title"><option value="">Choisissez...</option><option value="1" <?php echo $this->User->title == '1' ? 'selected="selected"' : ''; ?>>M.</option><option value="2" <?php echo $this->User->title == '2' ? 'selected="selected"' : ''; ?>>Mme</option><option value="3" <?php echo $this->User->title == '3' ? 'selected="selected"' : ''; ?>>Mlle</option></select></div>
    			<div class="item"><label for="ctrl_lastname" class="mandatory">Nom<span class="mandatory">*</span></label><input type="text" name="lastname" id="ctrl_lastname" class="text validate['required']" value="{{user::lastname}}" /></div>
    			<div class="item"><label for="ctrl_firstname" class="mandatory">Pr&eacute;nom<span class="mandatory">*</span></label><input type="text" name="firstname" id="ctrl_firstname" class="text validate['required']" value="{{user::firstname}}" /></div>
    			<div class="item"><label for="ctrl_email" class="mandatory">Email<span class="mandatory">*</span></label><input type="text" name="email" id="ctrl_email" title="Email" class="text validate['required','email']" value="{{user::email}}" /></div>
    			<div class="item"><label for="ctrl_num_street" class="mandatory">Num&eacute;ro de voie<span class="mandatory">*</span></label><input type="text" name="num_street" id="ctrl_num_street" class="text validate['required']" value="{{user::num_street}}" /></div>
    			<div class="item"><label for="ctrl_ext_street" class="mandatory">Extension<span class="mandatory">*</span></label><select class="validate['required']" id="ctrl_ext_street" name="ext_street"><option value="">Choisissez...</option><option value="" <?php echo $this->User->ext_street == '' ? 'selected="selected"' : ''; ?>></option><option value="BIS" <?php echo $this->User->ext_street == 'BIS' ? 'selected="selected"' : ''; ?>>BIS</option><option value="TER" <?php echo $this->User->ext_street == 'TER' ? 'selected="selected"' : ''; ?>>TER</option></select></div>
    			<div class="item"><label for="ctrl_street" class="mandatory">Adresse<span class="mandatory">*</span></label><input type="text" name="street" id="ctrl_streete" class="text validate['required']" value="{{user::street}}" /></div>
    			<div class="item"><label for="ctrl_complt_street" class="">Compl&eacute;ment d'adresse</label><input type="text" name="complt_street" id="ctrl_complt_street" class="text" value="{{user::complt_street}}" /></div>
    			<div class="item"><label for="ctrl_postal" class="mandatory">Code postal<span class="mandatory">*</span></label><input type="text" name="postal" id="ctrl_postal" class="text validate['required','digit']" value="{{user::postal}}" /></div>
    			<div class="item"><label for="ctrl_city" class="mandatory">Ville<span class="mandatory">*</span></label><input type="text" name="city" id="ctrl_city" class="text validate['required']" value="{{user::city}}" /></div>
    			<div class="item"><label for="ctrl_phone" class="mandatory">T&eacute;l&eacute;phone fixe<span class="mandatory">*</span></label><input type="text" name="phone" id="ctrl_phone" class="text validate['required']" value="{{user::phone}}" onblur="checkFields();" onchange="checkFields();"/></div>
    			<div class="item"><label for="ctrl_mobile" class="mandatory">ou T&eacute;l&eacute;phone mobile<span class="mandatory">*</span></label><input type="text" name="mobile" id="ctrl_mobile" class="text validate['required']" value="{{user::phone}}"  onblur="checkFields();" onchange="checkFields();"/></div>
    		</div>
        </div><!-- fin formbody -->
        
    </div><!-- fin Left -->



    <div class="clear"></div>
    <span class="mandatory">*</span> Champs obligatoires
    
    <div class="submit_container"><input name="Submit" value="S'inscrire" type="Submit" class="submit" ></div>
    
    
		
</form>