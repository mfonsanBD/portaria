url_site = window.location.protocol+'//'+window.location.host+'/portaria/';
// url_site = window.location.protocol+'//'+window.location.host+'/';

$(document).ready(function(){
	$("#login").on("submit", function(e){
		e.preventDefault();
		var usuario 	= $.trim($("#lusuario").val());
		var senha 		= $.trim($("#lsenha").val());
		var local 		= $.trim($("#llocal").val());

		if(usuario == '' && senha == '' && local == ''){
			swal({
				title: "Atenção!",
				text: "Para acessar sua conta digite seu nome de usuário, senha e a unidade que você está.",
				icon: "warning",
				buttons: {
					confirm: {
					    text: "Ok!",
					    value: true,
					    visible: true,
					    className: "bg-warning",
					    closeModal: true
					}
				}
			});
		}else if(usuario == '' && senha != '' && local != ''){
			swal({
				title: "Atenção!",
				text: "O NOME DE USUÁRIO é obrigatório.",
				icon: "warning",
				buttons: {
					confirm: {
					    text: "Ok, vou corrigir!",
					    value: true,
					    visible: true,
					    className: "bg-warning",
					    closeModal: true
					}
				}
			});
		}else if(usuario != '' && senha == '' && local != ''){
			swal({
				title: "Atenção!",
				text: "Sua SENHA é obrigatória.",
				icon: "warning",
				buttons: {
					confirm: {
					    text: "Ok, vou corrigir!",
					    value: true,
					    visible: true,
					    className: "bg-warning",
					    closeModal: true
					}
				}
			});
		}else if(usuario != '' && senha != '' && local == ''){
			swal({
				title: "Atenção!",
				text: "É obrigatória selecionar a unidade que você está.",
				icon: "warning",
				buttons: {
					confirm: {
					    text: "Ok, vou corrigir!",
					    value: true,
					    visible: true,
					    className: "bg-warning",
					    closeModal: true
					}
				}
			});
		}else{
			if(usuario != ''){
				$.ajax({
					url: url_site+'login/verificaLogin/',
					type: 'POST',
					data: {login:usuario},
					success: function(dados){
						if(dados == 1){
							if(senha != ''){
								$.ajax({
									url: url_site+'login/verificaSenhaLogin/',
									type: 'POST',
									data: {senha:senha, login:usuario},
									success: function(dados){
										if(dados == 1){
											$.ajax({
												url: url_site+'login/logar/',
												type: 'POST',
												data: {usuario:usuario, senha:senha, local:local},
												beforeSend: function() {
											        $("#carregando").show();
											    },
												success: function(logar){
													if(logar == 1){
														window.location.href = url_site+'painel/';
													}else if (logar == 2){
														window.location.href = url_site+'atendentes/';
													}else{
											        	$("#carregando").hide();
														swal({
															title: "Atenção!",
															text: "Houve algum problema em sua conta. Entre em contato com o administrador.",
															icon: "warning",
															buttons: {
																confirm: {
																    text: "Ok, vou corrigir!",
																    value: true,
																    visible: true,
																    className: "bg-warning",
																    closeModal: true
																}
															}
														});
													}
												}
											});
										}else{
											swal({
												title: "Atenção!",
												text: "Sua senha está incorreta.",
												icon: "warning",
												buttons: {
													confirm: {
													    text: "Ok, vou corrigir!",
													    value: true,
													    visible: true,
													    className: "bg-warning",
													    closeModal: true
													}
												}
											});
										}
									}
								});
							}
						}else{
							swal({
								title: "Atenção!",
								text: "Usuário não encontrado.",
								icon: "warning",
								buttons: {
									confirm: {
									    text: "Ok, vou corrigir!",
									    value: true,
									    visible: true,
									    className: "bg-warning",
									    closeModal: true
									}
								}
							});
						}
					}
				});
			}
		}
	});
});