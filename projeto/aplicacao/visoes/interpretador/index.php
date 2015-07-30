<!DOCTYPE html>
<html lang="pt">
    <head>
        <?php
        require_once('visoes/cabecalho.php');
        require_once('linkscss.php');
        ?>	 
    </head>
    <body > <!--onload="carregarMicrofone()"-->
        <?php
        require_once('conteudo.php');
        require_once('rodape.php');
        require_once('linkjs.php');
        ?>	
    </body>


<script>
 
      var javaEditor = CodeMirror.fromTextArea(document.getElementById("Codigoarea"), {
        lineNumbers: true,
        matchBrackets: true,
        mode: "text/x-java"
      });
      var mac = CodeMirror.keyMap.default == CodeMirror.keyMap.macDefault;
      CodeMirror.keyMap.default[(mac ? "Cmd" : "Ctrl") + "-Space"] = "autocomplete";
      
    function carregarMicrofone(){
        reco.toggleStartStop();
    }
    var reco = new WebSpeechRecognition();
    reco.statusText('status');
    reco.statusImage('status_img');
    reco.finalResults('input_field');

    reco.onEnd = function () {
        if (reco.final_transcript != '') {
            var texto =document.getElementById('input_field').value;
            location.href = 'index.php?controle=Interpretador&acao=tratarSintaxe&texto='+texto;
        }
    };
    
</script>
</html>


