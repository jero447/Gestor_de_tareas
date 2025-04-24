<?php if($tarea["prioridad"] === "Alta"): ?>
                    
        <div class="tarea-card alta">
            <div class="tarea-header">
                <h2 class="tarea-titulo"><?= $tarea["titulo"] ?></h2>
                <span class="tarea-prioridad alta"><?= $tarea["prioridad"] ?></span>
            </div>

            <p class="tarea-descripcion">
                <?= $tarea["descripcion"] ?>
            </p>

            <div class="tarea-detalles">
                <span class="tarea-estado en-proceso">En proceso</span>
                <span class="tarea-fecha">Vence: 26/04/2025</span>
            </div>
        </div>
                      
<?php elseif($tarea["prioridad"] === "Normal"):?>
    
        <div class="tarea-card normal">
            <div class="tarea-header">
                <h2 class="tarea-titulo"><?= $tarea["titulo"] ?></h2>
                <span class="tarea-prioridad normal"><?= $tarea["prioridad"] ?></span>
            </div>

            <p class="tarea-descripcion">
                <?= $tarea["descripcion"] ?>
            </p>

            <div class="tarea-detalles">
                <span class="tarea-estado en-proceso">En proceso</span>
                <span class="tarea-fecha">Vence: 26/04/2025</span>
            </div>
        </div>

<?php else:?>
    
        <div class="tarea-card">
            <div class="tarea-header">
                <h2 class="tarea-titulo"><?= $tarea["titulo"] ?></h2>
                <span class="tarea-prioridad baja"><?= $tarea["prioridad"] ?></span>
            </div>

            <p class="tarea-descripcion">
                <?= $tarea["descripcion"] ?>
            </p>

            <div class="tarea-detalles">
                <span class="tarea-estado en-proceso">En proceso</span>
                <span class="tarea-fecha">Vence: 26/04/2025</span>
            </div>
        </div>
    
 <?php endif?>


