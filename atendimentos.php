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
      <li><a href="#">Usuários</a></li>
      <li><a href="#">Departamentos</a></li>
      
      <li><a href="equipamentos.php">Equipamentos</a></li>
      <li><a href="#">Técnicos</a></li>
      <li><a href="atendimentos.php">Ordens de Serviço</a></li>
      <li><a href="login_bc.php" target="_blank">BC</a></li>
    </ul>
  </nav>
  </div>
    <div>
        <form method="post" action="post.php">
            WO:<input type="text" id="os" name="os">
            Data:<input type="date" id="dt_atd" name="dt_atd">
            UF:
            <select  id="uf" name="uf">
                <option>MG</option>
            </select>
            STATUS:
            <select id="situacao" name="situacao" >
                
                <option>CONCLUIDO</option>
                <option>DEVOLVIDO</option>
                <option>DIAGNOSTICO</option>
                <option>IMPRODUTIVO</option>
            </select>
            DENTRO DO SLA?:
            <select id="sla" name="sla">
                
                <option>SIM</option>
                <option>NÃO</option>
            </select>
           EXECUÇÃO:
            <select id="grupo" name="grupo">
                
                <option>REMOTO</option>
                <option>PRESENCIAL</option>
            </select>
        <button type="submit">ENVIAR</button>
        <button type="submit">CANCELAR</button>
        </form>
    </div>
    
</body>
</html>