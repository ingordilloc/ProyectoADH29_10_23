<?php
use Controller\UsuarioController;
$usuario = new UsuarioController();

?>

<h1 class="text-light">Login</h1>

<div class="container">

    <form method="POST" id="formulario">
       

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2 text-light"><label>Usuario</label>
                </div>
                <div class="col-10"><input class="form-control" type="text" name="usuario" required></div>
            </div>

        </div>
        
        <div class="form-group">
            <div class="row">
                <div class="col-2 text-light"><label>Contraseña</label>
                </div>
                <div class="col-10"><input type="password" name="password" class="form-control" id="password"></div>
            </div>
        </div>

        <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>

        <div class="form-group">
            <div class="row mt-3">
                <button type="submit" class="btn btn-primary">Inicio</button>
            </div>
        </div>
 </form>
        <div id="passwordError" title="Error en Password" hidden>
        <p>La contraseña es muy corta.</p>
    </div>
        
   
     
<?php 
$resultado = $usuario->login();
if($resultado === false){
    echo "<div class='alert alert-success mt-3' role=alert'>
    Error de los datos</div>";
}

?>
</div>

<script>
 //introJs().setOptions({
   //         showProgress: true,
     //   }).start()

    document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("formulario").addEventListener('submit', validarFormulario);
});

function validarFormulario(evento) {
    evento.preventDefault();
    let password = document.getElementById('password').value;
    if (password.length < 2) { 
        $.passwordError(); 
    return; 
  } else {
    this.submit(); 
  }
  
}

$.passwordError =  function() {
    let element = document.getElementById("passwordError");
    element.removeAttribute("hidden");//Cuando se conecta, se quitara el atributo hidden al input.
    $( "#passwordError" ).dialog();//jQuery para mostrar ventana de dialogo.
    //$("#passwordError").show();
  };
</script>