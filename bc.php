<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGSTI - Base de Conhecimento</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome para ícones -->
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
            background-color: #dc3545;
            color: #ffffff !important;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }

        .main-content {
            margin-top: 2rem;
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .icon-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .icon-container i {
            font-size: 4rem;
            color: #007bff;
        }

        .list-group-item {
            display: flex;
            align-items: center;
            font-size: 1.1rem;
            cursor: pointer;
        }

        .list-group-item i {
            margin-right: 10px;
            color: #007bff;
            font-size: 1.5rem;
        }

        .list-group-item:hover i {
            color: #ffc107;
        }

        .nested {
            margin-left: 20px;
            display: none;
        }

        .folder-toggle {
            cursor: pointer;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
            text-align: center;
            position: fixed;
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
    </style>
</head>

<body>

    <div class="container">
        <div class="main-content">
            <div class="icon-container">
                <i class="fas fa-folder-open"></i>
                <h5 class="mt-3">Repositório</h5>
            </div>

            <?php
            if (file_exists('lista_arquivos1.php')) {
                include 'lista_arquivos1.php';
            } else {
                echo "<div class='alert alert-warning text-center'><i class='fas fa-exclamation-triangle'></i> Nenhum arquivo encontrado.</div>";
            }
            ?>
        </div>
    </div>

   

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".folder-toggle").forEach(folder => {
                folder.addEventListener("click", function() {
                    let nestedList = this.nextElementSibling;
                    if (nestedList) {
                        nestedList.style.display = nestedList.style.display === "none" ? "block" : "none";
                        this.querySelector("i").classList.toggle("fa-folder");
                        this.querySelector("i").classList.toggle("fa-folder-open");
                    }
                });
            });
        });
    </script>

</body>
</html>
