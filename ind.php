<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGSTI - INDICADORES</title>
     <!-- Bootstrap -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <!-- FontAwesome para Ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .indicator-card {
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            color: #fff;
            font-weight: bold;
        }
        .navbar-brand {
            font-weight: bold;
            color: #ffffff !important;
        }
        .navbar {
            background-color: #343a40;
        }

        .navbar-nav .nav-link {
            color: #ffffff !important;
            margin-right: 1rem;

        }
        .navbar-nav .nav-link:hover {
            color: #ffc107 !important;
        }
       

        .logout-btn {
            color: #007bff;
            border: 1px solid #007bff;
        }

        .logout-btn:hover {
            background-color: #007bff;
            color: white;
        }
    

        .main-title {
            margin-top: 50px;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
            
            bottom: 0;
            width: 100%;
        }

        footer a {
            color: #ffc107;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        .card-total {
            background-color: #007bff; /* Azul */
        }

        .card-diagnosticos {
            background-color: #28a745; /* Verde */
        }

        .card-devolvidos {
            background-color: #ffc107; /* Amarelo */
            color: #343a40;
        }

        .card-trabalhados {
            background-color: #dc3545; /* Vermelho */
        }

        .card-impro {
            background-color: #17a2b8; /* Azul claro */
        }

        .indicator-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .indicator-card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    
        <a class="navbar-brand" href="#"><i class="fas fa-server"></i> SGSTI - KPI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="http://servidor/sgsti/index.php"><i class="fas fa-house"></i> Home</a></li>
                <li class="nav-item"><a class="nav-link" href="http://servidor/sgsti/ind.php"><i class="fas fa-chart-line"></i> Indicadores</a></li>
                <li class="nav-item"><a class="nav-link" href="http://servidor/sgsti/consulta_os.php"><i class="fas fa-tools"></i> Produção</a></li>
                <li class="nav-item"><a class="nav-link" href="http://servidor/sgsti/pesquisar.php"><i class="fas fa-user"></i> Clientes</a></li>
               
            </ul>
            <a class="btn btn-danger" href="logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
        </div>
    
</nav>

    </div>
    <div class="container mt-5">
     
        <div class="indicator-container">
            <!-- Card Total OS -->
            <div class="indicator-card card-total">
              
                <?php include 'total_os.php'; ?>
            </div>
            <!-- Card Diagnósticos -->
            <div class="indicator-card card-diagnosticos">
                
                <?php include 'diagno.php'; ?>
            </div>
            <!-- Card Devolvidos -->
            <div class="indicator-card card-devolvidos">
                
                <?php include 'devolvidos.php'; ?>
            </div>
            <!-- Card Trabalhados -->
            <div class="indicator-card card-trabalhados">
                
                <?php include 'trabalhados.php'; ?>
            </div>
            <!-- Card Improcedentes -->
            <div class="indicator-card card-impro">
               
                <?php include 'impro.php'; ?>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            &copy; <?php echo date("Y"); ?> SGSTI - Todos os direitos reservados.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
