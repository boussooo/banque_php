<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Transactions - Banque Internationale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0056b3;
            --secondary-color: #28a745;
            --danger-color: #dc3545;
            --info-color: #17a2b8;
            --dark-color: #343a40;
            --light-color: #f8f9fa;
        }

        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .bank-header {
            /* background: linear-gradient(135deg, var(--primary-color), #003366); */
            background-color: wheat;
            
            padding: 2rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .transaction-card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            height: 100%;
        }

        .transaction-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
        }

        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            background: rgba(0, 0, 0, 0.05);
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .deposit-card {
            border-top: 4px solid var(--secondary-color);
        }

        .withdraw-card {
            border-top: 4px solid var(--danger-color);
        }

        .history-card {
            border-top: 4px solid var(--info-color);
        }

        .action-btn {
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
        }

        .bank-logo {
            width: 120px;
            height: auto;
        }

        .main-container {
            margin-top: -50px;
        }

        @media (max-width: 768px) {
            .main-container {
                margin-top: 0;
            }
        }
    </style>
</head>

<body>
    <header class="bank-header text-center mb-5">
        <div class="container">
            <img src="" alt="" class="bank-logo mb-3">
            <h1 class="display-5 fw-bold">Gestion des transactions</h1>
            <p class="lead">Effectuez vos opérations bancaires en toute sécurité</p>
        </div>
    </header>

    <div class="container main-container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card transaction-card deposit-card h-100">
                    <div class="card-body text-center p-4">
                        <div class="card-icon mx-auto text-success">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <h3 class="h4 mb-3">Dépôt</h3>
                        <p class="text-muted mb-4">Effectuez un dépôt d'argent sur votre compte sécurisé</p>
                        <a href="index.php?page=depot" class="btn btn-success action-btn">
                            <i class="fas fa-plus-circle me-2"></i> Faire un dépôt
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card transaction-card withdraw-card h-100">
                    <div class="card-body text-center p-4">
                        <div class="card-icon mx-auto text-danger">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <h3 class="h4 mb-3">Retrait</h3>
                        <p class="text-muted mb-4">Retirez des fonds de votre compte en toute simplicité</p>
                        <a href="index.php?page=retrait" class="btn btn-danger action-btn">
                            <i class="fas fa-minus-circle me-2"></i> Faire un retrait
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card transaction-card history-card h-100">
                    <div class="card-body text-center p-4">
                        <div class="card-icon mx-auto text-info">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <h3 class="h4 mb-3">Historique</h3>
                        <p class="text-muted mb-4">Consultez l'historique complet de vos transactions</p>
                        <a href="index.php?page=historique" class="btn btn-info action-btn">
                            <i class="fas fa-history me-2"></i> Voir l'historique
                        </a>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>