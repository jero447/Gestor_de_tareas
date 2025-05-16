<?php
function mostrarTareas($tipo,$tareasFiltradas) {

    foreach($tareasFiltradas as $tarea):
        
        if($tipo === 1){
            if($tarea["prioridad"] === "Alta"){
            echo "<div class='tarea alta'>
                    <div class='info-tarea'>
                        <h3>" . $tarea['titulo'] . "</h3>
                        <p>Prioridad: " . $tarea['prioridad'] . "</p>
                        <p>Estado: " . $tarea['estado'] . "</p>
                        <p>Vencimiento: " . $tarea['fecha_de_vencimiento'] . "</p>
                    </div>
                    <a class='btn-ver' href='" . site_url('pantallaTarea/' . $tarea['idTarea']) . "'>Ver Tarea</a>
                </div>";
            }
                
            elseif($tarea["prioridad"] === "Normal"){
                echo '<div class="tarea normal">
                            <div class="info-tarea">
                                <h3>' . $tarea["titulo"] . '</h3>
                                <p>Prioridad:' . " " . $tarea["prioridad"] . '</p>
                                <p>Estado: ' . " " . $tarea["estado"] . '</p>
                                <p>Vencimiento:' . " " . $tarea["fecha_de_vencimiento"] . '</p>
                            </div>
                            <a class="btn-ver" href="' . site_url("pantallaTarea/" . $tarea["idTarea"]) . '">Ver Tarea</a>
                    </div>';
            }
    

            else {
                echo '<div class="tarea">
                        <div class="info-tarea">
                            <h3>' . $tarea["titulo"] . '</h3>
                            <p>Prioridad: ' . $tarea["prioridad"] . '</p>
                            <p>Estado: ' . $tarea["estado"] . '</p>
                            <p>Vencimiento: ' . $tarea["fecha_de_vencimiento"] . '</p>
                        </div>
                        <a class="btn-ver" href="' . site_url("pantallaTarea/" . $tarea["idTarea"]) . '">Ver Tarea</a>
                    </div>';
            }
        }else{

            if($tarea["prioridad"] === "Alta"){
            echo "<div class='tarea alta'>
                    <div class='info-tarea'>
                        <h3>" . $tarea['titulo'] . "</h3>
                        <p>Prioridad: " . $tarea['prioridad'] . "</p>
                        <p>Estado: " . $tarea['estado'] . "</p>
                        <p>Vencimiento: " . $tarea['fecha_de_vencimiento'] . "</p>
                    </div>
                    <a class='btn-ver' href='" . site_url('/subTarea/' . $tarea['idSubTarea']) . "'>Ver Tarea</a>
                </div>";
            }
                
            elseif($tarea["prioridad"] === "Normal"){
                echo '<div class="tarea normal">
                            <div class="info-tarea">
                                <h3>' . $tarea["titulo"] . '</h3>
                                <p>Prioridad:' . " " . $tarea["prioridad"] . '</p>
                                <p>Estado: ' . " " . $tarea["estado"] . '</p>
                                <p>Vencimiento:' . " " . $tarea["fecha_de_vencimiento"] . '</p>
                            </div>
                            <a class="btn-ver" href="' . site_url('/subTarea/' . $tarea['idSubTarea']) . '">Ver Tarea</a>
                    </div>';
            }
    

            else {
                echo '<div class="tarea">
                        <div class="info-tarea">
                            <h3>' . $tarea["titulo"] . '</h3>
                            <p>Prioridad: ' . $tarea["prioridad"] . '</p>
                            <p>Estado: ' . $tarea["estado"] . '</p>
                            <p>Vencimiento: ' . $tarea["fecha_de_vencimiento"] . '</p>
                        </div>
                        <a class="btn-ver" href="' . site_url('/subTarea/' . $tarea['idSubTarea']) . '">Ver Tarea</a>
                    </div>';
            }

        }

       

    endforeach;

}


