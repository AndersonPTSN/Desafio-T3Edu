function Verificar_Campos(){
	if(document.getElementById("nome").value == "" || document.getElementById("email").value == "" || document.getElementById("telefone").value == "" || document.getElementById("nivel_de_acesso").value == "" || document.getElementById("senha").value == ""){

		document.getElementById("form").action = "cadastro.html";
		alert('Um ou mais campos vazios, por favor preencher todos os campos adequadamente');
	}else{salvar();}
}

function Verificar_Campos_login(){
		if(document.getElementById("email").value == "" ||document.getElementById("senha").value == ""){

		document.getElementById("form").action = "index.html";
		alert('Um ou mais campos vazios, por favor preencher todos os campos adequadamente');
	}else{salvar();}
}