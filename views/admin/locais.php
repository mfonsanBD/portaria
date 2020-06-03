<?php 
require 'topo.php';
?>
          </h1>
        </div>
        <div class="col-md-12">
          <p class="p-0 m-0 mt-2 subtitulo">Locais/Unidades da empresa.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalEdL" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-light">
      <div class="modal-header bg-padrao">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="bg-light" id="EdL">
          <div class="form-group text-left">
            <label for="nomel" class="col-form-label">Nome do Local: 
              <span class="m-0 p-0 text-danger">*</span>
            </label>
            <input type="text" id="nomel">

            <label for="telefonel" class="col-form-label">Telefone do Local: 
              <span class="m-0 p-0 text-danger">*</span>
            </label>
            <input type="text" id="telefonel" class="telefone">

            <label for="enderecol" class="col-form-label">Endereço do Local: 
              <span class="m-0 p-0 text-danger">*</span>
            </label>
            <input type="text" id="enderecol">

            <label for="responsavell" class="col-form-label">Responsável: 
              <span class="m-0 p-0 text-danger">*</span>
            </label>
            <input type="text" id="responsavell">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
            <button type="button" id="salvaAlteracoes" class="btn bg-padrao"><i class="fa fa-check"></i> Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalExL" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-light">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="bg-light" id="excluiPF"> 
          <p class="texto-confirmacao"></p>       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>  Não, cancelar.</button>
        <button type="button" id="cExcluirL" class="btn bg-danger text-white"><i class="fas fa-trash-alt"></i> Sim, excluir.</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="addL" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-light">
      <div class="modal-header bg-padrao">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="bg-light" id="adcL">
          <div class="form-group text-left">
            <label for="nomeal" class="col-form-label">Nome do Local: 
              <span class="m-0 p-0 text-danger">*</span>
            </label>
            <input type="text" id="nomeal">

            <label for="telefoneal" class="col-form-label">Telefone do Local: 
              <span class="m-0 p-0 text-danger">*</span>
            </label>
            <input type="text" id="telefoneal" class="telefone">

            <label for="enderecoal" class="col-form-label">Endereço do Local: 
              <span class="m-0 p-0 text-danger">*</span>
            </label>
            <input type="text" id="enderecoal">

            <label for="responsavelal" class="col-form-label">Responsável: 
              <span class="m-0 p-0 text-danger">*</span>
            </label>
            <input type="text" id="responsavelal">

          </div>
          <div class="modal-footer">
            <button type="button" id="cancela" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
            <button type="button" id="add" class="btn bg-padrao"><i class="fa fa-check"></i> Adicionar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="container">
	<div class="pt-5 pb-5 text-center">
		<h3 class="text-uppercase text-center titulo_pagina mb-5"><?=$this->titulo;?></h3>
    <button class="btn bg-padrao btn-sm shadow-sm ml-1 rounded-lg" data-toggle="modal" data-target="#addL">
      <i class="fa fa-plus"></i>
      <span class="m-0 p-0 text-white">Adicionar Local</span>
    </button>
	</div>
  <div class="row">
    <div class="col-lg-12 mb-4">
      <?php
        if($qtdLocais != 0){
          foreach ($listaLocais as $ll): 
      ?>
        <div class="col-md-12 bg-white rounded-lg pt-3 pb-3 mb-3 shadow-sm">
          <div class="row">
            <div class="col-md-2 align-self-center text-center">
              <h6 class="mb-3">Nome do Local:</h6>
              <p class="p-0 m-0 text-padrao text-uppercase"><?= $ll['nome_local']; ?></p>
            </div>
            <div class="col-md-2 align-self-center text-center">
              <h6 class="mb-3">Telefone do Local:</h6>
              <p class="p-0 m-0 text-padrao"><?= $ll['telefone_local']; ?></p>
            </div>
            <div class="col-md-3 align-self-center text-center">
              <h6 class="mb-2">Endereço do Local:</h6>
              <p class="p-0 m-0 text-padrao"><?= $ll['endereco_local']; ?></p>
            </div>
            <div class="col-md-2 align-self-center text-center">
              <h6 class="mb-3">Responsável:</h6>
              <p class="p-0 m-0 text-padrao"><?= $ll['responsavel']; ?></p>
            </div>
            <div class="col-md-3 align-self-center text-center">
              <h6 class="mb-3">Ação:</h6>
              <button id="ueditar" type="button" class="btn bg-padrao btn-sm" data-toggle="modal" data-target="#modalEdL" data-id="<?= $ll['id_local']; ?>" data-nome="<?= $ll['nome_local'];?>" data-telefone="<?= $ll['telefone_local'];?>" data-endereco="<?= $ll['endereco_local'];?>"  data-responsavel="<?= $ll['responsavel'];?>">
                <i class="fa fa-edit"></i> Editar
              </button>
              <button id="uexcluir" value="<?= $ll['id_local']; ?>" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalExL" data-id="<?= $ll['id_local']; ?>" data-nome="<?= $ll['nome_local'];?>">
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
          switch ($qtdLocais) {
            case '0':
              echo $qtdLocais." local encontrado.";
            break;

            case '1':
              echo $qtdLocais." local encontrado.";
            break;
            
            default:
              echo $qtdLocais." locais encontrados.";
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
              <a class="page-link text-padrao" href="<?=URL_BASE;?>faqs/?p=<?=$i?>">
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