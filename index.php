<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGSTI - Monitoramento de Serviços</title>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <!-- FontAwesome para Ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: white !important;
        }

        .navbar-nav .nav-link:hover {
            color: #ffc107 !important;
        }

        .logout-btn {
            color: white;
            border: 1px solid white;
        }

        .logout-btn:hover {
            background-color: white;
            color: #343a40;
        }

        .container {
            margin-top: 30px;
        }

        .service-card {
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            color: white;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 150px;
        }

        .service-card i {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        /* Status Cores */
        .status-online { background-color: #28a745; } /* Verde */
        .status-offline { background-color: #dc3545; } /* Vermelho */
        .status-warning { background-color: #ffc107; color: #343a40; } /* Amarelo */
        .status-unknown { background-color: #6c757d; } /* Cinza */

        footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
            text-align: center;
            width: 100%;
            position: fixed;
            bottom: 0;
        }

        footer a {
            color: #ffc107;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    
        <a class="navbar-brand" href="#"><i class="fas fa-server"></i> SGSTI - Monitoramento</a>
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

<!-- Conteúdo -->
<div class="container">
    <h3 class="text-center mb-4"><i class="fas fa-heartbeat"></i> Monitoramento de Serviços</h3>
    
    <div class="row g-3">
        <div class="col-md-4">
            <div class="service-card <?php include 'monitor_mariadb.php'; ?>">
                <i class="fas fa-database"></i>
                <h5>Banco de Dados (MariaDB)</h5>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card <?php include 'monitor_samba.php'; ?>">
                <i class="fas fa-folder-open"></i>
                <h5>Servidor Samba</h5>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-card <?php include 'monitorssh.php'; ?>">
                <i class="fas fa-shield-halved"></i>
                <h5>Servidor SSH</h5>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <p>&copy; <?php echo date("Y"); ?> SGSTI - Todos os direitos reservados.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
