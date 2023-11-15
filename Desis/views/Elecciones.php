<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="jquery.rut.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de votación</title>
</head>

<script>

$(document).ready(function(){

    $("#region").on('change', function(){
        if($("#region option:selected").val() === ""){
            $("#comuna").val("");
            $("#comuna").prop("disabled", true);
        }else{
            $.ajax({
                data: {region : $("#region").val() },
                url: 'controllers/Comunas.php',
                method: 'post',
                type: 'json',
                success: function(data){
                    $("#comuna").prop("disabled", false);
                    $('#comuna').find('option').not(':first').remove().end()
                    $.each(JSON.parse(data), function( key, value ) {
                        $('#comuna').append($('<option>', {
                            value: value.id,
                            text: value.nombre
                        }));
                    });
                }
            });
        }
    });

    $("#web").on('click', function(){
        if($(this).is(':checked')){
            $("#web2").prop('disabled', true);
        }else{
            $("#web2").prop('disabled', false);
        }
    });

    $("#tv").on('click', function(){
        if($(this).is(':checked')){
            $("#tv2").prop('disabled', true);
        }else{
            $("#tv2").prop('disabled', false);
        }
    });

    $("#sociales").on('click', function(){
        if($(this).is(':checked')){
            $("#sociales2").prop('disabled', true);
        }else{
            $("#sociales2").prop('disabled', false);
        }
    });

    $("#amigo").on('click', function(){
        if($(this).is(':checked')){
            $("#amigo2").prop('disabled', true);
        }else{
            $("#amigo2").prop('disabled', false);
        }
    });

    $("input#rut").rut().on('rutInvalido', function(e) {
        alert("El rut " + $(this).val() + " es inválido");
        $("#rut").val("");
    });

    $("#elecciones").on( "submit", function(e) {
        e.preventDefault();
        var alias = new RegExp('^[a-zA-Z]+[a-zA-Z0-9]*$');
        var email = new RegExp('^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$');

        if($("#nombre").val().length == 0){
            alert("Debe ingresar un nombre");
        }else if($("#alias").val().length < 5){
            alert("Su alias debe ser mayor a 5 caracteres");
        }else if(!alias.test($("#alias").val())){
            alert("Su alias debe solo contener numeros y letras")
        }else if(alias.test($("#email").val())){
            alert("Debe ingresar un correo electronico valido")
        }else if($("#region option:selected").val() == ""){
            alert("Debe seleccionar una region")
        }else if($("#comuna option:selected").val() == ""){
            alert("Debe seleccionar una comuna")
        }else if($("#candidato option:selected").val() == ""){
            alert("Debe seleccionar un candidato")
        }
        else if($('#elecciones input:checked').length < 2){
            alert("Debe seleccionar al menos 2 razones de como se entero de nosotros")
        }
        else{
            if($("#web"))
            $.ajax({
                data: $("#elecciones").serialize(),
                url: 'controllers/Voto.php',
                method: 'post',
                type: 'text',
                success: function(data){
                    alert("Voto exitoso!");
                }
            });
        }
    });

});


</script>

<body>
    <form id="elecciones" action="/" method="POST">
        <h2>FORMULARIO DE VOTACIÓN:</h2><br>
        <label>Nombre y apellido: </label> <input type="text" name="nombre" id="nombre" require><br>
        <label>Alias: </label><input type="text" name="alias" id="alias" require><br>
        <label>RUT: </label><input type="text" name="rut" id="rut" require><br>
        <label>Email: </label><input type="text" name="email" id="email" require><br>
        <label>Región: </label> <select name="region" id="region" require>
            <option value="">Seleccione región</option>
            <?php 
                foreach($regiones as $region){
                    ?> <option value= <?php echo $region["id"]; ?> > <?php echo $region["nombre"]; ?> </option> <?php
                }
            ?>
        </select> <br>
        <label>Comuna: </label> <select name="comuna" id="comuna" require disabled>
            <option value="">Seleccione comuna</option>
        </select> <br>
        <label>Candidato: </label> <select name="candidato" id="candidato" require>
            <option value="">Seleccione candidato</option>
            <?php 
                foreach($candidatos as $candidato){
                    ?> <option value= <?php echo $candidato["id"]; ?> > <?php print $candidato["nombre"]; ?> </option> <?php
                }
            ?>
        </select> <br>
        <label>Como se enteró de nosotros </label> 
        <input type="checkbox" name="web" id="web" value="1" class="checkbox"> <input type="hidden" name="web" id="web2" value="0"> Web
        <input type="checkbox" name="tv" id="tv" value="1" class="checkbox"> <input type="hidden" name="tv" id="tv2" value="0"> TV 
        <input type="checkbox" name="sociales" id="sociales" value="1" class="checkbox"> <input type="hidden" name="sociales" id="sociales2" value="0"> Redes Sociales 
        <input type="checkbox" name="amigo" id="amigo" value="1" class="checkbox"> <input type="hidden" name="amigo" id="amigo2" value="0"> Amigo <br> <br>
        <button type="submit">Votar</button>
    </form>
</body>
</html>