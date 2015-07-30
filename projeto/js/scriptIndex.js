function verificarNomeProjeto() {
    var nomeProjeto;
    nomeProjeto = document.getElementById("nomeProjeto").value;
    if (nomeProjeto === '') {
        var label = document.getElementById("labelNomeProjeto");
        jQuery('#labelNomeProjeto').addClass('label-danger').removeClass('label-default');
        document.getElementById("labelNomeProjeto").innerHTML = "Insira um nome válido!";
        if (document.getElementById("checkClasse").checked === true) {
            document.getElementById("classePrincipal").value = "";
        }
    } else {
        jQuery('#labelNomeProjeto').addClass('label-success').removeClass('label-danger');
        document.getElementById("labelNomeProjeto").innerHTML = "Nome do projeto:";
        if (document.getElementById("checkClasse").checked === true) {
            document.getElementById("classePrincipal").value = nomeProjeto + "/" + nomeProjeto;
        }
    }
    verificarClassePrincipal();
}

function verificarClassePrincipal() {
    var classePrincipal = document.getElementById("classePrincipal").value;
    if (document.getElementById("checkClasse").checked === true) {
        if (classePrincipal == '') {
            var label = document.getElementById("labelClassePrincipal");
            jQuery('#labelClassePrincipal').addClass('label-danger').removeClass('label-default');
        } else {
            jQuery('#labelClassePrincipal').addClass('label-success').removeClass('label-danger');
        }
    }else{
        
        jQuery('#labelClassePrincipal').addClass('label-default').removeClass('label-success');
        jQuery('#labelClassePrincipal').addClass('label-default').removeClass('label-danger');
         document.getElementById("classePrincipal").value = "";
    }

}

function gerarNomeAleatorio() {
    document.getElementById("nomeProjeto").value = "projeto" + Math.floor((Math.random() * 100) + 1);
    verificarNomeProjeto();
}
