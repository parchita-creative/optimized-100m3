<?php
 
 

  // CONFIGURACION CORREO
  $destinatario = "andres@100m3.com";
  $destinatario_cc = "";
  $destinatario_bcc = "";
  $asunto  = "Formulario de 100m3"; 
  $mensaje  = "";
  $campos_obligatorios  = Array();
  $first_name = "first"; 
  $last_name  = "last"; 
  $email  = "email";
  $phone  = "phone";
  $message  = "message";

   // CONFIGURACION HTML
  $enviado_bien = "Su formulario ha sido enviado correctamente";
  $enviado_mal  = "ERROR: No se pudo enviar";

  // RECOGER DATOS 
  reset ($_POST);
  $mensaje .= "<table border=\"1\">";
  while (list ($clave, $valor) = each ($_POST)) {
    $clave = htmlspecialchars($clave);
    $valor = htmlspecialchars(trim($valor));
    $mensaje .= "<tr><th>" . $clave . "</th><td>" . $valor . "</td></tr>";
  }
  $mensaje .= "<tr><th>Fecha petición:</th><td>" . date("d/m/Y H:i:s") . "</td></tr>";
  $mensaje .= "</table>";

  // VARIABLES INTERNAS
  $first = $_POST[$first_name];
  $last = $_POST[$last_name];
  $email = $_POST[$email];
  $email = $_POST[$phone];
  $email = $_POST[$message];

  $cabeceras = "MIME-Version: 1.0\r\n"; //para el envío en formato HTML 
  $cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
  if ($correo != "") {
   $cabeceras .= "From: " . $first . " <" . $email . ">\r\n"; // Dirección del remitente 
   $cabeceras .= "Reply-To: " . $first . " <" . $email . ">\r\n"; // Dirección de respuesta
  }
  if ($destinatario_cc != "") { $cabeceras .= "Cc: " . $destinatario_cc . "\r\n"; }
  if ($destinatario_bcc != "") { $cabeceras .= "Bcc: " . $destinatario_bcc . "\r\n"; }
  
  if (mail($destinatario, $asunto, $mensaje, $cabeceras)) {
    echo $enviado_bien;
  } else {
    echo $enviado_mal;
  }
?>
