<?php if($tarea["prioridad"] === "Alta"): ?>
                    
        <div class="tarea-card alta">
            <div class="tarea-header">
                <h2 class="tarea-titulo"><?= $tarea["titulo"] ?></h2>
                <span class="tarea-prioridad alta">Prioridad: <?= $tarea["prioridad"] ?></span>
            </div>

            <p class="tarea-descripcion">
                <?= $tarea["descripcion"] ?>
            </p>

            <div class="tarea-detalles">
                <span class="tarea-estado">Estado: <?= $tarea["estado"] ?></span>
                <span class="tarea-fecha">Vence: <?= $tarea["fecha_de_vencimiento"] ?></span>
            </div>

            <div class="botones-tarea">
                <?= form_open(site_url("eliminarTarea/" . $tarea["idTarea"]),['method' => 'post'])?>
                <?= form_button(["type" => "submit", "class" => "btn-eliminar", 'content' => 'Eliminar']) ?>
                <?= form_close() ?>
                <a href="" class="btn-modificar">Modificar</a>    
            </div>

        </div>
                      
<?php elseif($tarea["prioridad"] === "Normal"):?>
    
        <div class="tarea-card normal">
            <div class="tarea-header">
                <h2 class="tarea-titulo"><?= $tarea["titulo"] ?></h2>
                <span class="tarea-prioridad normal">Prioridad:<?= $tarea["prioridad"] ?></span>
            </div>

            <p class="tarea-descripcion">
                <?= $tarea["descripcion"] ?>
            </p>

            <div class="tarea-detalles">
                <span class="tarea-estado">Estado: <?= $tarea["estado"] ?></span>
                <span class="tarea-fecha">Vence: <?= $tarea["fecha_de_vencimiento"] ?></span>
            </div>

            <div class="botones-tarea">
                <?= form_open(site_url("eliminarTarea/" . $tarea["idTarea"]),['method' => 'post'])?>
                <?= form_button(["type" => "submit", "class" => "btn-eliminar", 'content' => 'Eliminar']) ?>
                <?= form_close() ?>
                <a href="" class="btn-modificar">Modificar</a>    
            </div>

        </div>

<?php else:?>
    
        <div class="tarea-card">
            <div class="tarea-header">
                <h2 class="tarea-titulo"><?= $tarea["titulo"] ?></h2>
                <span class="tarea-prioridad baja">Prioridad:<?= $tarea["prioridad"] ?></span>
            </div>

            <p class="tarea-descripcion">
                <?= $tarea["descripcion"] ?>
            </p>

            <div class="tarea-detalles">
                <span class="tarea-estado">Estado: <?= $tarea["estado"] ?></span>
                <span class="tarea-fecha">Vence: <?= $tarea["fecha_de_vencimiento"] ?></span>
            </div>

            <div class="botones-tarea">
                <?= form_open(site_url("eliminarTarea/" . $tarea["idTarea"]),['method' => 'post'])?>
                <?= form_button(["type" => "submit", "class" => "btn-eliminar", 'content' => 'Eliminar']) ?>
                <?= form_close() ?>
                <a href="" class="btn-modificar">Modificar</a>    
            </div>

        </div>
    
 <?php endif?>


