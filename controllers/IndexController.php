<?php
namespace app\controllers;
use Yii;

class IndexController extends WechatController
{
    public $layout=false;
    public function getJsApiTicket()
    {
        $cache = Yii::$app->cache;
        $data = $cache->get('jsapi_ticket');
        if ($data == false) {
            $wx_access_token = $this->getAccessToken();
            $request_url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=';
            $request_url .= $wx_access_token;
            $request_url .= '&type=jsapi';
            $response = $this->sendMsg($request_url);
            $arr = json_decode($response, true);
            $cache->set('jsapi_ticket', $arr['ticket'], 6900);
            $data = $arr['ticket'];
        }
        return $data;
    }
    public function actionIndex()
    {
        $jsapi_ticket=$this->getJsApiTicket();
        $nonceStr = md5(rand());
        $timestamp = time();

        $url = \Yii::$app->request->getHostInfo(). \Yii::$app->request->url;
        $str="jsapi_ticket=$jsapi_ticket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";
        $signature=sha1($str);
        $wx = [
            'appId' => \Yii::$app->params['wechat']['appId'],
            'noncestr' => $nonceStr,
            'timestamp' => $timestamp,
            'signature' => $signature,
            'url'=>$url,
        ];
        return $this->render('index',[
            'wx'=>$wx
        ]);
//        Yii::$app->response->format=Response::FORMAT_JSON;
//        return $wx;
    }
}