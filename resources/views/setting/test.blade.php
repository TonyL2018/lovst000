<?php
// create curl resource
$curl = curl_init();

$data=array(
 "proc_name" => "product_ref",
 "params" => "{ \"table_name\":\"Stock\" }"
);

$header=array('x_contract_id:spg186k4', 'x_access_token:89cc174682a3e4d7c98cb0dd9d8d91b0', 'Content-Type: application/x-www-form-urlencoded');

// set url
curl_setopt($curl, CURLOPT_URL, "https://webapi.smaregi.jp/access/");

curl_setopt($curl, CURLOPT_POST, 1);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 信任任何证书
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);

curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
// curl_setopt($curl, CURLOPT_POSTFIELDS , $data);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data, null, '&'));
// curl_setopt($curl, CURLOPT_POSTFIELDS , json_encode($data));

//return the transfer as a string
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($curl);

// close curl resource to free up system resources
curl_close($curl);
var_dump(json_decode($output));


function curlPost($url, $data = array(), $timeout = 30, $CA = true){
    $cacert = getcwd() . '/cacert.pem'; //CA根证书
    $SSL = substr($url, 0, 8) == "https://" ? true : false;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout-2);
    if ($SSL && $CA) {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);   // 只信任CA颁布的证书
        curl_setopt($ch, CURLOPT_CAINFO, $cacert); // CA根证书（用来验证的网站证书是否是CA颁布）
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); // 检查证书中是否设置域名，并且是否与提供的主机名匹配
    } else if ($SSL && !$CA) {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 信任任何证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1); // 检查证书中是否设置域名
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:')); //避免data数据过长问题
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); //data with URLEncode

    $ret = curl_exec($ch);
    //var_dump(curl_error($ch));  //查看报错信息

    curl_close($ch);
    return $ret;
}
