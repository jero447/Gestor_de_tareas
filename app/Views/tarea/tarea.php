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

            <div class="container-sub-tareas">
                
                <h3 class="text-listado">Listado de subtareas</h3>

                <?php foreach($listaSubTareas as $subTarea): ?>
                    
                    <?php if($subTarea["prioridad"] === "Alta"): ?>
                    
                    <a class="subtarea alta" href="<?= site_url("subTarea/") . $subTarea["idSubTarea"] ?>">
                        <div class="container-subtarea" >
                            <span class="subtarea-titulo"><?= $subTarea["titulo"]?></span>
                            <span><?= $subTarea["estado"]?></span>
                            <span><?= $subTarea["prioridad"]?></span>
                        </div>
                    </a>
                    
                    
                    <?php elseif($subTarea["prioridad"] === "Normal"):?>

                        <a class="subtarea normal" href="<?= site_url("subTarea/") . $subTarea["idSubTarea"] ?>">
                            <div class="container-subtarea" >
                                <span class="subtarea-titulo"><?= $subTarea["titulo"]?></span>
                                <span><?= $subTarea["estado"]?></span>
                                <span><?= $subTarea["prioridad"]?></span>
                            </div>
                        </a>
                    
                    <?php else:?>

                        <a class="subtarea baja" href="<?= site_url("subTarea/") . $subTarea["idSubTarea"] ?>">
                            <div class="container-subtarea" >
                                <span class="subtarea-titulo"><?= $subTarea["titulo"]?></span>
                                <span><?= $subTarea["estado"]?></span>
                                <span><?= $subTarea["prioridad"]?></span>
                            </div>
                        </a>

                    <?php endif?>
                    
                <?php endforeach?>
                
            </div>

            <div>
                <?= form_open(site_url("formCrearSubTarea/" . $tarea["idTarea"]), ['method' => 'get'])?>
                    <?= form_button(["type" => "submit", "class" => "btn-agregar-subtarea" ,'content' => 'Agregar Subtarea']) ?> 
                <?= form_close() ?>
            </div>

            <div class="btn-eliminar-modificar-tarea">
                <?= form_open(site_url("eliminarTarea/" . $tarea["idTarea"]),['method' => 'post'])?>
                <?= form_button(["type" => "submit", "class" => "btn-eliminar", 'content' => 'Eliminar']) ?>
                <?= form_close() ?>
                <a href="<?= site_url("pantallaActualizarTarea/" . $tarea["idTarea"]) ?>" class="btn-modificar">Modificar</a>    
            </div>

        </div>
                      
<?php elseif($tarea["prioridad"] === "Normal"):?>
    
        <div class="tarea-card normal">
            <div class="tarea-header">
                <h2 class="tarea-titulo"><?= $tarea["titulo"] ?></h2>
                <span class="tarea-prioridad normal">Prioridad: <?= $tarea["prioridad"] ?></span>
            </div>

            <p class="tarea-descripcion">
                <?= $tarea["descripcion"] ?>
            </p>

            <div class="tarea-detalles">
                <span class="tarea-estado">Estado: <?= $tarea["estado"] ?></span>
                <span class="tarea-fecha">Vence: <?= $tarea["fecha_de_vencimiento"] ?></span>
            </div>

            <div class="container-sub-tareas">
                
                <h3 class="text-listado">Listado de subtareas</h3>

                <?php foreach($listaSubTareas as $subTarea): ?>
                    
                    <?php if($subTarea["prioridad"] === "Alta"): ?>
                    
                    <a class="subtarea alta" href="<?= site_url("subTarea/") . $subTarea["idSubTarea"] ?>">
                        <div class="container-subtarea" >
                            <span class="subtarea-titulo"><?= $subTarea["titulo"]?></span>
                            <span><?= $subTarea["estado"]?></span>
                            <span><?= $subTarea["prioridad"]?></span>
                        </div>
                    </a>
                    
                    
                    <?php elseif($subTarea["prioridad"] === "Normal"):?>

                        <a class="subtarea normal" href="<?= site_url("subTarea/") . $subTarea["idSubTarea"] ?>">
                            <div class="container-subtarea" >
                                <span class="subtarea-titulo"><?= $subTarea["titulo"]?></span>
                                <span><?= $subTarea["estado"]?></span>
                                <span><?= $subTarea["prioridad"]?></span>
                            </div>
                        </a>
                    
                    <?php else:?>

                        <a class="subtarea baja" href="<?= site_url("subTarea/") . $subTarea["idSubTarea"] ?>">
                            <div class="container-subtarea" >
                                <span class="subtarea-titulo"><?= $subTarea["titulo"]?></span>
                                <span><?= $subTarea["estado"]?></span>
                                <span><?= $subTarea["prioridad"]?></span>
                            </div>
                        </a>

                    <?php endif?>
                    
                <?php endforeach?>
                
            </div>

            <div>
                <?= form_open(site_url("formCrearSubTarea/" . $tarea["idTarea"]), ['method' => 'get'])?>
                    <?= form_button(["type" => "submit", "class" => "btn-agregar-subtarea" ,'content' => 'Agregar Subtarea']) ?> 
                <?= form_close() ?>
            </div>

            <div class="btn-eliminar-modificar-tarea">
                <?= form_open(site_url("eliminarTarea/" . $tarea["idTarea"]),['method' => 'post'])?>
                <?= form_button(["type" => "submit", "class" => "btn-eliminar", 'content' => 'Eliminar']) ?>
                <?= form_close() ?>
                <a href="<?= site_url("pantallaActualizarTarea/" . $tarea["idTarea"]) ?>" class="btn-modificar">Modificar</a>    
            </div>


        </div>

