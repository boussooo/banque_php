<?php
$sql = "
    SELECT t.type_trans, t.montant, t.date, c.code
    FROM transactions t
    JOIN compte c ON t.idCompte = c.idCompte
    ORDER BY t.date DESC
    LIMIT 3
";
$result = mysqli_query($connection, $sql);
?>
<style>
    body {
        background-color: wheat;
        font-family: 'Poppins', sans-serif;
    }

    .header {
        background-color: #fff;
        padding: 1rem 2rem;
        border-bottom: 1px solid #e0e0e0;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    .user-info {
        display: flex;
        align-items: center;
    }

    .user-info img {
        border-radius: 50%;
        border: 2px solid #D4AF37;
    }

    .user-details {
        font-size: 0.9rem;
    }

    .user-name {
        font-weight: 600;
    }

    .user-role {
        color: #777;
    }

    .stat-card {
        background: #ffffff;
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s;
    }

    .stat-card:hover {
        transform: translateY(-4px);
    }

    .stat-card .icon {
        font-size: 1.8rem;
        color: #0B1D3A;
        margin-bottom: 0.5rem;
    }

    .stat-card .value {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .stat-card .label {
        color: #777;
    }

    .trend.up {
        color: green;
    }

    .trend.down {
        color: red;
    }

    .data-card {
        background: #fff;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        margin-top: 2rem;
    }

    .btn-gold {
        background-color: #D4AF37;
        color: #fff;
        border: none;
    }

    .btn-gold:hover {
        background-color: #c19e30;
    }

    .badge-success {
        background-color: #28a745;
        color: white;
    }

    .badge-danger {
        background-color: #dc3545;
        color: white;
    }

    .badge-warning {
        background-color: #ffc107;
        color: #212529;
    }

    .fade-in {
        opacity: 0;
        animation: fadeIn 0.8s ease forwards;
    }

    .delay-1 {
        animation-delay: 0.2s;
    }

    .delay-2 {
        animation-delay: 0.4s;
    }

    .delay-3 {
        animation-delay: 0.6s;
    }

    .delay-4 {
        animation-delay: 0.8s;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 576px) {
        .table thead {
            display: none;
        }

        .table tbody tr {
            display: block;
            margin-bottom: 1rem;
            background: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            padding: 1rem;
        }

        .table td {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            font-size: 0.9rem;
            border: none;
        }

        .table td::before {
            content: attr(data-label);
            font-weight: bold;
            color: #555;
        }
    }
</style>
</head>

<body>
    <div class="d-flex flex-column min-vh-100">
        <div class="main-content container-fluid p-0">

            <!-- Header -->
            <div class="header fade-in">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                    <h2 class="mb-0">Tableau de Bord</h2>
                    <div class="user-info d-flex align-items-center">
                        <img src="https://placehold.co/40x40/0B1D3A/D4AF37?text=AD&font=poppins" alt="Photo de profil administrateur">
                        <div class="user-details ms-2 d-none d-md-block">
                            <div class="user-name">
                                <a class="nav-link disabled" href="#">
                                    <?php
                                    echo $_SESSION["prenom"] . " " . $_SESSION["nom"]
                                    ?>
                                </a>
                            </div>
                            <!-- <div class="user-role">Administrateur</div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div id="dashboard-content" class="m-4">

            <!-- Stats Cards -->
            <div class="row g-4 fade-in">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="stat-card">
                        <div class="icon"><i class="fas fa-users"></i></div>
                        <div class="value">1,254</div>
                        <div class="label">Clients Actifs</div>
                        <div class="trend up"><i class="fas fa-arrow-up"></i> 5.2% ce mois</div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="stat-card delay-1">
                        <div class="icon"><i class="fas fa-wallet"></i></div>
                        <div class="value">2,874</div>
                        <div class="label">Comptes Bancaires</div>
                        <div class="trend up"><i class="fas fa-arrow-up"></i> 8.7% ce mois</div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="stat-card delay-2">
                        <div class="icon"><i class="fas fa-money-bill-wave"></i></div>
                        <div class="value">408.2M CFA</div>
                        <div class="label">Actifs Sous Gestion</div>
                        <div class="trend up"><i class="fas fa-arrow-up"></i> 12.4% ce mois</div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="stat-card delay-3">
                        <div class="icon"><i class="fas fa-hand-holding-usd"></i></div>
                        <div class="value">101.7M CFA</div>
                        <div class="label">Crédits Octroyés</div>
                        <div class="trend down"><i class="fas fa-arrow-down"></i> 2.1% ce mois</div>
                    </div>
                </div>
            </div>

            <!-- Rapport Financier -->
            <div class="data-card fade-in delay-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Rapports Financiers</h5>
                    <div class="d-flex">
                        <button class="btn btn-gold btn-sm me-2">
                            <i class="fas fa-download me-1"></i> Télécharger
                        </button>
                        <button class="btn btn-gold btn-sm">
                            <i class="fas fa-chart-line me-1"></i> Voir Graphique
                        </button>
                    </div>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Type de Rapport</th>
                                <th>Période</th>
                                <th>Montant Total CFA</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="Type de Rapport">Rapport Mensuel</td>
                                <td data-label="Période">Octobre 2023</td>
                                <td data-label="Montant Total">111 500 000 CFA</td>
                                <td data-label="Statut"><span class="badge badge-success">Disponible</span></td>
                                <td data-label="Actions">
                                    <button class="btn btn-sm btn-primary">Voir</button>
                                    <button class="btn btn-sm btn-danger">Supprimer</button>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="Type de Rapport">Rapport Trimestriel</td>
                                <td data-label="Période">Q3 2023</td>
                                <td data-label="Montant Total">45 500 000 CFA</td>
                                <td data-label="Statut"><span class="badge badge-warning">En Attente</span></td>
                                <td data-label="Actions">
                                    <button class="btn btn-sm btn-primary">Voir</button>
                                    <button class="btn btn-sm btn-danger">Supprimer</button>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="Type de Rapport">Rapport Annuel</td>
                                <td data-label="Période">2022</td>
                                <td data-label="Montant Total">1 555 000 000 CFA</td>
                                <td data-label="Statut"><span class="badge badge-success">Disponible</span></td>
                                <td data-label="Actions">
                                    <button class="btn btn-sm btn-primary">Voir</button>
                                    <button class="btn btn-sm btn-danger">Supprimer</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Notifications -->
            <div class="data-card fade-in delay-4">
                <div class="card-header">
                    <h5>Notifications</h5>
                </div>
                <ul class="list-group mt-3">
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <?php
                            $type = strtolower($row['type_trans']);
                            $montant = number_format($row['montant'], 0, ',', ' ');
                            $code = $row['code'];
                            $date = date("d/m/Y H:i", strtotime($row['date']));

                            if ($type === 'depot') {
                                $message = "💰 Dépôt de {$montant} CFA sur le compte #{$code}";
                                $badge = "success";
                                $label = "Nouveau";
                            } elseif ($type === 'retrait') {
                                $message = "🔻 Retrait de {$montant} CFA sur le compte #{$code}";
                                $badge = "danger";
                                $label = "Urgent";
                            } else {
                                $message = "Transaction inconnue";
                                $badge = "secondary";
                                $label = "Info";
                            }
                            ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <?= $message ?><br><small class="text-muted"><?= $date ?></small>
                                </div>
                                <span class="badge badge-<?= $badge ?>"><?= $label ?></span>
                            </li>

                        <?php endwhile; ?>
                    <?php else: ?>
                        <li class="list-group-item text-center text-muted">Aucune transaction récente</li>
                    <?php endif; ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Rapport mensuel généré pour Octobre 2023
                        <span class="badge badge-success">Info</span>
                    </li>
                </ul>
            </div>


            <!-- Tendances du Marché -->
            <div class="data-card fade-in delay-4">
                <div class="card-header">
                    <h5>Tendances du Marché</h5>
                </div>
                <div class="mt-3">
                    <p>Les tendances actuelles du marché montrent une augmentation des investissements dans les technologies financières.</p>
                    <p>Les actions des entreprises de technologie financière ont augmenté de 15% au cours du dernier trimestre.</p>
                </div>
            </div>

            <!-- Graphique de Performance -->
            <div class="data-card fade-in delay-4">
                <div class="card-header">
                    <h5>Graphique de Performance</h5>
                </div>
                <div class="mt-3">
                    <canvas id="performanceChart" style="height: 300px;"></canvas>
                </div>
            </div>

        </div>
    </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('performanceChart').getContext('2d');
        const performanceChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Performance Financière',
                    data: [1200000, 1500000, 1300000, 1700000, 1600000, 1800000, 2000000],
                    borderColor: '#D4AF37',
                    backgroundColor: 'rgba(212, 175, 55, 0.2)',
                    borderWidth: 2,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>