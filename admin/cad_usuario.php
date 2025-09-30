<?php
include_once("./layout/validacao.php");
$id = $_GET["id"] ?? "";
$titulo = "Novo";
$nome = $_POST["nome"] ?? "";
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";
if (is_numeric($id)) {
  $sql = "SELECT * FROM usuarios WHERE usuario_id = ?";
  $stmt = $conexao->prepare($sql);
  // i = numero inteiro
  // d = numero decimal
  // s =
  $stmt->bind_param("i", $id); //unica linha que uda
  $stmt->execute();
  $resultado = $stmt->get_result();
  //  retorna o numero total de linhas da pesquisa
  $total_linhas = $resultado->num_rows;
  while ($linha = $resultado->fetch_object()) {
    $nome = $linha->nome;
    $email = $linha->email;
    $senha = $linha->senha;
    $foto = $linha->foto;
    $titulo = "Alterar";
  }
}
?>

<!doctype html>
<html lang="pt-BR" data-bs-theme="auto">

<head>
  <title>Sistema - Lalá Cake</title>
  <?php
  include_once("./layout/head.php");
  ?>
</head>

<body>
  <!-- Icone tema -->
  <!-- SVG é uma imagem em forma de texto -->
  <?php
  include_once("./layout/botao-tema.php");
  include_once("./layout/menu-principal.php");
  include_once("./layout/menu-lateral.php");
  ?>
  <div class="container-fluid">
    <div class="row">

      <!-- Conteudo principal -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <!-- Titulo principal -->
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Usuários - <?= $titulo ?></h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <a href="./cad_usuario.php" class="btn btn-sm btn-primary">
                Novo
              </a>
              <a href="./cad_usuario.php" class="btn btn-sm btn-warning">
                Pesquisa
              </a>
            </div>
          </div>
        </div>

        <!-- Conteudo principal -->
        <div class="card">
          <div class="card-body">
            <form method="post">
              <div class="row">
                <div class="col-md-7">
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label for="usuario_id" class="form-label">ID</label>
                      <input id="usuario_id" name="usuario_id" value="<?= $id ?>" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input id="nome" value="<?= $nome ?>" name="nome" class="form-control" type="text" required>
                  </div>
                  <div class="col-md-12 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" value="<?= $email ?>" name="email" class="form-control" type="email" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input id="senha" value="<?= $senha ?>" name="senha" class="form-control" type="password" required>
                  </div>
                </div>
                <div class="col-md-5">
                  <label class="form-label" for="foto">Foto</label>
                  <input class="form-control" id="foto" name="foto" type="file" accept="image/png, image/jpeg">
                </div>
              </div>
              <div class="col-6">
                <button type="submit" class="btn btn-sucess"></button>
              </div>
            </form>
          </div>
        </div>

      </main>
    </div>
  </div>
  <?php
  include_once("./layout/script-js.php")
  ?>

</body>

</html>