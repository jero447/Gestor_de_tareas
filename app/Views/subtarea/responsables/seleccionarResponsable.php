<div class="contanier-crear-tarea">
    <h2>Selecciona un responsable</h2>
    
    <?= form_open("/crearTarea",["method"=> "post"]) ?>
    <div class="form-crear-tarea">
        <div class="titulo-descripcion">
            <div>
                <?= form_label("Titulo:","titulo")?>
                <?= form_input("titulo") ?>
            </div>
            <div>
                <?= form_label("Descripcion:","descripcion")?>
                <?= form_input("descripcion") ?>
            </div>
            
        </div>
        <div class="prioridad-fechaVencimiento">
            <div>
                <?= form_label("Prioridad:","prioridad")?>
                <select name="prioridad">
                    <option selected disabled>Seleccione una prioridad</option>
                    <option value="baja">Baja</option>
                    <option value="normal">Normal</option>
                    <option value="alta">Alta</option>
                </select>
            </div>
            <div>
                <?= form_label("Fecha de vencimiento:","fecha-vencimiento")?>
                <?= form_input([
                    "type" => "date",
                    "name" => "fecha-vencimiento"
                ]) ?>

            </div>
            
        </div>
    </div>
    
    <?= form_submit("", "Crear tarea", ["class" => "btn-crear"]) ?>
    <?= form_close() ?>
</div>