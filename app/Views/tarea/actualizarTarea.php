<div class="contanier-crear-tarea">
    <h2>Modificar Tarea</h2>
    
    <?= form_open("/crearTarea",["method"=> "post"]) ?>
    <div class="form-crear-tarea">
        <div class="titulo-descripcion">
            <div>
                <?= form_label("Titulo:","titulo")?>
                <?= form_input("titulo", $tarea["titulo"]) ?>
            </div>
            <div>
                <?= form_label("Descripcion:","descripcion")?>
                <?= form_input("descripcion", $tarea["descripcion"]) ?>
            </div>
            
        </div>
        <div class="prioridad-fechaVencimiento">
            <div>
                <?= form_label("Prioridad:","prioridad")?>
                <select name="prioridad">
                    <option selected disabled>Seleccione una prioridad</option>
                    <option value="baja" <?php if( strtolower($tarea["prioridad"])  == "baja" ){ echo "selected"; } ?> >Baja</option>
                    <option value="normal" <?php if( strtolower($tarea["prioridad"]) == "normal" ){ echo "selected"; } ?> >Normal</option>
                    <option value="alta" <?php if( strtolower($tarea["prioridad"]) == "alta" ){ echo "selected"; } ?> >Alta</option>
                </select>
            </div>
            <div>
                <?= form_label("Fecha de vencimiento:","fecha-vencimiento")?>
                <?= form_input([
                    "type" => "date",
                    "name" => "fecha-vencimiento"
                ],$tarea["fecha_de_vencimiento"]) ?>

            </div>
            
        </div>
    </div>
    
    <?= form_submit("", "Modificar", ["class" => "btn-crear"]) ?>
    <?= form_close() ?>

</div>