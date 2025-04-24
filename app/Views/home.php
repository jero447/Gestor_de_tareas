<main>


<div class="container-sidenav">
    <div class="sidenav">
        <div class="container-crear">
            <a class="btn-crear" href="<?= site_url("formCrearTarea") ?>">Crear una nueva tarea</a>
        </div>
        <div class="container-completadas">
            <a class="btn-completadas" href="">Tareas Completadas</a>
        </div>
        <div class="filtros">
            <p>Filtros</p>
        </div>
    </div>
</div>

<div class="container-lista-tareas">
    <h2>Lista de Tareas</h2>
    <div class="lista-tareas">
        
        <?php foreach($tareas as $tarea):?>
            <?php if($tarea["prioridad"] === "Alta"): ?>
                    
                <div class="tarea alta">
                    <div class="info-tarea">
                        <h3><?= $tarea["titulo"];?></h3>
                        <p>Prioridad:<?= " " . $tarea["prioridad"] ?></p>
                        <p>Estado:<?=  " " . $tarea["estado"] ?></p>
                    </div>
                    <a class="btn-ver" href="<?= site_url("pantallaTarea/" . $tarea["idTarea"]) ?>">Ver Tarea</a>
                </div>
                  
            <?php elseif($tarea["prioridad"] === "Normal"):?>

                <div class="tarea normal">
                    <div class="info-tarea">
                        <h3><?= $tarea["titulo"];?></h3>
                        <p>Prioridad:<?= " " . $tarea["prioridad"] ?></p>
                        <p>Estado: <?= " " . $tarea["estado"] ?></p>
                    </div>
                    <a class="btn-ver" href="<?= site_url("pantallaTarea/" . $tarea["idTarea"]) ?>">Ver Tarea</a>
                </div>

            <?php else:?>

            <div class="tarea">
                <div class="info-tarea">
                    <h3><?= $tarea["titulo"];?></h3>
                    <p>Prioridad: <?= " " . $tarea["prioridad"] ?></p>
                    <p>Estado: <?=  " " . $tarea["estado"] ?></p>
                </div>
                <a class="btn-ver" href="<?= site_url("pantallaTarea/" . $tarea["idTarea"]) ?>">Ver Tarea</a>
            </div>

            <?php endif?>

        <?php endforeach?>

        
    </div>
</div>

</main>