<?php else:?>
    
        <div class="tarea-card">
            <div class="tarea-header">
                <h2 class="tarea-titulo"><?= $tarea["titulo"] ?></h2>
                <span class="tarea-prioridad baja">Prioridad: <?= $tarea["prioridad"] ?></span>
            </div>

            <p class="tarea-descripcion">
                <?= $tarea["descripcion"] ?>
            </p>

            <div class="tarea-detalles">
                <span class="tarea-estado">Estado: <?= $tarea["estado"] ?></span>
                <span class="tarea-fecha">Vence: <?= $tarea["fecha_de_vencimiento"] ?></span>
            </div>

            <div class="container-sub-tareas">
                
                <h3 class="text-listado">Listado de subtareas</h3>

                <?php foreach($listaSubTareas as $subTarea): ?>
                    
                    <?php if($subTarea["prioridad"] === "Alta"): ?>
                    
                    <a class="subtarea alta" href="<?= site_url("subTarea/") . $subTarea["idSubTarea"] ?>">
                        <div class="container-subtarea" >
                            <span class="subtarea-titulo"><?= $subTarea["titulo"]?></span>
                            <span><?= $subTarea["estado"]?></span>
                            <span><?= $subTarea["prioridad"]?></span>
                        </div>
                    </a>
                    
                    
                    <?php elseif($subTarea["prioridad"] === "Normal"):?>

                        <a class="subtarea normal" href="<?= site_url("subTarea/") . $subTarea["idSubTarea"] ?>">
                            <div class="container-subtarea" >
                                <span class="subtarea-titulo"><?= $subTarea["titulo"]?></span>
                                <span><?= $subTarea["estado"]?></span>
                                <span><?= $subTarea["prioridad"]?></span>
                            </div>
                        </a>
                    
                    <?php else:?>

                        <a class="subtarea baja" href="<?= site_url("subTarea/") . $subTarea["idSubTarea"] ?>">
                            <div class="container-subtarea" >
                                <span class="subtarea-titulo"><?= $subTarea["titulo"]?></span>
                                <span><?= $subTarea["estado"]?></span>
                                <span><?= $subTarea["prioridad"]?></span>
                            </div>
                        </a>

                    <?php endif?>
                    
                <?php endforeach?>
                
            </div>

            <div>
                <?= form_open(site_url("formCrearSubTarea/" . $tarea["idTarea"]), ['method' => 'get'])?>
                    <?= form_button(["type" => "submit", "class" => "btn-agregar-subtarea" ,'content' => 'Agregar Subtarea']) ?> 
                <?= form_close() ?>
            </div>

            <div class="btn-eliminar-modificar-tarea">
                <?= form_open(site_url("eliminarTarea/" . $tarea["idTarea"]),['method' => 'post'])?>
                <?= form_button(["type" => "submit", "class" => "btn-eliminar", 'content' => 'Eliminar']) ?>
                <?= form_close() ?>
                <a href="<?= site_url("pantallaActualizarTarea/" . $tarea["idTarea"]) ?>" class="btn-modificar">Modificar</a>    
            </div>


        </div>
    
 <?php endif?>


