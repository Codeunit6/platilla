<?php
require ("Conexion.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
       
require ('PHPMailer/Exception.php');
require ('PHPMailer/PHPMailer.php');
require ('PHPMailer/SMTP.php');
$nombre="";
$email="";
$telefono="";
$mensaje="";
if (isset($_POST["nombre"]))
{
    $nombre=$_POST["nombre"];
}

if(isset($_POST["email"])){
    $email = $_POST["email"];
}
if(isset($_POST["telefono"])){
    $telefono = $_POST["telefono"];
}
if(isset($_POST["mensaje"])){
    $mensaje = $_POST["mensaje"];
}

$sql="INSERT INTO formulary (nombre, email, telefono, mensaje)  VALUES ('$nombre','$email','$telefono','$mensaje')";

if(mysqli_query($conn, $sql)){
    echo "Se envio tu informacion";
} else {
    echo "Error: " .$sql. "<br>" .mysqli_error($conn);
}
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    
    //Server settings
    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username = 'fernando.brayan.m.g@gmail.com';
    //Assuming SMTP_PASSWORD is your environment variable which holds password
    $mail->Password = 'holafernando12';                             //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('fernando.brayan.m.g@gmail.com', 'Formulario');
    $mail->addAddress('trabajoingles070921@gmail.com', 'Fernando');     //Add a recipient
    $mail->addAddress($email, $nombre);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'GRACIAS POR LLENAR EL FORMULARIO';
    $mail->Body    = "<html><head><title>Email de Prueba</title><style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        font-size: 16px;
        font-weight: 300;
        color: #888;
        background-color:rgba(230, 225, 225, 0.5);
        line-height: 30px;
        text-align: center;
    }
    .contenedor{
        width: 80%;
        min-height:auto;
        text-align: center;
        margin: 0 auto;
        padding: 40px;
        background: #ececec;
        border-top: 3px solid #E64A19;
    }
    .bold{
        color:#333;
        font-size:25px;
        font-weight:bold;
    }
    img{
        margin-left: auto;
        margin-right: auto;
        display: block;
        padding:0px 0px 20px 0px;
    }
    </style>
</head><body><div class='contenedor'><p>&nbsp;</p><p>&nbsp;</p><span>Felicitaciones <strong class='bold'>" . $nombre . " . . .!</strong></span>
<p>&nbsp;</p><p>Su formulario de Contacto funciona perfectamente...!</p><p>&nbsp;</p><p>&nbsp;</p>
<p><strong>Mensaje: </strong> " . $mensaje . " </p><p>&nbsp;</p><p>¡Gracias por llenar el formulario! </p><p>&nbsp;</p><p><span class='bold'> !JUEGOS LAG¡ </span></p><p>&nbsp;</p>
<p><a title='JUEGOS LAG' href='https://formulario-plantilla.herokuapp.com'><img src='https://cdn.icon-icons.com/icons2/692/PNG/512/seo-social-web-network-internet_174_icon-icons.com_61537.png' alt='Logo' width='100px'/>
</a></p></div></body></html>";

    $mail->send();
    echo 'MENSAJE ENVIADO';
} catch (Exception $e) {
    echo "MENSAJE DE ERROR: {$mail->ErrorInfo}";
}

?>
