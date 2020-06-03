url_site = window.location.protocol+'//'+window.location.host+'/portaria/';
// url_site = window.location.protocol+'//'+window.location.host+'/';

$(document).ready(function(){
	//Controle do administrador sobre: Atendentes
	$('#addU').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget);
		var id = button.data('id');
		var nome = button.data('nome');
		var modal = $(this);

		modal.find('.modal-title').text('Adicionar Atendente!');

		$("#adicionarUsuario").on("click", function(e){
			e.preventDefault();
			var nome 		= $("#nomea").val();
			var login 		= $("#logina").val();
			var matricula	= $("#matriculaa").val();
			var senha 		= $("#senhaa").val();
			var csenha 		= $("#csenhaa").val();

			if(nome == ''){
				swal({
					title: "Atenção!",
					text: "O campo NOME é obrigatório.",
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
			else if(!isNaN(nome)){
				swal({
					title: "Atenção!",
					text: "O campo NOME não permite números.",
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
			else if(nome.length < 3){
				swal({
					title: "Atenção!",
					text: "O campo NOME deve conter pelo menos 3 caracteres.",
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
			else if(login == ''){
				swal({
					title: "Atenção!",
					text: "O campo LOGIN é obrigatório.",
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
			else if(login.length < 3){
				swal({
					title: "Atenção!",
					text: "O campo LOGIN deve conter pelo menos 3 caracteres.",
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
			else if(matricula == ''){
				swal({
					title: "Atenção!",
					text: "O campo MATRICULA é obrigatório.",
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
			else if(senha == ''){
				swal({
					title: "Atenção!",
					text: "O campo SENHA é obrigatório.",
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
			else if(csenha == ''){
				swal({
					title: "Atenção!",
					text: "O campo COMFIRMAR SENHA é obrigatório.",
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
			else if(csenha != senha){
				swal({
					title: "Atenção!",
					text: "As senhas não coincidem.",
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
				$.ajax({
					url: url_site+'login/verificaLogin/',
					type: 'POST',
					data: {login:login},
					success: function(dados){
						if(dados == "1"){
							swal({
								title: "Atenção!",
								text: "O login que você digitou já consta no sistema.",
								icon: "warning",
								buttons: {
									confirm: {
									    text: "Ok, vou trocar!",
									    value: true,
									    visible: true,
									    className: "bg-warning",
									    closeModal: true
									}
								}
							});
						}else{
							$.ajax({
								url: url_site+'atendentes/adminAddU/',
								type: 'POST',
								data: {nome:nome, login:login, matricula:matricula, senha:senha},
								success: function(dados){
									if(dados == 1){
										swal({
											title: "Parabéns!", 
											text: "Atendente adicionado com sucesso!", 
											icon: "success",
											buttons: {
												confirm: {
												    text: "Obrigado! 🙌🏼",
												    value: true,
												    visible: true,
												    className: "bg-success",
												    closeModal: true
												}
											}
										})
										.then((resposta) => {
											$('#addU').modal('hide');
											window.location.reload();
										});
									}else{
										swal({
											title: "Erro!", 
											text: "O Atendente não pôde ser adicionado.", 
											icon: "error",
											buttons: {
												confirm: {
												    text: "Ok",
												    value: true,
												    visible: true,
												    className: "bg-danger",
												    closeModal: true
												}
											}
										})
										.then((resposta) => {
											$('#addU').modal('hide');
										});
									};
								}
							});
							$("#adicionaUsuario")[0].reset();
						}
					}
				});
			}
		});
		$("#cancela").on("click", function(){
			$("#adicionaUsuario")[0].reset();
		});
	});
	$('#modalEdUs').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget);
		var id = button.data('id');
		var nome = button.data('nome');
		var modal = $(this);

		modal.find('.modal-title').text('Editar a senha de: '+nome);

		$("#salvarAlteracoes").on("click", function(){
		  	var novaSenha = $("#nsenha").val();
		  	var cNovaSenha = $("#cnsenha").val();

			if(novaSenha == '' && cNovaSenha == ''){
				swal({
					title: "Atenção!",
					text: "Os campos não podem estar vazios.",
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
				if(novaSenha != cNovaSenha){
					swal({
						title: "Atenção!",
						text: "As senhas não coincidem.",
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
					$.ajax({
						url: url_site+'atendentes/adminEdita',
						type: 'POST',
						data: {senha:novaSenha, id:id},
						success: function(dados){
							if(dados == 1){
								swal({
									title: "Parabéns!", 
									text: "Senha alterada com sucesso!", 
									icon: "success",
									buttons: {
										confirm: {
										    text: "Obrigado! 🙌🏼",
										    value: true,
										    visible: true,
										    className: "bg-success",
										    closeModal: true
										}
									}
								})
								.then((resposta) => {
									$('#modalEdUs').modal('hide');
								});
							}else{
								swal({
									title: "Erro!", 
									text: "A senha não pôde ser alterada.", 
									icon: "error",
									buttons: {
										confirm: {
										    text: "Ok",
										    value: true,
										    visible: true,
										    className: "bg-danger",
										    closeModal: true
										}
									}
								})
								.then((resposta) => {
									$('#modalEdUs').modal('hide');
								});
							}
							$("#editaSU")[0].reset();
						}
					});
				}
			}
		});
	});
	$('#modalExUs').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget);
		var id = button.data('id');
		var nome = button.data('nome');
		var modal = $(this);

		modal.find('.modal-title').text('Excluir Atendente!');
		modal.find('.texto-confirmacao').html("Tem certeza que deseja excluir <span class=text-danger>'"+nome+"'</span>?");

		$("#excluirSU").on("click", function(){
			$.ajax({
				url: url_site+'atendentes/adminExcluiU',
				type: 'POST',
				data: {id:id},
				success: function(dados){
					if(dados == 1){
						swal({
							title: "Parabéns!", 
							text: "Atendente excluído com sucesso!", 
							icon: "success",
							buttons: {
								confirm: {
								    text: "Obrigado! 🙌🏼",
								    value: true,
								    visible: true,
								    className: "bg-success",
								    closeModal: true
								}
							}
						})
						.then((resposta) => {
							$('#modalExUs').modal('hide');
							window.location.reload();
						});
					}else{
						swal({
							title: "Erro!", 
							text: "Atendente não pôde ser excluído.", 
							icon: "error",
							buttons: {
								confirm: {
								    text: "Ok",
								    value: true,
								    visible: true,
								    className: "bg-danger",
								    closeModal: true
								}
							}
						})
						.then((resposta) => {
							$('#modalExUs').modal('hide');
						});
					}
				}
			});
		});
	});

	//Controle do administrador sobre: Locais
	$('#addL').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget);
		var id = button.data('id');
		var nome = button.data('nome');
		var modal = $(this);

		modal.find('.modal-title').text('Adicionar Local!');

		$("#add").on("click", function(e){
			e.preventDefault();
			var nome 		= $("#nomeal").val();
			var telefone	= $("#telefoneal").val();
			var endereco	= $("#enderecoal").val();
			var responsavel	= $("#responsavelal").val();

			if(nome == ''){
				swal({
					title: "Atenção!",
					text: "O campo NOME DO LOCAL é obrigatório.",
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
			else if(nome.length < 3){
				swal({
					title: "Atenção!",
					text: "O campo NOME DO LOCAL deve conter pelo menos 3 caracteres.",
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
			else if(telefone == ''){
				swal({
					title: "Atenção!",
					text: "O campo TELEFONE DO LOCAL é obrigatório.",
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
			else if(endereco == ''){
				swal({
					title: "Atenção!",
					text: "O campo ENDEREÇO DO LOCAL é obrigatório.",
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
			else if(responsavel == ''){
				swal({
					title: "Atenção!",
					text: "O campo RESPONSÁVEL é obrigatório.",
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
			else{
				$.ajax({
					url: url_site+'locais/addLocais/',
					type: 'POST',
					data: {nome:nome, telefone:telefone, endereco:endereco, responsavel:responsavel},
					success: function(dados){
						if(dados == 1){
							swal({
								title: "Parabéns!", 
								text: "Local adicionado com sucesso!", 
								icon: "success",
								buttons: {
									confirm: {
									    text: "Obrigado! 🙌🏼",
									    value: true,
									    visible: true,
									    className: "bg-success",
									    closeModal: true
									}
								}
							})
							.then((resposta) => {
								$('#addL').modal('hide');
								window.location.reload();
							});
						}else{
							swal({
								title: "Erro!", 
								text: "O local não pôde ser adicionado.", 
								icon: "error",
								buttons: {
									confirm: {
									    text: "Ok",
									    value: true,
									    visible: true,
									    className: "bg-danger",
									    closeModal: true
									}
								}
							})
							.then((resposta) => {
								$('#addL').modal('hide');
							});
						};
					}
				});
				$("#adcL")[0].reset();
			}
		});
		$("#cancela").on("click", function(){
			$("#adcL")[0].reset();
		});
	});
	$('#modalEdL').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget);
		var id = button.data('id');
		var nome_local = button.data('nome');
		var telefone_local = button.data('telefone');
		var endereco_local = button.data('endereco');
		var responsavel_local = button.data('responsavel');
		var modal = $(this);

		$("#nomel").attr("placeholder", nome_local);
		$("#telefonel").attr("placeholder", telefone_local);
		$("#enderecol").attr("placeholder", endereco_local);
		$("#responsavell").attr("placeholder", responsavel_local);

		modal.find('.modal-title').text('Editar: '+nome_local);

		$("#salvaAlteracoes").on("click", function(e){
			e.preventDefault();
			var nome 		= $("#nomel").val();
			var telefone	= $("#telefonel").val();
			var endereco	= $("#enderecol").val();
			var responsavel	= $("#responsavell").val();

			if(nome == ''){
				nome = nome_local;
			}
			if(telefone == ''){
				telefone = telefone_local;
			}
			if(endereco == ''){
				endereco = endereco_local;
			}
			if(responsavel == ''){
				responsavel = responsavel_local;
			}

			$.ajax({
				url: url_site+'locais/verificaCampos',
				data: {id:id},
				type: 'POST',
				dataType: 'json',
				success: function(dados){
					if(dados.nome != nome && dados.telefone != telefone && dados.endereco != endereco && dados.responsavel != responsavel){
						$.ajax({
							url: url_site+'locais/adminEditaL',
							type: 'POST',
							data: {nome:nome, telefone:telefone, endereco:endereco, responsavel:responsavel},
							success: function(dados){
								if(dados == "1"){
									swal({
										title: "Parabéns!", 
										text: "Dados alterados com sucesso.",
										icon: "success",
										buttons: {
											confirm: {
											    text: "Obrigado! 🙌🏼",
											    value: true,
											    visible: true,
											    className: "bg-success",
											    closeModal: true
											}
										}
									})
									.then((resposta) => {
										window.location.reload();
									});
								}
							}
						});
					}else{
						if(dados.nome == nome && dados.telefone == telefone && dados.endereco == endereco && dados.responsavel == responsavel){
							swal({
								title: "Atenção!",
								text: "Todas as informações são atuais.",
								icon: "warning",
								buttons: {
									confirm: {
									    text: "Ok, obrigado!",
									    value: true,
									    visible: true,
									    className: "bg-warning",
									    closeModal: true
									}
								}
							});
						}else{
							if(dados.nome != nome && dados.telefone == telefone && dados.endereco == endereco && dados.responsavel == responsavel){
								$.ajax({
									url: url_site+'locais/alteraNome',
									type: 'POST',
									data: {nome:nome, id:id},
									success: function(nome){
										if(nome == "1"){
											swal({
												title: "Parabéns!", 
												text: "Nome do local alterado com sucesso.",
												icon: "success",
												buttons: {
													confirm: {
													    text: "Obrigado! 🙌🏼",
													    value: true,
													    visible: true,
													    className: "bg-success",
													    closeModal: true
													}
												}
											})
											.then((resposta) => {
												window.location.reload();
											});
										}
									}
								});
							}
							else if(dados.nome == nome && dados.telefone != telefone && dados.endereco == endereco && dados.responsavel == responsavel){
								$.ajax({
									url: url_site+'locais/alteraTelefone',
									type: 'POST',
									data: {telefone:telefone, id:id},
									success: function(telefone){
										if(telefone == "1"){
											swal({
												title: "Parabéns!", 
												text: "Telefone do local alterado com sucesso.",
												icon: "success",
												buttons: {
													confirm: {
													    text: "Obrigado! 🙌🏼",
													    value: true,
													    visible: true,
													    className: "bg-success",
													    closeModal: true
													}
												}
											})
											.then((resposta) => {
												window.location.reload();
											});
										}
									}
								});
							}
							else if(dados.nome == nome && dados.telefone == telefone && dados.endereco != endereco && dados.responsavel == responsavel){
								$.ajax({
									url: url_site+'locais/alteraEndereco',
									type: 'POST',
									data: {endereco:endereco, id:id},
									success: function(endereco){
										if(endereco == "1"){
											swal({
												title: "Parabéns!", 
												text: "Endereço do local alterado com sucesso.",
												icon: "success",
												buttons: {
													confirm: {
													    text: "Obrigado! 🙌🏼",
													    value: true,
													    visible: true,
													    className: "bg-success",
													    closeModal: true
													}
												}
											})
											.then((resposta) => {
												window.location.reload();
											});
										}
									}
								});
							}
							else if(dados.nome == nome && dados.telefone == telefone && dados.endereco == endereco && dados.responsavel != responsavel){
								$.ajax({
									url: url_site+'locais/alteraResponsavel',
									type: 'POST',
									data: {responsavel:responsavel, id:id},
									success: function(responsavel){
										if(responsavel == "1"){
											swal({
												title: "Parabéns!", 
												text: "Responsável pelo local alterado com sucesso.",
												icon: "success",
												buttons: {
													confirm: {
													    text: "Obrigado! 🙌🏼",
													    value: true,
													    visible: true,
													    className: "bg-success",
													    closeModal: true
													}
												}
											})
											.then((resposta) => {
												window.location.reload();
											});
										}
									}
								});
							}
							else if(dados.nome != nome && dados.telefone != telefone && dados.endereco == endereco && dados.responsavel == responsavel){
								$.ajax({
									url: url_site+'locais/alteraNomeTelefone',
									type: 'POST',
									data: {nome:nome, telefone:telefone, id:id},
									success: function(dados){
										if(dados == "1"){
											swal({
												title: "Parabéns!", 
												text: "Nome e Telefone do local alterados com sucesso.",
												icon: "success",
												buttons: {
													confirm: {
													    text: "Obrigado! 🙌🏼",
													    value: true,
													    visible: true,
													    className: "bg-success",
													    closeModal: true
													}
												}
											})
											.then((resposta) => {
												window.location.reload();
											});
										}
									}
								});
							}
							else if(dados.nome != nome && dados.telefone == telefone && dados.endereco != endereco && dados.responsavel == responsavel){
								$.ajax({
									url: url_site+'locais/alteraNomeEndereco',
									type: 'POST',
									data: {nome:nome, endereco:endereco, id:id},
									success: function(dados){
										if(dados == "1"){
											swal({
												title: "Parabéns!", 
												text: "Nome e Endereço do local alterados com sucesso.",
												icon: "success",
												buttons: {
													confirm: {
													    text: "Obrigado! 🙌🏼",
													    value: true,
													    visible: true,
													    className: "bg-success",
													    closeModal: true
													}
												}
											})
											.then((resposta) => {
												window.location.reload();
											});
										}
									}
								});
							}
							else if(dados.nome != nome && dados.telefone == telefone && dados.endereco == endereco && dados.responsavel != responsavel){
								$.ajax({
									url: url_site+'locais/alteraNomeResponsavel',
									type: 'POST',
									data: {nome:nome, responsavel:responsavel, id:id},
									success: function(dados){
										if(dados == "1"){
											swal({
												title: "Parabéns!", 
												text: "Nome e Responsável do local alterados com sucesso.",
												icon: "success",
												buttons: {
													confirm: {
													    text: "Obrigado! 🙌🏼",
													    value: true,
													    visible: true,
													    className: "bg-success",
													    closeModal: true
													}
												}
											})
											.then((resposta) => {
												window.location.reload();
											});
										}
									}
								});
							}
							else if(dados.nome == nome && dados.telefone != telefone && dados.endereco != endereco && dados.responsavel == responsavel){
								$.ajax({
									url: url_site+'locais/alteraTelefoneEndereco',
									type: 'POST',
									data: {telefone:telefone, endereco:endereco, id:id},
									success: function(dados){
										if(dados == "1"){
											swal({
												title: "Parabéns!", 
												text: "Telefone e Endereço do local alterados com sucesso.",
												icon: "success",
												buttons: {
													confirm: {
													    text: "Obrigado! 🙌🏼",
													    value: true,
													    visible: true,
													    className: "bg-success",
													    closeModal: true
													}
												}
											})
											.then((resposta) => {
												window.location.reload();
											});
										}
									}
								});
							}
							else if(dados.nome == nome && dados.telefone != telefone && dados.endereco == endereco && dados.responsavel != responsavel){
								$.ajax({
									url: url_site+'locais/alteraTelefoneResponsavel',
									type: 'POST',
									data: {telefone:telefone, responsavel:responsavel, id:id},
									success: function(dados){
										if(dados == "1"){
											swal({
												title: "Parabéns!", 
												text: "Telefone e Responsável do local alterados com sucesso.",
												icon: "success",
												buttons: {
													confirm: {
													    text: "Obrigado! 🙌🏼",
													    value: true,
													    visible: true,
													    className: "bg-success",
													    closeModal: true
													}
												}
											})
											.then((resposta) => {
												window.location.reload();
											});
										}
									}
								});
							}
							else if(dados.nome == nome && dados.telefone == telefone && dados.endereco != endereco && dados.responsavel != responsavel){
								$.ajax({
									url: url_site+'locais/alteraEnderecoResponsavel',
									type: 'POST',
									data: {endereco:endereco, responsavel:responsavel, id:id},
									success: function(dados){
										if(dados == "1"){
											swal({
												title: "Parabéns!", 
												text: "Endereço e Responsável do local alterados com sucesso.",
												icon: "success",
												buttons: {
													confirm: {
													    text: "Obrigado! 🙌🏼",
													    value: true,
													    visible: true,
													    className: "bg-success",
													    closeModal: true
													}
												}
											})
											.then((resposta) => {
												window.location.reload();
											});
										}
									}
								});
							}
							else if(dados.nome != nome && dados.telefone != telefone && dados.endereco != endereco && dados.responsavel == responsavel){
								$.ajax({
									url: url_site+'locais/alteraNomeTelefoneEndereco',
									type: 'POST',
									data: {nome:nome, telefone:telefone, endereco:endereco, id:id},
									success: function(dados){
										if(dados == "1"){
											swal({
												title: "Parabéns!", 
												text: "Nome, Telefone e Endereço do local alterados com sucesso.",
												icon: "success",
												buttons: {
													confirm: {
													    text: "Obrigado! 🙌🏼",
													    value: true,
													    visible: true,
													    className: "bg-success",
													    closeModal: true
													}
												}
											})
											.then((resposta) => {
												window.location.reload();
											});
										}
									}
								});
							}
							else if(dados.nome != nome && dados.telefone == telefone && dados.endereco != endereco && dados.responsavel != responsavel){
								$.ajax({
									url: url_site+'locais/alteraNomeEnderecoResponsavel',
									type: 'POST',
									data: {nome:nome, endereco:endereco, responsavel:responsavel, id:id},
									success: function(dados){
										if(dados == "1"){
											swal({
												title: "Parabéns!", 
												text: "Nome, Endereço e Responsável do local alterados com sucesso.",
												icon: "success",
												buttons: {
													confirm: {
													    text: "Obrigado! 🙌🏼",
													    value: true,
													    visible: true,
													    className: "bg-success",
													    closeModal: true
													}
												}
											})
											.then((resposta) => {
												window.location.reload();
											});
										}
									}
								});
							}
							else if(dados.nome == nome && dados.telefone != telefone && dados.endereco != endereco && dados.responsavel != responsavel){
								$.ajax({
									url: url_site+'locais/alteraTelefoneEnderecoResponsavel',
									type: 'POST',
									data: {telefone:telefone, endereco:endereco, responsavel:responsavel, id:id},
									success: function(dados){
										if(dados == "1"){
											swal({
												title: "Parabéns!", 
												text: "Telefone, Endereço e Responsável do local alterados com sucesso.",
												icon: "success",
												buttons: {
													confirm: {
													    text: "Obrigado! 🙌🏼",
													    value: true,
													    visible: true,
													    className: "bg-success",
													    closeModal: true
													}
												}
											})
											.then((resposta) => {
												window.location.reload();
											});
										}
									}
								});
							}
						}
					}
				}
			});
		});
	});
	$('#modalExL').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget);
		var id = button.data('id');
		var nome = button.data('nome');
		var modal = $(this);

		modal.find('.modal-title').text('Excluir Local!');
		modal.find('.texto-confirmacao').html("Tem certeza que deseja excluir <span class=text-danger>'"+nome+"'</span>?");

		$("#cExcluirL").on("click", function(){
			$.ajax({
				url: url_site+'locais/adminExcluiL',
				type: 'POST',
				data: {id:id},
				success: function(dados){
					if(dados == 1){
						swal({
							title: "Parabéns!", 
							text: "Local excluído com sucesso!", 
							icon: "success",
							buttons: {
								confirm: {
								    text: "Obrigado! 🙌🏼",
								    value: true,
								    visible: true,
								    className: "bg-success",
								    closeModal: true
								}
							}
						})
						.then((resposta) => {
							$('#modalExL').modal('hide');
							window.location.reload();
						});
					}else{
						swal({
							title: "Erro!", 
							text: "O local não pôde ser excluído.", 
							icon: "error",
							buttons: {
								confirm: {
								    text: "Ok",
								    value: true,
								    visible: true,
								    className: "bg-danger",
								    closeModal: true
								}
							}
						})
						.then((resposta) => {
							$('#modalExL').modal('hide');
						});
					}
				}
			});
		});
	});

	//Controle do atendente sobre: Atendimentos Provisórios
	$('#addP').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget);
		var modal = $(this);

		modal.find('.modal-title').text('Adicionar Atendimento Provisório!');

		$("#AddProvisorio").on("click", function(e){
			e.preventDefault();
			var cracha 			= $("#numeroCracha").val();
			var nome 			= $("#nomeprovisorio").val();
			var documento		= $("#documentoprovisorio").val();
			var telefone		= $("#telefoneprovisorio").val();
			var autorizacao		= $("#autorizacao").val();
			var empresa			= $("#empresa").val();
			var area			= $("#area").val();

			if(cracha == ''){
				swal({
					title: "Atenção!",
					text: "O campo NÚMERO DO CRACHÁ é obrigatório.",
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
			else if(isNaN(cracha)){
				swal({
					title: "Atenção!",
					text: "O campo NÚMERO DO CRACHÁ só aceita números.",
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
			else if(nome == ''){
				swal({
					title: "Atenção!",
					text: "O campo NOME DO VISITANTE é obrigatório.",
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
			else if(documento == ''){
				swal({
					title: "Atenção!",
					text: "O campo DOCUMENTO DO VISITANTE é obrigatório.",
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
			else if(telefone == ''){
				swal({
					title: "Atenção!",
					text: "O campo TELEFONE DO VISITANTE é obrigatório.",
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
			else if(autorizacao == ''){
				swal({
					title: "Atenção!",
					text: "O campo AUTORIZAÇÃO é obrigatório.",
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
			else if(empresa == ''){
				swal({
					title: "Atenção!",
					text: "O campo EMPRESA é obrigatório.",
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
			else if(area == ''){
				swal({
					title: "Atenção!",
					text: "O campo ÁREA é obrigatório.",
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
			else{
				$.ajax({
					url: url_site+'atendentes/addProvisorio/',
					type: 'POST',
					data: {cracha:cracha, nome:nome, telefone:telefone, documento:documento, autorizacao:autorizacao, empresa:empresa, area:area},
					success: function(dados){
						if(dados == 1){
							swal({
								title: "Parabéns!", 
								text: "Atendimento provisório adicionado com sucesso!", 
								icon: "success",
								buttons: {
									confirm: {
									    text: "Obrigado! 🙌🏼",
									    value: true,
									    visible: true,
									    className: "bg-success",
									    closeModal: true
									}
								}
							})
							.then((resposta) => {
								$('#addP').modal('hide');
								window.location.reload();
							});
						}else{
							swal({
								title: "Erro!", 
								text: "O atendimento provisório não pôde ser adicionado.", 
								icon: "error",
								buttons: {
									confirm: {
									    text: "Ok",
									    value: true,
									    visible: true,
									    className: "bg-danger",
									    closeModal: true
									}
								}
							})
							.then((resposta) => {
								$('#addP').modal('hide');
							});
						};
					}
				});
				$("#addAtendimentoProvisorio")[0].reset();
			}
		});
		$("#cancela").on("click", function(){
			$("#addAtendimentoProvisorio")[0].reset();
		});
	});
	$('#buscaProvisorio').on('keyup', function(){
		var busca = $(this).val();
		$.ajax({
			url: url_site+'visitantes/buscaProvisorio/',
			type: 'POST',
			data: {busca:busca},
			success: function(cracha){
				if(cracha != 0){
					if(busca == ''){
						window.location.href = url_site+"provisorios/";
					}else{
						$('#geral').html(cracha);
					}
				}else{
					$('#geral').html("<div class='col-md-4 offset-md-4 bg-secundario rounded-lg p-0 mb-5'><div class='text-padrao text-center pt-3 pb-3'><p class='p-0 m-0'>Nenhum atendimento provisório encontrado na busca.</p></div></div>");
				}
			}
		});
	});
	$('#buscaVisitante').on('keyup', function(){
		var busca = $(this).val();
		$.ajax({
			url: url_site+'visitantes/buscaVisitante/',
			type: 'POST',
			data: {busca:busca},
			success: function(cracha){
				if(cracha != 0){
					if(busca == ''){
						window.location.href = url_site+"visitantes/";
					}else{
						$('#geral').html(cracha);
					}
				}else{
					$('#geral').html("<div class='col-md-4 offset-md-4 bg-secundario rounded-lg p-0 mb-5'><div class='text-padrao text-center pt-3 pb-3'><p class='p-0 m-0'>Nenhum atendimento de visitante encontrado na busca.</p></div></div>");
				}
			}
		});
	});

	//Controle do atendente sobre: Atendimentos de Visitantes
	$('#addV').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget);
		var modal = $(this);

		modal.find('.modal-title').text('Adicionar Atendimento Provisório!');

		$("#AddVisitante").on("click", function(e){
			e.preventDefault();
			var cracha 			= $("#numeroCracha").val();
			var nome 			= $("#nomeprovisorio").val();
			var documento		= $("#documentoprovisorio").val();
			var telefone		= $("#telefoneprovisorio").val();
			var autorizacao		= $("#autorizacao").val();
			var empresa			= $("#empresa").val();
			var area			= $("#area").val();

			if(cracha == ''){
				swal({
					title: "Atenção!",
					text: "O campo NÚMERO DO CRACHÁ é obrigatório.",
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
			else if(isNaN(cracha)){
				swal({
					title: "Atenção!",
					text: "O campo NÚMERO DO CRACHÁ só aceita números.",
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
			else if(nome == ''){
				swal({
					title: "Atenção!",
					text: "O campo NOME DO VISITANTE é obrigatório.",
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
			else if(documento == ''){
				swal({
					title: "Atenção!",
					text: "O campo DOCUMENTO DO VISITANTE é obrigatório.",
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
			else if(telefone == ''){
				swal({
					title: "Atenção!",
					text: "O campo TELEFONE DO VISITANTE é obrigatório.",
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
			else if(autorizacao == ''){
				swal({
					title: "Atenção!",
					text: "O campo AUTORIZAÇÃO é obrigatório.",
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
			else if(empresa == ''){
				swal({
					title: "Atenção!",
					text: "O campo EMPRESA é obrigatório.",
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
			else if(area == ''){
				swal({
					title: "Atenção!",
					text: "O campo ÁREA é obrigatório.",
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
			else{
				$.ajax({
					url: url_site+'atendentes/addVisitante/',
					type: 'POST',
					data: {cracha:cracha, nome:nome, telefone:telefone, documento:documento, autorizacao:autorizacao, empresa:empresa, area:area},
					success: function(dados){
						if(dados == 1){
							swal({
								title: "Parabéns!", 
								text: "Atendimento de visitante adicionado com sucesso!", 
								icon: "success",
								buttons: {
									confirm: {
									    text: "Obrigado! 🙌🏼",
									    value: true,
									    visible: true,
									    className: "bg-success",
									    closeModal: true
									}
								}
							})
							.then((resposta) => {
								$('#addV').modal('hide');
								window.location.reload();
							});
						}else{
							swal({
								title: "Erro!", 
								text: "O atendimento de visitante não pôde ser adicionado.", 
								icon: "error",
								buttons: {
									confirm: {
									    text: "Ok",
									    value: true,
									    visible: true,
									    className: "bg-danger",
									    closeModal: true
									}
								}
							})
							.then((resposta) => {
								$('#addV').modal('hide');
							});
						};
					}
				});
				$("#addAtendimentoVisitante")[0].reset();
			}
		});
		$("#cancela").on("click", function(){
			$("#addAtendimentoVisitante")[0].reset();
		});
	});

	$("#voltaAoInicio").click(function(){
		window.location.href = url_site+"painel/";
	});

	$("#sair").click(function(){
		window.location.href = url_site+"sair/";
	});

	$('#entrega').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget);
		var id = button.data('id');
		var cracha = button.data('cracha');
		var modal = $(this);

		modal.find('.modal-title').text('Concluir Atendimento!');
		modal.find('.texto-confirmacao').html("Tem certeza que o crachá '"+cracha+"' foi entregue?");

		$("#entregadecracha").on("click", function(){
			$.ajax({
				url: url_site+'atendentes/entregaCracha/',
				type: 'POST',
				data: {id:id},
				success: function(dados){
					if(dados == 1){
						swal({
							title: "Parabéns!", 
							text: "Atendimento concluído com sucesso!", 
							icon: "success",
							buttons: {
								confirm: {
								    text: "Obrigado! 🙌🏼",
								    value: true,
								    visible: true,
								    className: "bg-success",
								    closeModal: true
								}
							}
						})
						.then((resposta) => {
							window.location.reload();
						});
					}else{
						swal({
							title: "Erro!", 
							text: "O atendimento não pôde ser concluído.", 
							icon: "error",
							buttons: {
								confirm: {
								    text: "Ok",
								    value: true,
								    visible: true,
								    className: "bg-danger",
								    closeModal: true
								}
							}
						});
					}
				}
			});
		});
	});

	var SPMaskBehavior = function (val) {
	  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	},
	spOptions = {
	  onKeyPress: function(val, e, field, options) {
	      field.mask(SPMaskBehavior.apply({}, arguments), options);
	    }
	};
	$('.telefone').mask(SPMaskBehavior, spOptions);

	$image_crop = $('#image_demo').croppie({
		enableExif: true,
		viewport:{
			width: 300,
			height: 300,
			type: 'circle'
		},
		boundary:{
			width: 300,
			height: 300
		}
	});
	$('#foto').on('change', function(){
		var reader = new FileReader();
		reader.onload = function(event){
			$image_crop.croppie('bind', {
				url: event.target.result
			});
		}
		reader.readAsDataURL(this.files[0]);
		$('#modalCorteImagem').modal('show');
	});
	$('#cortarImagem').click(function(event){
		$image_crop.croppie('result', {
			type: 'canvas',
			size: 'viewport'
		}).then(function(resposta){
			$.ajax({
				url: url_site+'configuracoes/alteraImagem',
				type: 'POST',
				data: {"foto": resposta},
				success: function(dados){
					$('#modalCorteImagem').modal('hide');
					if(dados == "1"){
						swal({
							title: "Parabéns!", 
							text: "Imagem adicionada com sucesso.", 
							icon: "success",
							buttons: {
								confirm: {
								    text: "Obrigado! 🙌🏼",
								    value: true,
								    visible: true,
								    className: "bg-success",
								    closeModal: true
								}
							}
						})
						.then((ok) => {
							window.location.reload();
						});
					}else if(dados == "2"){
						swal({
							title: "Parabéns!", 
							text: "Imagem alterada com sucesso.", 
							icon: "success",
							buttons: {
								confirm: {
								    text: "Obrigado! 🙌🏼",
								    value: true,
								    visible: true,
								    className: "bg-success",
								    closeModal: true
								}
							}
						})
						.then((ok) => {
							window.location.reload();
						});
					}else{
						swal({
							title: "Erro!", 
							text: "A imagem não pôde ser alterada.", 
							icon: "error",
							buttons: {
								confirm: {
								    text: "Ok",
								    value: true,
								    visible: true,
								    className: "bg-danger",
								    closeModal: true
								}
							}
						});
					}
				}
			});
		})
	});
	$('#configInfos').click(function(event){
		event.preventDefault();
		var nome 		= $('#nome').val();
		var login 		= $('#login').val();

		if(nome != '' && login != ''){
			if(nome.length < 3){
				swal({
					title: "Atenção!",
					text: "O campo NOME deve conter pelo menos 3 caracteres.",
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
			else if(!isNaN(nome)){
				swal({
					title: "Atenção!",
					text: "O campo NOME não permite números.",
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
			else if(login.length < 3){
				swal({
					title: "Atenção!",
					text: "O campo SOBRENOME deve conter pelo menos 3 caracteres.",
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
			else{
				$.ajax({
					url: url_site+'configuracoes/verificaCampos',
					dataType: 'json',
					success: function(dados){
						if(dados.nome != nome && dados.login != login){
							$.ajax({
								url: url_site+'configuracoes/alteraDados',
								type: 'POST',
								data: {nome:nome, login:login},
								success: function(dados){
									if(dados == "1"){
										swal({
											title: "Parabéns!", 
											text: "Dados alterados com sucesso.",
											icon: "success",
											buttons: {
												confirm: {
												    text: "Obrigado! 🙌🏼",
												    value: true,
												    visible: true,
												    className: "bg-success",
												    closeModal: true
												}
											}
										})
										.then((resposta) => {
											window.location.reload();
										});
									}
								}
							});
						}else{
							if(dados.nome == nome && dados.login == login){
								swal({
									title: "Atenção!",
									text: "Todas as informações são atuais.",
									icon: "warning",
									buttons: {
										confirm: {
										    text: "Ok, obrigado!",
										    value: true,
										    visible: true,
										    className: "bg-warning",
										    closeModal: true
										}
									}
								});
							}else{
								if(dados.nome != nome && dados.login == login){
									$.ajax({
										url: url_site+'configuracoes/alteraNome',
										type: 'POST',
										data: {nome:nome},
										success: function(nome){
											if(nome == "1"){
												swal({
													title: "Parabéns!", 
													text: "Nome alterado com sucesso.",
													icon: "success",
													buttons: {
														confirm: {
														    text: "Obrigado! 🙌🏼",
														    value: true,
														    visible: true,
														    className: "bg-success",
														    closeModal: true
														}
													}
												})
												.then((resposta) => {
													window.location.reload();
												});
											}
										}
									});
								}
								else if(dados.nome == nome && dados.login != login){
									$.ajax({
										url: url_site+'configuracoes/alteraLogin',
										type: 'POST',
										data: {login:login},
										success: function(login){
											if(login == "1"){
												swal({
													title: "Parabéns!", 
													text: "Login alterado com sucesso.",
													icon: "success",
													buttons: {
														confirm: {
														    text: "Obrigado! 🙌🏼",
														    value: true,
														    visible: true,
														    className: "bg-success",
														    closeModal: true
														}
													}
												})
												.then((resposta) => {
													window.location.reload();
												});
											}
										}
									});
								}
							}
						}
					}
				});
			}
		}else{
			swal({
				title: "Atenção!",
				text: "Todos os campos são obrigatórios.",
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
	});
	$('#configSenha').click(function(event){
		event.preventDefault();

		var atual 		= $('#atual').val();
		var nova 		= $('#nova').val();
		var cnova 		= $('#cnova').val();

		if(atual != '' && nova != '' && cnova != ''){
			$.ajax({
				url: url_site+'configuracoes/verificaSenhaAtual',
				type: 'POST',
				data: {senha:atual},
				success: function(senha){
					if(senha == "1"){
						if(nova == cnova){
							$.ajax({
								url: url_site+'configuracoes/alteraSenha',
								type: 'POST',
								data: {senha:nova},
								success: function(senha){
									if(senha == "1"){
										swal({
											title: "Parabéns!", 
											text: "Senha alterada com sucesso.",
											icon: "success",
											buttons: {
												confirm: {
												    text: "Obrigado! 🙌🏼",
												    value: true,
												    visible: true,
												    className: "bg-success",
												    closeModal: true
												}
											}
										})
										.then((resposta) => {
											window.location.reload();
										});
									}else{
										swal({
											title: "Erro!", 
											text: "A senha não pôde ser alterada.",
											icon: "error",
											buttons: {
												confirm: {
												    text: "Ok",
												    value: true,
												    visible: true,
												    className: "bg-danger",
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
								text: "As NOVAS SENHAS não coincidem.",
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
					}else{
						swal({
							title: "Atenção!",
							text: "Sua SENHA ATUAL está incorreta.",
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
				text: "Os campos de senha são obrigatórios.",
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
	});

	$("#relatorioProvisorios").on('click', function(){
		window.open(url_site+'relatorios/relatorio-provisorio.php', '_blank');
	});
	$("#relatorioVisitantes").on('click', function(){
		window.open(url_site+'relatorios/relatorio-visitante.php', '_blank');
	});
});