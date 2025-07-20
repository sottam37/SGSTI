<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	  <link rel="stylesheet type "text/css" href="estilo.css">
    <title>Login Page</title>

						<script language="javascript" src="loginceti.js">
						</script>
                      
				
</head>

  <body>
<div class="row align-items-center h-100 ">
    <div class="col-8 col-md-3 col-xs-8 mx-auto l-form">
        <form class="form" method="post" action="logon_bc.php">
            <img src="https://static.vecteezy.com/system/resources/previews/009/368/914/non_2x/3d-illustrations-computer-and-account-login-and-password-form-page-on-the-screen-sign-in-to-account-user-authorization-login-page-concept-username-password-fields-data-management-png.png" width="250" height="185" class="row mx-auto">
            <div class="form-group ">
                <input type="text" placeholder="Usuário" class="form-control i-form" name="usuario" id="usuario" required>
          </div>
            <div class="form-group">
                <input type="password" placeholder="Senha" class="form-control i-form" name="senha" id="senha" required>
            </div>
            <div class="alert-primary">
                <button type="submit" class="btn btn-dark btn-md btn-block">Entrar</button>
            </div>
      </form>
    </div>
</div>
  </body>

</html>
