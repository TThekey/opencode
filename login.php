<?php
/**
 * Created by PhpStorm.
 * User: GYW
 * Date: 2019/4/12
 * Time: 11:11
 */

//-------配置
$AppID = 'wx32162a992ac3b89a';
$AppSecret = 'e471850aac54b0c8e3205b75ab9e9bfe';
$callback  =  '148.70.99.8/opencode/callback.php'; //回调地址
session_start();
//-------生成唯一随机串防CSRF攻击
$state  = md5(uniqid(rand(),TRUE));
$_SESSION["wx_state"]    =   $state; //存到SESSION
$callback = urlencode($callback);
$wxurl = "https://open.weixin.qq.com/connect/qrconnect?appid=".$AppID."&redirect_uri={$callback}&response_type=code&scope=snsapi_userinfo&state={$state}#wechat_redirect";
header("Location: $wxurl");