

function escreve_alerta_categoria(){

    alert("Categoria Inserida Com Sucesso!"); // FUNCTION REFERENTE AO BOTÃO DE CRIAR CATEGORIA 

}

function escreve_alerta_prioridade(){

    alert("Prioridade Inserida Com Sucesso!"); // FUNCTION REFERENTE AO BOTÃO DE CRIAR PRIORIDADE 

}

function escreve_alerta_status(){

    alert("Status Inserido Com Sucesso!"); // FUNCTION REFERENTE AO BOTÃO DE CRIAR STATUS 

}

function escreve_alerta_cargo(){

    alert("Cargo Inserido Com Sucesso!"); // FUNCTION REFERENTE AO BOTÃO DE CRIAR CARGO 

}

function escreve_alerta_chamado(){

    alert("Chamado Criado Com Sucesso!");  // FUNCTION REFERENTE AO BOTÃO DE CRIAR CHAMADO 

}

function escreve_alerta_chamado_editado(){

    alert("Editado Com Sucesso!");  // FUNCTION REFERENTE AO BOTÃO DE EDITAR CHAMADO 

}




//////////////////////////////////////// parte para criar uma mascara para o input telefone /////////////////////////////////////////////////////////

document.addEventListener("DOMContentLoaded", function() { // para executar somente quando a pagina carregar 
    
    var inputTelefone = document.getElementById("telefone"); // Obtém a referência para o input

    
    inputTelefone.addEventListener("input", function() { // Adiciona um ouvinte de evento de entrada para o input
        
        var valor = inputTelefone.value; // Obtém o valor atual do input

        
        var valorNumerico = valor.replace(/\D/g, ""); // Remove qualquer caractere não numérico

        
        if (valorNumerico.length > 0) {// Verifica se o valor numérico não está vazio
            
            valorNumerico = "(" + valorNumerico.substring(0, 2) + ")" + valorNumerico.substring(2, 7) + "-" + valorNumerico.substring(7, 11); } // Formata o número 
                            
        inputTelefone.value = valorNumerico; // Atualiza o valor do input com a versão formatada
    });
});