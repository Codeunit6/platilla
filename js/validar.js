function validar(){
    nombre = document.getElementById("usuario").value;
    correo = document.getElementById("correo").value;
    contraseña = document.getElementById("contraseña").value;
    
    if (document.getElementById("usuario").value=='Fernando' && document.getElementById("correo").value=='fernando_1320114070@uptecamac.edu.mx' && document.getElementById("contraseña").value=='Holafernando12') { 
        window.location="home.html"; 
    }
    
    if (nombre=="" && correo=="" && contraseña=="") { 
        alert("Datos erroneos");
        } 
}
