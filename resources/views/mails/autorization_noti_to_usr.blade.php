<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro de Datos CEDE - Facultad de Economía Universidad de Los Andes</title>
</head>

<body>
    <style>
        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
    </style>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width: 600px; background-color: #f1efef;">
        <tr style="max-width: 600px;">
            <td>
                <img width="100%" style="max-width: 600px; object-fit: cover;" src="https://i.ibb.co/6rLTQ3n/header.png"
                    alt="Universidad de los Andes" title="Universidad de los Andes">
            </td>
        </tr>
        <tr style="background-color: #f1efef;">
            <td style="height: 70px;">
                <center>
                    <h3 style="font-size: 20px; color: #0202cc;">CATÁLOGO DE DATOS</h3>
                </center>
            </td>
        </tr>
        <tr style="background-color: #f1efef;">
            <td style="height: 50px; padding-bottom: 20px;">
                <center>
                    <strong style="color: #2c2525; font-size: 15px;">
                        {{$user_name}} {{$user_lastname}}
                    </strong>
                </center>
            </td>
        </tr>
        <tr>
            <td>
                <center>
                    <p style="font-family: 'Times New Roman', Times, serif; margin: 0px 45px; font-size: 14px; font-weight: 200; color: #6d6d6d;">
                        
                        Su reporte ha sido registrado.<br>                        
                        <br>
                        A continuación un resumen de los datos registrados: <br><br>
  
                        Nombres: {{$user_name}} <br>     
                        Apellidos: {{$user_lastname}} <br>
                        Tipo:  {{$tipo_usr}} <br>
                        Email: {{$user_email}} <br>
                        Base de Datos: {{$nombre_metadata}} <br>
                        Versión: {{$version_metadata}} <br>
                        Inconsistencia reportada:<br> <p>{{$texto}}</p><br>
                        
                        
                    </p>
                </center>
            </td>
        </tr>

        <tr style="background-color: #000000;">
            <td>
                <center>
                    <p style="padding: 10px; width: 150px; color: #ffffff; border-top: 5px #fbff00 solid;"> REDES
                        SOCIALES </p>

                </center>
            </td>
        </tr>
        <tr style="background-color: #000000;">
            <td>
                <center>
                    <a href="#">
                        <img style="width: 30px; max-width: 50px;" src="https://i.ibb.co/jGfGwgq/facebook.jpg"
                            alt="Universidad de los Andes" srcset="">
                    </a>
                    <a href="#">
                        <img style="width: 30px; max-width: 50px;" src="https://i.ibb.co/WkfrgLz/twitter.jpg"
                            alt="Universidad de los Andes" srcset="">
                    </a>
                    <a href="#">
                        <img style="width: 30px; max-width: 50px;" src="https://i.ibb.co/X7ZVWff/linkendin.jpg"
                            alt="Universidad de los Andes" srcset="">
                    </a>
                    <a href="#">
                        <img style="width: 30px; max-width: 50px;" src="https://i.ibb.co/Wzdr9xR/youtube.jpg"
                            alt="Universidad de los Andes" srcset="">
                    </a>
                </center>
            </td>
        </tr>
        <tr style="background-color: #000000;">
            <td>
                <center>
                    <p style="color: #979696; font-size: 10px; padding-bottom: 50px;"> © - Derechos reservados Universidad de los Andes </p>
                </center>
            </td>
        </tr>
    </table>

</body>

</html>