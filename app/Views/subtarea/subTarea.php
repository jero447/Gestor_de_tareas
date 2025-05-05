<?php if ($subTarea === null): ?>
    <div class="alerta-subtarea" >
        <p>⚠️ La subtarea no existe o ha sido eliminada.</p>
        <div>
            <a href="<?= site_url("/") ?>" class="btn-volver-home">Volver al home</a>
        </div>
    </div>
    
<?php else: ?>

    <?php if($subTarea["prioridad"] === "Alta"): ?>
                        
            <div class="tarea-card alta">
                <div class="tarea-header">
                    <h2 class="tarea-titulo"><?= $subTarea["titulo"] ?></h2>
                    <span class="tarea-prioridad alta">Prioridad: <?= $subTarea["prioridad"] ?></span>
                </div>

                <p class="tarea-descripcion">
                    <?= $subTarea["descripcion"] ?>
                </p>

                <div class="tarea-detalles">
                    <span class="tarea-estado">Estado: <?= $subTarea["estado"] ?></span>
                    <span class="tarea-fecha">Vence: <?= $subTarea["fecha_de_vencimiento"] ?> </span>
                </div>


                <div class="btn-eliminar-modificar">
                    <?= form_open(site_url("eliminarSubTarea/") . $subTarea["idSubTarea"], ['method' => 'post'])?>
                    <?= form_button(["type" => "submit", "class" => "btn-eliminar", 'content' => 'Eliminar']) ?>
                    <?= form_close() ?>
                    <a href="<?= site_url("pantallaActualizarSubTarea/") . $subTarea["idSubTarea"] ?>" class="btn-modificar">Modificar</a>    
                </div>

            </div>
                        
    <?php elseif($subTarea["prioridad"] === "Normal"):?>
        
            <div class="tarea-card normal">
                <div class="tarea-header">
                    <h2 class="tarea-titulo"><?= $subTarea["titulo"] ?></h2>
                    <span class="tarea-prioridad normal">Prioridad: <?= $subTarea["prioridad"] ?></span>
                </div>

                <p class="tarea-descripcion">
                    <?= $subTarea["descripcion"] ?>
                </p>

                <div class="tarea-detalles">
                    <span class="tarea-estado">Estado: <?= $subTarea["estado"] ?> </span>
                    <span class="tarea-fecha">Vence: <?= $subTarea["fecha_de_vencimiento"] ?></span>
                </div>

                <div class="btn-eliminar-modificar">
                    <?= form_open(site_url("eliminarSubTarea/") . $subTarea["idSubTarea"], ['method' => 'post'])?>
                    <?= form_button(["type" => "submit", "class" => "btn-eliminar", 'content' => 'Eliminar']) ?>
                    <?= form_close() ?>
                    <a href="<?= site_url("pantallaActualizarSubTarea/") . $subTarea["idSubTarea"] ?>" class="btn-modificar">Modificar</a>    
                </div>


            </div>

    <?php else:?>
        
            <div class="tarea-card">
                <div class="tarea-header">
                    <h2 class="tarea-titulo"><?= $subTarea["titulo"] ?></h2>
                    <span class="tarea-prioridad baja">Prioridad: <?= $subTarea["prioridad"] ?> </span>
                </div>

                <p class="tarea-descripcion">
                    <?= $subTarea["descripcion"] ?>
                </p>

                <div class="tarea-detalles">
                    <span class="tarea-estado">Estado: <?= $subTarea["estado"] ?></span>
                    <span class="tarea-fecha">Vence: <?= $subTarea["fecha_de_vencimiento"] ?></span>
                </div>

                <div class="btn-eliminar-modificar">
                    <?= form_open(site_url("eliminarSubTarea/") . $subTarea["idSubTarea"], ['method' => 'post'])?>
                    <?= form_button(["type" => "submit", "class" => "btn-eliminar", 'content' => 'Eliminar']) ?>
                    <?= form_close() ?>
                    <a href="<?= site_url("pantallaActualizarSubTarea/") . $subTarea["idSubTarea"] ?>" class="btn-modificar">Modificar</a>    
                </div>


            </div>
        
    <?php endif?>

<?php endif; ?>
