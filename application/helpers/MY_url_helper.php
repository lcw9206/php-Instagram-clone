<?php
function send_json($code = 200, $message = 'Success', $result = null, $redirect_url = '', $go_url = '') {
    $CI = & get_instance();

    $CI->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('code' => $code, 'message' => $message, 'result'=>$result, 'redirect_url'=>$redirect_url, 'go_url'=>$go_url), JSON_NUMERIC_CHECK));
    $CI->output->_display();
    exit;
}
?>