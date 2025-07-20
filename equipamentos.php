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
    Equipamentos
    <div class="formulario-container">
    <form action="cadastrar_equipamento.php" method="post">
      <label for="nome">Placa:</label>
      <input type="text" id="placa" name="placa" required>
      <label for="sobrenome">Tipo de Equipamento:</label>
      <select class="input" id="id_tipo_equipamento" name="id_tipo_equipamento">
        <option value="1001">COMPUTADOR DESKTOP 4GB </option>
      
      <input type="submit" value="Enviar">
      <input type="reset" value="Cancelar">
    </form>
  </div>
</body>
</html>