<div class="mb-5 m-5 text-center">
  <h2>CADASTRO DE NOVOS CLIENTES</h2> <br><br>
  
  <?php if ($_SESSION['erro']) : ?>
    <?= $_SESSION['erro'] ?>
    <?php unset($_SESSION['erro']) ?>
    <?php endif ?>

    <?php if ($_SESSION['sucesso']) : ?>
    <?= $_SESSION['sucesso'] ?>
    <?php unset($_SESSION['sucesso']) ?>
    <?php endif ?>

  </div>


<form action="?a=cadastro_submit" method="post">
  <div class="mb-3 m-4">
    <label for="formGroupExampleInput" class="form-label">Nome do Cliente</label>
    <input type="text" class="form-control" name="nome">
  </div>

  <div class="mb-3 m-4">
    <label for="formGroupExampleInput" class="form-label">Email do Cliente</label>
    <input type="email" class="form-control" name="email">
  </div>

  <div class="mb-3 m-4">
    <label for="formGroupExampleInput" class="form-label">Telefone</label>
    <input type="text" class="form-control" name="telefone">
  </div>

  <div class="mb-3 m-4">
    <label for="formGroupExampleInput" class="form-label">Cidade</label>
    <input type="text" class="form-control" name="cidade">
  </div>

  <button type="submit" class="btn btn-primary m-4">Criar cliente</button>
</form>