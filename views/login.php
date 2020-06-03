<header class="entrar">
	<div class="container text-center text-light pt-4">
		<a href="<?=URL_BASE?>">
			<img src="<?=URL_BASE?>assets/img/logo1.png" width="250" alt="LogoTipo">
		</a>
	</div>
</header>

<div class="login-cadastro mb-5">
	<div class="container-form" id="container">
		<div class="form-container sign-in-container">
		    <form method="POST" id="login" class="mb-5 p-5">
		        <h2 class="text-padrao text-uppercase">Olá, Tudo bem?</h2>
		        <span>Acesse sua conta e vamos ao trabalho!</span>
		        <input type="text" id="lusuario" placeholder="Usuário" />
		        <input type="password" id="lsenha" placeholder="Senha" />
		        <select id="llocal">
		        		<option value="" disabled selected>Selecione uma unidade</option>
		        	<?php foreach ($listaLocais as $ll):?>
		        		<option value="<?=$ll['id_local'];?>"><?=$ll['nome_local'];?></option>
		        	<?php endforeach;?>
		        </select>
				<p class="m-0 p-0" id="carregando">
					<i class="fas fa-spinner fa-spin text-dark mt-3 mb-3"></i> 
					Carregando...
				</p>
		        <button type="submit">Acessar</button>
		    </form>
		</div>
	</div>
</div>