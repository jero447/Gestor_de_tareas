<div class="contanier-crear-tarea">
    <h2>Modificar Subtarea</h2>
    
    <?= form_open("actualizarSubTarea/" . $subtarea["idSubTarea"],["method"=> "post"]) ?>
    <div class="form-crear-tarea">
        <div class="titulo-descripcion">
            <div>
                <?= form_label("Titulo:","titulo")?>
                <?= form_input("titulo", $subtarea["titulo"]) ?>
            </div>
            <div>
                <?= form_label("Descripcion:","descripcion")?>
                <?= form_input("descripcion", $subtarea["descripcion"]) ?>
            </div>
            
        </div>
        <div class="prioridad-fechaVencimiento">
            <div>
                <?= form_label("Prioridad:","prioridad")?>
                <select name="prioridad">
                    <option selected disabled>Seleccione una prioridad</option>
                    <option value="baja" <?php if( strtolower($subtarea["prioridad"])  == "baja" ){ echo "selected"; } ?> >Baja</option>
                    <option value="normal" <?php if( strtolower($subtarea["prioridad"]) == "normal" ){ echo "selected"; } ?> >Normal</option>
                    <option value="alta" <?php if( strtolower($subtarea["prioridad"]) == "alta" ){ echo "selected"; } ?> >Alta</option>
                </select>
            </div>
            <div>
                <?= form_label("Fecha de vencimiento:","fecha-vencimiento")?>
                <?= form_input([
                    "type" => "date",
                    "name" => "fecha-vencimiento"
                ],$subtarea["fecha_de_vencimiento"]) ?>
            </div>
            
        </div>
        <div>
            <?= form_label("Estado:","estado")?>
            <select name="estado">
                    <option value="definido" <?php if( strtolower($subtarea["estado"])  == "definido" ){ echo "selected"; } ?>> Definido </option>
                    <option value="en proceso" <?php if( strtolower($subtarea["estado"])  == "en proceso" ){ echo "selected"; } ?>> En proceso </option>
                    <option value="completado" <?php if( strtolower($subtarea["estado"]) == "completado" ){ echo "selected"; } ?>>Completado</option>
                </select>
        </div>
    </div>
    
    <?= form_submit("", "Modificar", ["class" => "btn-crear"]) ?>
    <?= form_close() ?>

</div>