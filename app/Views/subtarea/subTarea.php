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


                <div class="container-btn-subtareas">

                    <div class="container-btn-asignar-responsable">
                        <?php  if($subTarea["idResponsable"] === null):?>
                            <button onclick="abrirModal()" class="btn-asignar-responsable">Asignar Responsable</button>
                        <?php else: ?>
                            <div class="container-responsable">
                                <span class="responsable-label">Responsable:</span>
                                <span class="responsable-nombre"><?= $usuarioResponsable["nombre"] ?></span>
                            </div>
                        <?php endif ?>
                    </div>


                    <div id="miModal" class="modal-personalizado">
                            <div class="modal-contenido">
                                <div class="btn-cerrar">
                                    <h2>Seleccione un responsable</h2>
                                    <span class="cerrar-modal" onclick="cerrarModal()">&times;</span>
                                </div>
                                
                                
                                <?= form_open("anadirResponsable",['method' => 'post',  'onsubmit'=> "cerrarModal()"]) ?>
                                    <div class="grupo-formulario">
                                        <label for="">Lista de usuario</label>
                                        <select id="miSelect" name="responsables" class="select-personalizado">
                                            <option value="" disabled selected>Ej: Pepe</option>
                                            <?php foreach($usuarios as $usuario): ?>
                                                <?php if(session("idUsuario") != $usuario["idUsuario"]): ?>
                                                    <option value="<?= $usuario["idUsuario"] ?>"><?= $usuario["nombre"] ?></option>
                                                <?php endif ?>    
                                            <?php endforeach ?>
                                        </select>
                                        <?= form_submit(["name" => "asignar","class" => "mi-boton", "value" => "Asignar"]) ?>
                                    </div>
                                    <?=form_hidden("idSubTarea", $subTarea["idSubTarea"])?>
                                <?= form_close() ?>
                            </div>
                    </div>



                    <div class="btn-eliminar-modificar">
                    <?php if($subTarea["idResponsable"] != session("idUsuario") ): ?>
                        <?= form_open(site_url("eliminarSubTarea/") . $subTarea["idSubTarea"], ['method' => 'post'])?>
                        <?= form_button(["type" => "submit", "class" => "btn-eliminar", 'content' => 'Eliminar']) ?>
                        <?= form_close() ?>
                    <?php endif ?>
                        <a href="<?= site_url("pantallaActualizarSubTarea/") . $subTarea["idSubTarea"] ?>" class="btn-modificar">Modificar</a>    
                    </div>
                    
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


                <div class="container-btn-subtareas">

                    <div class="container-btn-asignar-responsable">
                        <?php  if($subTarea["idResponsable"] === null):?>
                            <button onclick="abrirModal()" class="btn-asignar-responsable">Asignar Responsable</button>
                        <?php else: ?>
                            <div class="container-responsable">
                                <span class="responsable-label">Responsable:</span>
                                <span class="responsable-nombre"><?= $usuarioResponsable["nombre"] ?></span>
                            </div>
                        <?php endif ?>
                    </div>


                    <div id="miModal" class="modal-personalizado">
                            <div class="modal-contenido">
                                <div class="btn-cerrar">
                                    <h2>Seleccione un responsable</h2>
                                    <span class="cerrar-modal" onclick="cerrarModal()">&times;</span>
                                </div>
                                
                                
                                <?= form_open("anadirResponsable",['method' => 'post',  'onsubmit'=> "cerrarModal()"]) ?>
                                    <div class="grupo-formulario">
                                        <label for="">Lista de usuario</label>
                                        <select id="miSelect" name="responsables" class="select-personalizado">
                                            <option value="" disabled selected>Ej: Pepe</option>
                                            <?php foreach($usuarios as $usuario): ?>
                                                <?php if(session("idUsuario") != $usuario["idUsuario"]): ?>
                                                    <option value="<?= $usuario["idUsuario"] ?>"><?= $usuario["nombre"] ?></option>
                                                <?php endif ?>    
                                            <?php endforeach ?>
                                        </select>
                                        <?= form_submit(["name" => "asignar","class" => "mi-boton", "value" => "Asignar"]) ?>
                                    </div>
                                    <?=form_hidden("idSubTarea", $subTarea["idSubTarea"])?>
                                <?= form_close() ?>
                            </div>
                    </div>


                <div class="btn-eliminar-modificar">
                    <?php if($subTarea["idResponsable"] != session("idUsuario") ): ?>
                        <?= form_open(site_url("eliminarSubTarea/") . $subTarea["idSubTarea"], ['method' => 'post'])?>
                        <?= form_button(["type" => "submit", "class" => "btn-eliminar", 'content' => 'Eliminar']) ?>
                        <?= form_close() ?>
                    <?php endif ?>
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


                <div class="container-btn-subtareas">

                    <div class="container-btn-asignar-responsable">
                        <?php  if($subTarea["idResponsable"] === null):?>
                            <button onclick="abrirModal()" class="btn-asignar-responsable">Asignar Responsable</button>
                        <?php else: ?>
                            <div class="container-responsable">
                                <span class="responsable-label">Responsable:</span>
                                <span class="responsable-nombre"><?= $usuarioResponsable["nombre"] ?></span>
                            </div>
                        <?php endif ?>
                    </div>


                    <div id="miModal" class="modal-personalizado">
                            <div class="modal-contenido">
                                <div class="btn-cerrar">
                                    <h2>Seleccione un responsable</h2>
                                    <span class="cerrar-modal" onclick="cerrarModal()">&times;</span>
                                </div>
                                
                                
                                <?= form_open("anadirResponsable",['method' => 'post',  'onsubmit'=> "cerrarModal()"]) ?>
                                    <div class="grupo-formulario">
                                        <label for="">Lista de usuario</label>
                                        <select id="miSelect" name="responsables" class="select-personalizado">
                                            <option value="" disabled selected>Ej: Pepe</option>
                                            <?php foreach($usuarios as $usuario): ?>
                                                <?php if(session("idUsuario") != $usuario["idUsuario"]): ?>
                                                    <option value="<?= $usuario["idUsuario"] ?>"><?= $usuario["nombre"] ?></option>
                                                <?php endif ?>    
                                            <?php endforeach ?>
                                        </select>
                                        <?= form_submit(["name" => "asignar","class" => "mi-boton", "value" => "Asignar"]) ?>
                                    </div>
                                    <?=form_hidden("idSubTarea", $subTarea["idSubTarea"])?>
                                <?= form_close() ?>
                            </div>
                    </div>



                    <div class="btn-eliminar-modificar">
                        <?php if($subTarea["idResponsable"] != session("idUsuario") ): ?>
                            <?= form_open(site_url("eliminarSubTarea/") . $subTarea["idSubTarea"], ['method' => 'post'])?>
                            <?= form_button(["type" => "submit", "class" => "btn-eliminar", 'content' => 'Eliminar']) ?>
                            <?= form_close() ?>
                        <?php endif ?>
                        <a href="<?= site_url("pantallaActualizarSubTarea/") . $subTarea["idSubTarea"] ?>" class="btn-modificar">Modificar</a>    
                    </div>
                    
                </div>
            </div>
        
    <?php endif?>

<?php endif; ?>



<script>
// Abrir modal
function abrirModal() {
  document.getElementById('miModal').style.display = 'block';
}

// Cerrar modal
function cerrarModal() {
  document.getElementById('miModal').style.display = 'none';
}

// Cerrar al hacer clic fuera del contenido
window.onclick = function(event) {
  const modal = document.getElementById('miModal');
  if (event.target == modal) {
    modal.style.display = 'none';
  }
}
</script>
