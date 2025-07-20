function Login() {
 
  var usuario = document.getElementById("user").value;
  var senha = document.getElementById("pass").value;
 
  

  if (usuario == "admin" && senha == "admin") { 
  
 //window.open("main.html");
 //window.close("index.html");
 //window.location = ("main.html");
	  
		//document.write("dasdsada");  
   // alert ("Usuário/Senha Inválidos");
   //document.write("<html><head><title>Bem vindo</title><link rel=stylesheet type text/css href=estilo.css></head><body>TESTE</body>");
 
  document.write("<a href=main.html>clique aqui para continuar</a>");
   	  
  }
  else   {
	  
 
   alert ("Usuário/Senha Inválidos");
   
   
   
	  
  }
  
  
}