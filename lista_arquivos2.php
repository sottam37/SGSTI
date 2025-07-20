<?php
$path = "arquivos/02-GERAL";
$diretorio = dir($path);

#echo "Lista de Arquivos do diretório '<strong>".$path."</strong>':<br /><a href=conteudo.html>VOLTAR</a></font>";
while($arquivo = $diretorio -> read()){
	 echo "<br><div><table>

    <tr>

    </tr>
    <tr>

	
	<td><a href=".$path.$arquivo." target=_new>".$arquivo."</a><br /></td>
	
    </tr>

</table></div>";
#echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />";
}
$diretorio -> close();
?>