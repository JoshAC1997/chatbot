<?php
method = $_SERVER['REQUEST_METHOD'];

if($method=="POST"){
    $requestBody= file_get_contents('php://input');
    $json = json.decode($requestBody);
    $text = $json-> result-> parameters->text;
    
    switch($text){
        case 'ticket':
            $speech = "Aqui estan sus tickets"
            break;
            
        case 'comentar':
            $speech = "Ok, agreguemos un comentario a ticket"
            break;
            
        case 'acciones':
            $speech = "mostrar tickets \n Agregar comentarios \n Cerrar tickets";
            break;
            
        default:
            $speech = "Disculpa no puedo procesar tu solicitud" 
            break;
    
    }
    
    $response = new \stdClass();
    $response->speech = "";
    $response->displayText = "";
    $response->source = "webhook";
    
    echo json_encode($response);

    
}
else
{
    echo "Metodo no permitido"
}



?>