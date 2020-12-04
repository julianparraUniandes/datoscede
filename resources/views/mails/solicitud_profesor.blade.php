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
                    <h3 style="font-size: 20px; color: #0202cc;">CATÁLOGO MICRODATOS</h3>
                </center>
            </td>
        </tr>
        <tr style="background-color: #f1efef;">
            <td style="height: 50px; padding-bottom: 20px;">
                <center>
                    <strong style="color: #2c2525; font-size: 15px;">
                        Estimado profesor,  
                    </strong>
                </center>
            </td>
        </tr>
        <tr>
            <td>
                <center>
                    <p style="font-family: 'Times New Roman', Times, serif; margin: 0px 45px; font-size: 14px; font-weight: 200; color: #6d6d6d;">
                        
                        El/La estudainte  {{$name}} {{$surname}} está solicitando acceso a la siguiente base de datos {{$nombre_metadata}} Para acceder a dicha información es necesario contar con su autorización avalando que dicha informaciónesta  va ser usada con fines académicos en la investigación o materia que usted dirige o imparte. 
                        El/La estudiante especifica que la información va ser usada en el marco del siguiente proyecto:<br><br>
                        {{$descripcion}}
                        <br><br>
                        Si usted da el visto bueno a esta solicitud por favor notifíquelo haciendo clic en el siguiente link: <br><br>
                        <a href="{{env('APP_URL')}}/aljtes_hyttkbnertaa_feess/{{$uuid}}/{{$user_id}}">activar</a>
                        <br><br>                      
                        

                        En el caso contrario haga clic en el siguiente link para no activar la descarga de la base de datos: <br><br>
                        <a href="{{env('APP_URL')}}/dljtes_hyttkbnertdd_feess/{{$uuid}}/{{$user_id}}">desactivar</a>
                        <br><br>       
                        
                        Para su información el/la estudiante ha aceptado los *términos y condiciones de uso de las bases de datos 
                        A continuación un resumen de la información del estudiante: <br><br>     
                        Nombres: {{$name}} <br>     
                        Apellidos: {{$surname}} <br>
                        email:<a href="mailto:{{$email}}">{{$email}}</a>  <br>
                        <br><br>
                        Dirección Centro de Datos <br>
                        datoscede@uniandes.edu.co <br>
                        <br>


                    </p>
                </center>
            </td>
        </tr>
        <tr>
            <td>
                <center>
                    <a href="#">
                        <p
                            style="font-family: 'Times New Roman', Times, serif; color: #4444ff; font-size: 12px; margin: 40px 0px;">
                            Política de privacidad y protección de datos personales - Universidad de los Andes</p>
                    </a>
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