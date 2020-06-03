<?php 
require 'topo.php';
?>
					</h1>
				</div>
				<div class="col-md-12">
					<p class="p-0 m-0 mt-2 subtitulo">Página de atendimento de visitantes provisórios</p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="modal fade" id="addP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-light">
      <div class="modal-header bg-padrao">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="bg-light" id="addAtendimentoProvisorio">
          <div class="form-group text-left">
            <label for="numeroCracha" class="col-form-label">Número do Crachá: 
				<span class="m-0 p-0 text-danger">*</span>
			</label>
            <input type="text" id="numeroCracha">

            <label for="nomeprovisorio" class="col-form-label">Nome do Vistante: 
				<span class="m-0 p-0 text-danger">*</span>
			</label>
            <input type="text" id="nomeprovisorio">

            <label for="documentoprovisorio" class="col-form-label">Documento do Vistante: 
				<span class="m-0 p-0 text-danger">*</span>
			</label>
            <input type="text" id="documentoprovisorio">

            <label for="telefoneprovisorio" class="col-form-label">Telefone do Vistante: 
				<span class="m-0 p-0 text-danger">*</span>
			</label>
            <input type="text" id="telefoneprovisorio" class="telefone">

            <label for="autorizacao" class="col-form-label">Autorização: 
				<span class="m-0 p-0 text-danger">*</span>
			</label>
            <input type="text" id="autorizacao">

            <label for="empresa" class="col-form-label">Empresa: 
				<span class="m-0 p-0 text-danger">*</span>
			</label>
            <input type="text" id="empresa">

            <label for="area" class="col-form-label">Área: 
				<span class="m-0 p-0 text-danger">*</span>
			</label>
            <input type="text" id="area">

          </div>
		  <div class="modal-footer">
		    <button type="button" id="cancela" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
		    <button type="button" id="AddProvisorio" class="btn bg-padrao"><i class="fa fa-check"></i> Adicionar</button>
		  </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="entrega" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-light">
      <div class="modal-header bg-success">
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
				<button type="button" id="entregadecracha" class="btn bg-success text-white"><i class="fa fa-check"></i> Sim, crachá entregue.</button>
			</div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
	<div class="pt-5 pb-5 text-center">
		<h3 class="text-uppercase titulo_pagina mb-5"><?=$this->titulo;?></h3>
		<button class="btn bg-padrao btn-sm shadow-sm ml-1 rounded-lg" data-toggle="modal" data-target="#addP">
			<i class="fa fa-plus"></i>
			<span class="m-0 p-0 text-white">Adicionar Provisório</span>
		</button>

		<button class="btn bg-padrao btn-sm shadow-sm ml-1 rounded-lg" id="relatorioProvisorios">
			<i class="fas fa-file-alt"></i>
			<span class="m-0 p-0 text-white">Gerar Relatório</span>
		</button>
		<div class="col-md-4 offset-md-4 mt-5">
			<input class="form-control mr-sm-12 bg-white shadow-sm p-4" type="text" placeholder="Buscar Crachá" aria-label="Search" id="buscaProvisorio">
		</div>
	</div>
	<div class="row" id="geral">
		<div class="col-lg-12 mb-4 listaProvisorio" id="listaCrachas">
			<?php
				if($qtdAtendimentoProvisorio != 0){
					foreach ($listaAtendimentoProvisorio as $lap): 
			?>
				<div class="col-md-12 bg-white rounded-lg pt-3 pb-3 mb-3 shadow-sm">
					<div class="row">
						<div class="col-md-1 align-self-center text-center">
							<button id="uexcluir" value="<?= $lap['id_atendimento']; ?>" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#entrega" data-id="<?= $lap['id_atendimento']; ?>" data-cracha="<?= $lap['cracha']; ?>">
								<i class="fas fa-check"></i> Entrega
							</button>
						</div>
						<div class="col-md-2 align-self-center text-center">
							<h6 class="mb-0">Nº do Crachá:</h6>
							<p class="p-0 m-0 text-padrao text-break"><?= $lap['cracha']; ?></p>
						</div>
						<div class="col-md-2 align-self-center text-center">
							<h6 class="mb-0">Nome:</h6>
							<p class="p-0 m-0 text-padrao text-break"><?= $lap['nome_visitante']; ?></p>
						</div>
						<div class="col-md-1 align-self-center text-center">
							<h6 class="mb-0">Documento:</h6>
							<p class="p-0 m-0 text-padrao text-break"><?= $lap['cpf_visitante']; ?></p>
						</div>
						<div class="col-md-2 align-self-center text-center">
							<h6 class="mb-0">Telefone:</h6>
							<p class="p-0 m-0 text-padrao text-break"><?= $lap['telefone_visitante']; ?></p>
						</div>
						<div class="col-md-2 align-self-center text-center">
							<h6 class="mb-0">Autorização:</h6>
							<p class="p-0 m-0 text-padrao text-break"><?= $lap['alfa']; ?></p>
						</div>
						<div class="col-md-1 align-self-center text-center">
							<h6 class="mb-0">Empresa:</h6>
							<p class="p-0 m-0 text-padrao text-break"><?= $lap['empresa_visitante']; ?></p>
						</div>
						<div class="col-md-1 align-self-center text-center">
							<h6 class="mb-0">Área:</h6>
							<p class="p-0 m-0 text-padrao text-break"><?= $lap['area']; ?></p>
						</div>
					</div>
				</div>
			<?php 
					endforeach;
				}else{
			?>
			<div class="col-md-4 offset-md-4 bg-secundario rounded-lg p-0 mb-5">
				<div class="text-padrao text-center pt-3 pb-3">
				  <p class="p-0 m-0">Nenhum atendimento provisório encontrado.</p>
				</div>
			</div>
			<?php		
				}
			?>
		</div>
		<div class="col-lg-12 p-0 pag">
			<div class="col-md-12 text-center mb-1">
				<p class="pt-2 pb-2 m-0 text-secondary">
					<?php
					switch ($qtdAtendimentoProvisorio) {
						case 0 && 1:
							echo $qtdAtendimentoProvisorio." atendimento provisório encontrado.";
						break;
						
						default:
							echo $qtdAtendimentoProvisorio." atendimentos provisório encontrados.";
						break;
					}
					?>
				</p>
			</div>
			<div class="col-md-12 p-0 pr-2 mb-1">
				<nav aria-label="Page navigation example">
				  <ul class="pagination justify-content-center">
				    <?php for($i=1; $i<=$totalPaginas;$i++):?>
						<li class="page-item <?= ($this->p == $i)?'active':''; ?>">
							<a class="page-link text-padrao" href="<?=URL_BASE;?>provisorios/?p=<?=$i?>">
								<?= ($i) ?>
							</a>
						</li>
					<?php endfor; ?>
				  </ul>
				</nav>
			</div>
			<div class="col-md-12 ml-0 pl-0 text-center">
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