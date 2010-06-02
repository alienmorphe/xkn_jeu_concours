<div>
    <a href="javascript:void(0)" id="display">Extrait de règlement (voir)</a>
    <div id="legal" style="display:none">Legal : <? echo ($this->jeu->legal); ?></div>

  <a href="<? echo $this->jeu->pdfSingleSRC; ?>">
  <div>Pdf du reglement </div>
  </a>
</div>
<script type="text/javascript" charset="utf-8">
  var toggleDisplayLegal = function() { 
    if($('legal').getStyle('display') == "block"){
      $('legal').setStyle('display', 'none');
    }
    else if($('legal').getStyle('display') == "none"){
      $('legal').setStyle('display', 'block');
    }
  }
  
  $('display').addEvent('click', function(){
    toggleDisplayLegal();
  })
</script>