
<div id="status"></div> <!--aqui teremos um texto gerado pelo script para feedback-->
<p></p>

    <input type="text" name="texto" onkeydown="if(event.keyCode == 13) enviarDados();" onBlur="enviarDados()" id="input_field" size="100" >

<button onclick="carregarMicrofone()" style="border: 0; background-color:transparent">
    <img id="status_img" src="<?php print $mic; ?>" alt="Start"></button>
    <div><textarea id="Codigoarea" ><?php print $conteudo ?></textarea></div>
