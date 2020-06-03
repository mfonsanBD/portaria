<?php 
require 'topo.php';
?>
					</h1>
				</div>
				<div class="col-md-12">
					<p class="p-0 m-0 mt-2 subtitulo">Esses são os atendentes cadastrados no sistema.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalEdUs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-light">
      <div class="modal-header bg-padrao">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="bg-light" id="editaSU">
          <div class="form-group text-left">
            <label for="nsenha" class="col-form-label">Nova Senha: 
				<span class="m-0 p-0 text-danger">*</span>
			</label>
            <input type="password" id="nsenha">
            <label for="cnsenha" class="col-form-label">Confirmar Nova Senha: 
				<span class="m-0 p-0 text-danger">*</span>
			</label>
            <input type="password" id="cnsenha">
          </div>
		  <div class="modal-footer">
		    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
		    <button type="button" id="salvarAlteracoes" class="btn bg-padrao"><i class="fas fa-check"></i> Salvar</button>
		  </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalExUs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-light">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="bg-light" id="excluiSU"> 
      		<p class="texto-confirmacao"></p>       
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>  Não, cancelar.</button>
				<button type="button" id="excluirSU" class="btn bg-danger text-white"><i class="fas fa-trash-alt"></i> Sim, excluir.</button>
			</div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="addU" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-light">
      <div class="modal-header bg-padrao">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="bg-light" id="adicionaUsuario">
          <div class="form-group text-left">
            <label for="nomea" class="col-form-label">Nome: 
				<span class="m-0 p-0 text-danger">*</span>
			</label>
            <input type="text" id="nomea">

            <label for="logina" class="col-form-label">Login: 
				<span class="m-0 p-0 text-danger">*</span>
			</label>
            <input type="text" id="logina">

            <label for="matriculaa" class="col-form-label">Matricula: 
				<span class="m-0 p-0 text-danger">*</span>
			</label>
            <input type="text" id="matriculaa">

            <label for="senhaa" class="col-form-label">Senha: 
				<span class="m-0 p-0 text-danger">*</span>
			</label>
            <input type="password" id="senhaa">

            <label for="csenhaa" class="col-form-label">Confirmar Senha: 
				<span class="m-0 p-0 text-danger">*</span>
			</label>
            <input type="password" id="csenhaa">
          </div>
		  <div class="modal-footer">
		    <button type="button" id="cancela" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
		    <button type="button" id="adicionarUsuario" class="btn bg-padrao"><i class="fa fa-check"></i> Adicionar</button>
		  </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="container">
	<div class="pt-5 pb-5 text-center">
		<h3 class="text-uppercase titulo_pagina mb-5"><?=$this->titulo;?></h3>
		<button class="btn bg-padrao btn-sm shadow-sm ml-1 rounded-lg" data-toggle="modal" data-target="#addU">
			<i class="fa fa-plus"></i>
			<span class="m-0 p-0 text-white">Adicionar Atendente</span>
		</button>
	</div>
	<div class="row">
		<div class="col-lg-12 mb-4">
			<?php
				if($qtdUsuarios != 0){
					foreach ($listaUsuarios as $lu): 
			?>
				<div class="col-md-12 bg-white rounded-lg pt-3 pb-3 mb-3 shadow-sm">
					<div class="row">
						<div class="col-md-1 align-self-center">
							<?php
								if($lu['foto'] == 'usuario.jpg'){
									$caminho = URL_BASE.'assets/img/usuario.jpg';
								}else{
									$caminho = URL_BASE.'assets/img/usuarios/'.$lu['id'].'/'.$lu['foto'];
								}
							?>
							<img src="<?=$caminho;?>" class="rounded-circle" width="70" alt="">
						</div>
						<div class="col-md-2 align-self-center text-center">
							<h6 class="mb-3">Nome:</h6>
							<p class="p-0 m-0 text-padrao"><?= $lu['nome']; ?></p>
						</div>
						<div class="col-md-4 align-self-center text-center">
							<h6 class="mb-3">Nome de Usuário:</h6>
							<p class="p-0 m-0 text-padrao"><?= $lu['login']; ?></p>
						</div>
						<div class="col-md-2 align-self-center text-center">
							<h6 class="mb-2">Matricula:</h6>
							<p class="p-0 m-0 text-padrao"><?= $lu['matricula']; ?></p>
						</div>
						<div class="col-md-3 align-self-center text-center">
							<h6 class="mb-3">Ação:</h6>
							<button id="ueditar" type="button" class="btn bg-padrao btn-sm" data-toggle="modal" data-target="#modalEdUs" data-id="<?= $lu['id']; ?>" data-nome="<?= $lu['nome'];?>">
								<i class="fa fa-edit"></i> Editar
							</button>
							<button id="uexcluir" value="<?= $lu['id']; ?>" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalExUs" data-id="<?= $lu['id']; ?>" data-nome="<?= $lu['nome'];?>">
								<i class="fas fa-trash-alt"></i> Excluir</button>
						</div>
					</div>
				</div>
			<?php 
					endforeach;
				}else{
			?>
			<div class="col-md-4 offset-md-4 bg-secundario rounded-lg p-0 mb-5">
				<div class="text-padrao text-center pt-3 pb-3">
				  <p class="p-0 m-0">Nenhum usuário encontrado.</p>
				</div>
			</div>
			<?php		
				}
			?>
		</div>
	</div>
	<div class="col-lg-12 p-0 pag">
		<div class="row">
			<div class="col-md-6 text-left">
				<p class="pt-2 pb-2 m-0 text-secondary">
				<?php
				switch ($qtdUsuarios) {
					case '0':
						echo $qtdUsuarios." atendente encontrado.";
					break;

					case '1':
						echo $qtdUsuarios." atendente encontrado.";
					break;
					
					default:
						echo $qtdUsuarios." atendentes encontrados.";
					break;
				}
				?>
				</p>
			</div>
			<div class="col-md-5 p-0 pr-2 m-0">
				<nav aria-label="Page navigation example">
				  <ul class="pagination justify-content-end">
				    <?php for($i=1; $i<=$totalPaginas;$i++):?>
						<li class="page-item <?= ($this->p == $i)?'active':''; ?>">
							<a class="page-link text-padrao" href="<?=URL_BASE;?>atendentes/?p=<?=$i?>">
								<?= ($i) ?>
							</a>
						</li>
					<?php endfor; ?>
				  </ul>
				</nav>
			</div>
			<div class="col-md-1 ml-0 pl-0 text-right">
				<p class="pt-2 pb-2 m-0 text-secondary">
				  <?php
				    switch ($totalPaginas) {
				      case '0':
				        echo $totalPaginas." páginas.";
				      break;

				      case '1':
				        echo $totalPaginas." página.";
				      break;
				      
				      default:
				        echo $totalPaginas." páginas.";
				      break;
				    }
				  ?>
				</p>
			</div>
		</div>
	</div>
</div>