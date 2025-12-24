<div class="container-fluid">
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0"><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h4>
            <p class="text-muted mb-0"><?php echo htmlspecialchars($subtitle, ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                        <div>
                            <h5 class="mb-1">Visión general del club</h5>
                            <p class="text-muted mb-0">Gestiona socios, finanzas, deporte y cumplimiento normativo desde un solo lugar.</p>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-primary-subtle text-primary">Socios activos</span>
                            <span class="badge bg-success-subtle text-success">Calendario deportivo</span>
                            <span class="badge bg-warning-subtle text-warning">Tesorería al día</span>
                            <span class="badge bg-info-subtle text-info">Cumplimiento legal</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php foreach ($modules as $module): ?>
            <div class="col-md-6 col-xl-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-sm bg-<?php echo $module['color']; ?>-subtle rounded-2 d-flex align-items-center justify-content-center me-2">
                                <i data-feather="<?php echo $module['icon']; ?>" class="text-<?php echo $module['color']; ?>"></i>
                            </div>
                            <h5 class="mb-0"><?php echo htmlspecialchars($module['title'], ENT_QUOTES, 'UTF-8'); ?></h5>
                        </div>
                        <p class="text-muted fs-14"><?php echo htmlspecialchars($module['description'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <ul class="list-unstyled text-muted mb-0">
                            <?php foreach ($module['items'] as $item): ?>
                                <li><?php echo htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
