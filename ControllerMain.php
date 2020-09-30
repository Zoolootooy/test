<?php

namespace application\controllers;

use application\core\Config;
use application\core\Controller;
use application\core\Request;
use application\models\ModelCountry;
use application\models\ModelMain;

class ControllerMain extends Controller
{


    public function index()
    {
        $this->view->generate('form.php');
    }

    public function p()
    {
        $data = Request::post();
        $ch = curl_init($data['url']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0');

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_PROXY, $data['proxy']);

        switch ($data['proxyType']){
            case 'socks5':
                curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
                break;

            case 'http':
                curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
                break;

            case 'https':
                curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTPS);
        }

        $html = curl_exec($ch);


        $fp = fopen('output/parse1.html', 'w+');
        fwrite($fp, $html);
        fclose($fp);

        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $fp = fopen('output/parse2.html', 'w+');
        fwrite($fp, $http_code);
        fclose($fp);
        echo json_encode([
            'code' => $http_code]);
        curl_close($ch);
    }

}