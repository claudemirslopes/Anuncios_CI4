<?php $this->extend('Manager/Layout/main') ?>

<!-- Envio para o template principal do título dessa view   -->
<?= $this->section('title') ?>
<?php echo $title ?? ''; ?>
<?= $this->endSection() ?>

<!-- Envio para o template principal os arquivos css e style dessa view   -->
<?= $this->section('styles') ?>
<style>
    td {
        margin-right: 5px !important;
    }
</style>
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.3/r-2.4.0/datatables.min.css" rel="stylesheet" />
<?= $this->endSection() ?>

<!-- Envio para o template principal o conteúdo dessa view   -->
<?= $this->section('content') ?>
<div class="container-fluid pt-3">
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h5><?php echo $title ?? ''; ?></h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-borderless table-responsive" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Slug</th>
                                <th scope="col" class="text-end">Ações</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="categoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Criar Categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php echo form_open(route_to('categories.create'), ['id' => 'categories-form'], ['id' => '']) ;?>
      <div class="modal-body">
        <!-- INÍCIO DOS CAMPOS DO FORMULÁRIO -->
        <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" id="name" name="name">
          <span class="text-danger error-text name"></span>
        </div>
        <div class="mb-3">
          <label for="parent_id" class="form-label">Categoria Pai</label>
          <!-- Será preenchido pelo javascript -->
          <span id="boxParents"></span>
          <span class="text-danger error-text parent_id"></span>
        </div>
        <!-- FIM DOS CAMPOS DO FORMULÁRIO -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary btn-sm">Salvar</button>
      </div>
      <?php echo form_close() ;?>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<!-- Envio para o template principal os arquivos de scripts dessa view   -->
<?= $this->section('scripts') ?>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.3/r-2.4.0/datatables.min.js"></script>

<?php echo $this->include('Manager/Categories/Scripts/_datatable_all'); ?>
<?php echo $this->include('Manager/Categories/Scripts/_get_category_info'); ?>

<?= $this->endSection() ?>