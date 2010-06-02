<div>
  <!-- Affichage du module Jeu Concours
    <? //var_dump($this);?>
    <div>Titre : <? echo ($this->jeu->title); ?></div>
    <div>Sous titre : <? echo ($this->jeu->subtitle); ?></div>
    <div>Description : <? echo ($this->jeu->presentation); ?> </div>
    <div>Image presentation : <? echo ($this->jeu->img); ?>   <img src="<? echo $this->jeu->img; ?>"></div> 
    <div>Texte presentation presentation : <? echo ($this->jeu->explication_texte); ?> </div> 
    <div>Texte legal : <? echo ($this->jeu->legal); ?> </div> 
    <div>Pdf : <? echo ($this->jeu->pdfSingleSRC); ?> </div>  
    hello -->
</div>
<? echo $this->content; ?>