function ordenarPorVencimiento($tareas){

    $tareasPorVencimiento = $tareas;
    usort($tareasPorVencimiento,function($a,$b){
        $fechaActual = strtotime(date("Y-m-d"));

        $segA = strtotime($a["fecha_de_vencimiento"]) - $fechaActual;
        $segB =  strtotime($b["fecha_de_vencimiento"]) - $fechaActual;

        return $segA -$segB;
    });

    return $tareasPorVencimiento;

}

function ordenarPorPrioridad($tareas){

    $tareasPorPrioridad = $tareas;
    usort($tareasPorPrioridad, function($a,$b){
        $ordenPrioridad = [
            "Alta" => 1,
            "Normal" => 2,
            "Baja" => 3
        ];

        $prioridadA = $ordenPrioridad[$a["prioridad"]];
        $prioridadB = $ordenPrioridad[$b["prioridad"]];

    
        return $prioridadA - $prioridadB;

    });

    return $tareasPorPrioridad;

}

?>


<main>

<div class="container-sidenav">
    <div class="sidenav">
        <div class="container-crear">
            <a class="btn-crear" href="<?= site_url("formCrearTarea") ?>">Crear una nueva tarea</a>
            <div>
                <button class="btn-sub-responsable" id="btn-responsable">Subtareas como responsable</button>
            </div>
        </div>
        
        

        <p>Filtros</p>

        <div class="filtros">
            <div class="container-btn-filtros">
                <button class="btn-completadas" id="btn-completadas" >Tareas Completadas</button>
            </div>
            <div class="container-btn-filtros">
                <button class="btn-completadas btn-filtro-activo" id="btn-incompletas" >Tareas Incompletas</button>
            </div>
            <div class="container-btn-filtros">
                <button class="btn-completadas" id="btn-por-vencimiento" > Mostrar Por Vencimiento</button>
            </div>
            <div class="container-btn-filtros">
                <button class="btn-completadas" id="btn-por-prioridad" > Mostrar Por Prioridad</button>
            </div>
        </div>
        
        
    </div>
</div>


<!-- Lista de tareas incompletas -->


<div class="container-lista-tareas" id="listaTareas">
    <h2>Lista de Tareas</h2>
    <div class="lista-tareas">
        
        <?php mostrarTareas(1,$tareas) ?>

    </div>

</div>


<!-- Lista de tareas completadas -->


<div class="container-lista-tareas oculto" id="listaTareasCompletadas">
    <h2>Lista de Tareas Completadas</h2>
    <div class="lista-tareas">
            
        <?php mostrarTareas(1,array_filter($tareas, function($tarea){
        return $tarea["estado"] === "Completado";
        })) ?>

    </div>

</div>


<!-- Lista de tareas por vencimiento -->


<div class="container-lista-tareas oculto" id="listaTareasPorVencimiento">
    <h2>Lista de Tareas Por Vencimiento</h2>
    <div class="lista-tareas">
            
        <?php mostrarTareas(1,ordenarPorVencimiento($tareas)); ?>

    </div>

</div>


<!-- Lista de tareas por prioridad -->


<div class="container-lista-tareas oculto" id="listaTareasPorPrioridad">
    <h2>Lista de Tareas Por Prioridad</h2>
    <div class="lista-tareas">
            
        <?php mostrarTareas(1,ordenarPorPrioridad($tareas)); ?>

    </div>

</div>



<!-- Lista de tareas por tareas responsable -->


<div class="container-lista-tareas oculto" id="listaSubTareasResponsable">
    <h2>Lista de subtareas como responsable</h2>
    <div class="lista-tareas">
            
        <?php mostrarTareas(2,array_filter($subtareas, function($subtarea){
            return $subtarea["idResponsable"] === session("idUsuario");
        })); ?>

    </div>

</div>


