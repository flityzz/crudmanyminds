<?php 


function permission(){
    $ci = get_instance();
    $loggedUser = $ci->session->userdata("logged_user");

    if(!$loggedUser){
        $ci->session->set_flashdata("danger", "please log-in");
        redirect('login');
    }

    return $loggedUser;
}