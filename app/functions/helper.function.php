<?php 
function showStatusIcon($status){
    if($status==0){
        return '<i class="fa fa-minus text-danger" aria-hidden="true"></i>';
    } else {
        return '<i class="fa fa-check text-success" aria-hidden="true"></i>';
    };
}
function showMessage($message_type, $message_text){
    $html = '<div class="container">';
    switch($message_type){
        case 'success':
            $html .= '<div class="alert alert-success" role="alert">';
            break;
        case 'warning':
            $html .= '<div class="alert alert-warning" role="alert">';
            break;
}
$html .= $message_text;
$html .= '</div></div>';
if(!empty($message_text) && !empty($message_type)){
    echo $html;
}
}
?>