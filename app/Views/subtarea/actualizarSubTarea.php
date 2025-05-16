<div class="contanier-crear-tarea">
    <h2>Modificar Subtarea</h2>
    
    <?= form_open("actualizarSubTarea/" . $subtarea["idSubTarea"],["method"=> "post"]) ?>
    <div class="form-crear-tarea">
        <div class="titulo-descripcion">
            <div>
                <?= form_label("Titulo:", "titulo") ?>
                <?php if ($subtarea["idResponsable"] != session("idUsuario")): ?>
                    <?= form_input("titulo", $subtarea["titulo"]) ?>
                <?php else: ?> 
                    <?= form_input("titulo", $subtarea["titulo"], ["disabled" => "true"]) ?>
                <?php endif; ?>
            </div>
            <div>
                <?= form_label("Descripcion:","descripcion")?>
                <?php if ($subtarea["idResponsable"] != session("idUsuario")): ?>
                    <?= form_input("descripcion", $subtarea["descripcion"]) ?>
                <?php else: ?> 
                    <?= form_input("descripcion", $subtarea["descripcion"], ["disabled" => "true"]) ?>
                <?php endif; ?>
            </div>
            
        </div>
        <div class="prioridad-fechaVencimiento">
            <div>
                <?= form_label("Prioridad:","prioridad")?>
                <?php if ($subtarea["idResponsable"] != session("idUsuario")): ?>
                    <select name="prioridad">
                        <option selected disabled>Seleccione una prioridad</option>
                        <option value="baja" <?php if( strtolower($subtarea["prioridad"])  == "baja" ){ echo "selected"; } ?> >Baja</option>
                        <option value="normal" <?php if( strtolower($subtarea["prioridad"]) == "normal" ){ echo "selected"; } ?> >Normal</option>
                        <option value="alta" <?php if( strtolower($subtarea["prioridad"]) == "alta" ){ echo "selected"; } ?> >Alta</option>
                    </select>
                <?php else: ?> 

                    <select name="prioridad" disabled>
                        <option selected disabled>Seleccione una prioridad</option>
                        <option value="baja" <?php if( strtolower($subtarea["prioridad"])  == "baja" ){ echo "selected"; } ?> >Baja</option>
                        <option value="normal" <?php if( strtolower($subtarea["prioridad"]) == "normal" ){ echo "selected"; } ?> >Normal</option>
                        <option value="alta" <?php if( strtolower($subtarea["prioridad"]) == "alta" ){ echo "selected"; } ?> >Alta</option>
                    </select>

                <?php endif; ?>

            </div>
            <div>
                <?= form_label("Fecha de vencimiento:","fecha-vencimiento")?>
                
                <?php if ($subtarea["idResponsable"] != session("idUsuario")): ?>

                    <?= form_input([
                    "type" => "date",
                    "name" => "fecha-vencimiento"
                    ],$subtarea["fecha_de_vencimiento"]) ?>
                
                <?php else: ?> 

                    <?= form_input([
                    "type" => "date",
                    "name" => "fecha-vencimiento"
                    ],$subtarea["fecha_de_vencimiento"],["disabled" => "true"]) ?>

                <?php endif; ?>

            </div>
            
        </div>
        <div>
            <?= form_label("Estado:","estado")?>
            <select name="estado">
                <?php if ($subtarea["idResponsable"] != session("idUsuario")): ?>
                    <option value="definido" <?php if( strtolower($subtarea["estado"])  == "definido" ){ echo "selected"; } ?>> Definido </option>
                    <option value="en proceso" <?php if( strtolower($subtarea["estado"])  == "en proceso" ){ echo "selected"; } ?>> En proceso </option>
                    <option value="completado" <?php if( strtolower($subtarea["estado"]) == "completado" ){ echo "selected"; } ?>>Completado</option>
                <?php else: ?>  
                    <option value="en proceso" <?php if( strtolower($subtarea["estado"])  == "en proceso" ){ echo "selected"; } ?>> En proceso </option>
                    <option value="completado" <?php if( strtolower($subtarea["estado"]) == "completado" ){ echo "selected"; } ?>>Completado</option>
                <?php endif; ?>
                </select>
        </div>
    </div>
    
    <?= form_submit("", "Modificar", ["class" => "btn-crear"]) ?>
    <?= form_close() ?>

</div>