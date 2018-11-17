$(document).ready(function(){
	//quando clicar no botao de id bt-login
   $("#login-button").click(function(){
	//metodo post, envia dados para loginCliente.php 
	$.post("../models/login.php", 
	//parametros para o post
	{
		email: $("#login-email").val(), 
		senha: $("#login-senha").val()
	}, 
	//funcao de retorno   
	function(data){
			if(data == 1){
				window.location = 'painel.php';
            }else
                window.location = 'index-login.php';
	});
   });
});