<script>

    let botonCompletadas = document.getElementById("btn-completadas")
    let botonIncompletas = document.getElementById("btn-incompletas")
    let botonVencimiento = document.getElementById("btn-por-vencimiento")
    let botonPrioridad = document.getElementById("btn-por-prioridad")
    let botonTareasResponsable =document.getElementById("btn-responsable");

    let listaTarea = document.getElementById("listaTareas")
    let listaTareaCompletada = document.getElementById("listaTareasCompletadas")
    let listaPorVencimiento = document.getElementById("listaTareasPorVencimiento")
    let listaPorPrioridad = document.getElementById("listaTareasPorPrioridad")
    let listaTaresResponsable = document.getElementById("listaSubTareasResponsable")

    botonCompletadas.addEventListener("click", () => {
        listaTareaCompletada.classList.remove("oculto")
        listaTarea.classList.add("oculto")
        listaPorVencimiento.classList.add("oculto")
        listaPorPrioridad.classList.add("oculto")
        listaSubTareasResponsable.classList.add("oculto")

        botonCompletadas.classList.add("btn-filtro-activo")
        botonIncompletas.classList.remove("btn-filtro-activo")
        botonVencimiento.classList.remove("btn-filtro-activo")
        botonPrioridad.classList.remove("btn-filtro-activo")
        botonTareasResponsable.classList.remove("btn-filtro-activo")
    })

    botonIncompletas.addEventListener("click", () =>{
        listaTarea.classList.remove("oculto")
        listaTareaCompletada.classList.add("oculto")
        listaPorVencimiento.classList.add("oculto")
        listaPorPrioridad.classList.add("oculto")
        listaSubTareasResponsable.classList.add("oculto")

        botonIncompletas.classList.add("btn-filtro-activo")
        botonCompletadas.classList.remove("btn-filtro-activo")
        botonVencimiento.classList.remove("btn-filtro-activo")
        botonPrioridad.classList.remove("btn-filtro-activo")
        botonTareasResponsable.classList.remove("btn-filtro-activo")
    })

    botonVencimiento.addEventListener("click", () => {
        listaPorVencimiento.classList.remove("oculto")
        listaTarea.classList.add("oculto")
        listaTareaCompletada.classList.add("oculto")
        listaPorPrioridad.classList.add("oculto")
        listaSubTareasResponsable.classList.add("oculto")

        botonVencimiento.classList.add("btn-filtro-activo")
        botonCompletadas.classList.remove("btn-filtro-activo")
        botonPrioridad.classList.remove("btn-filtro-activo")
        botonIncompletas.classList.remove("btn-filtro-activo")
        botonTareasResponsable.classList.remove("btn-filtro-activo")
    })

    botonPrioridad.addEventListener("click", () =>{
        listaPorPrioridad.classList.remove("oculto")
        listaTarea.classList.add("oculto")
        listaTareaCompletada.classList.add("oculto")
        listaPorVencimiento.classList.add("oculto")
        listaSubTareasResponsable.classList.add("oculto")

        botonPrioridad.classList.add("btn-filtro-activo")
        botonCompletadas.classList.remove("btn-filtro-activo")
        botonIncompletas.classList.remove("btn-filtro-activo")
        botonVencimiento.classList.remove("btn-filtro-activo")
        botonTareasResponsable.classList.remove("btn-filtro-activo")
    })

    botonTareasResponsable.addEventListener("click", () => {
        listaSubTareasResponsable.classList.remove("oculto")
        listaTarea.classList.add("oculto")
        listaTareaCompletada.classList.add("oculto")
        listaPorVencimiento.classList.add("oculto")
        listaPorPrioridad.classList.add("oculto")

        botonTareasResponsable.classList.add("btn-filtro-activo")
        botonCompletadas.classList.remove("btn-filtro-activo")
        botonIncompletas.classList.remove("btn-filtro-activo")
        botonVencimiento.classList.remove("btn-filtro-activo")
        botonPrioridad.classList.remove("btn-filtro-activo")
    })

</script>

</main>

