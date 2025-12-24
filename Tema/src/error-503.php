<!DOCTYPE html>
<html lang="en">
    <head>

        <?php $title = "Error 503";
        include 'partials/title-meta.php' ?>

        <?php include 'partials/head-css.php'; ?>

    </head>

    <body class="maintenance-bg-image">

        <!-- Begin page -->
        <div class="maintenance-pages">
            <div class="container-fluid p-0">
                <div class="row">

                    <div class="col-xl-12 align-self-center">
                        <div class="row">
                            <div class="col-md-5 mx-auto">
                                <div class="text-center">

                                    <div class="mb-0">
                                        <h3 class="mt-4 fw-semibold text-dark text-capitalize">Service unavailable</h3>
                                        <p class="text-muted">Temporary service outage. Please try again later.</p>
                                    </div>

                                    <a class="btn btn-primary mt-3 me-1" href="index.php">Back to Home</a>

                                    <div class="maintenance-img mt-4">
                                        <img src="assets/images/svg/503-error.svg" class="img-fluid" alt="coming-soon">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- END wrapper -->

        <?php include 'partials/vendor.php'; ?>

        <!-- App js-->
        <script src="assets/js/app.js"></script>
        
    </body>
</html>