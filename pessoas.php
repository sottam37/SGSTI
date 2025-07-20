<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="topo">
<nav class="menu-horizontal">
<ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="pessoas.php">Pessoas</a></li>
      <li><a href="login.php">Usuários</a></li>
      <li><a href="#">Departamentos</a></li>
      
      <li><a href="equipamentos.php">Equipamentos</a></li>
      <li><a href="#">Técnicos</a></li>
      <li><a href="#">Ordens de Serviço</a></li>
      <li><a href="#">BC</a></li>
    </ul>
  </nav>
  </div>
  <div class="conteudo">
    pessoas

    <div class="formulario-container">
    <form action="cadastrar_pessoa.php" method="post">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" required>
      <label for="sobrenome">Sobrenome:</label>
      <input type="text" id="sobrenome" name="sobrenome" required>
      <label for="CPF">CPF:</label>
      <input type="text" id="cpf" name="cpf" required>
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" required>
      <label for="telefone">Telefone:</label>
      <input type="text" id="telefone" name="telefone" required>
      <input type="submit" value="Enviar">
      <input type="reset" value="Cancelar">
    </form>
  </div>
</body>
</html>