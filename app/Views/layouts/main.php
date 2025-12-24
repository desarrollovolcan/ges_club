<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($title ?? 'Panel principal', ENT_QUOTES, 'UTF-8'); ?></title>

    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <script src="/assets/js/head.js"></script>
</head>

<body data-menu-color="light" data-sidebar="default">
    <div id="app-layout">
        <?php require __DIR__ . '/../partials/sidebar.php'; ?>
        <?php require __DIR__ . '/../partials/topbar.php'; ?>

        <div class="content-page">
            <div class="content">
                <?php require $viewPath; ?>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center text-muted">
                            Gestión de Clubes Deportivos · Chile
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="/assets/libs/jquery/jquery.min.js"></script>
    <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/assets/libs/node-waves/waves.min.js"></script>
    <script src="/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="/assets/libs/feather-icons/feather.min.js"></script>
    <script src="/assets/js/app.js"></script>
</body>

</html>
