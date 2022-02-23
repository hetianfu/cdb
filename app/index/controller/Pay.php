<?php

namespace app\index\controller;

use app\BaseController;
use app\dingadmin\controller\PayConfig;
use app\dingadmin\controller\Recharge;
use gmspay\gmspay;
use think\Env;
use think\facade\Db;
use think\facade\Session;
use think\facade\View;
use think\facade\Lang;
use app\index\Ydpay;
use think\Log;
use think\Request;
use app\common\Nibpay;
use think\exception\ValidateException;

class Pay extends BaseController
{


  public function Posts($url, $data)
  {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, FALSE);//不抓取头部信息。只返回数据
    curl_setopt($curl, CURLOPT_TIMEOUT, 1000);//超时设置
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);//1表示不返回bool值
    curl_setopt($curl, CURLOPT_POST, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));//重点
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    $response = curl_exec($curl);
    if (curl_errno($curl)) {
      return curl_error($curl);
    }
    curl_close($curl);
    return $response;
  }

  public static function json_post($url, $data = NULL)
  {

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    if(!$data){
      return 'data is null';
    }
    if(is_array($data))
    {
      $data = json_encode($data);
    }
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_HTTPHEADER,array(
      'Content-Type: application/json; charset=utf-8',
      'Content-Length:' . strlen($data),
      'Cache-Control: no-cache',
      'Pragma: no-cache'
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $res = curl_exec($curl);
    $errorno = curl_errno($curl);
    if ($errorno) {
      return $errorno;
    }
    curl_close($curl);
    return $res;

  }

















//	==============================================  新支付通道 1




  /**
   * 支付回调
   */
  public  function notifyRusPay(){
    $data = $this->request->param();


    $pay_config = PayConfig::getConfig();

    $mch_id = $pay_config['mch_id'];
    $pay_type = $pay_config['pay_type'];
    $token = $pay_config['token'];
    $notify_url = $pay_config['out_notify_url'];


    $dtTmp = date('Ymd');
    $file = fopen("public/pay/rusPay_notify$dtTmp.txt","a+");
    fwrite($file,date('Y-m-d H:i:s',time())."返回数据===\n");
    fwrite($file,json_encode($data));
    fwrite($file,"\n");

    $info = Db::name('recharge')->where('order_num',$data['mch_order_no'])->find();
    if($info['status'] == 0){
      $user =  Db::name('user')->where('id', $data['user_id'])->find();

      Recharge::Recommendation_reward($data['user_id'], $user['parent_id'], $data['amount']);
      //处于初始状态的时候
      Db::name('recharge')->where('order_num',$data['mch_order_no'])->update(['status'=>1,'money'=>$data['amount'],'pay_time'=>time()]);
      //用户余额新增

      Db::name('user')->where('id', $data['user_id'])->update(['money'=>$user['money']+$data['amount']+$info['zsamount']]);
      echo('SUCCESS');
    }
  }





  // 代收回调处理
  public function xf()
  {
    $data = $this->request->param();
    $dtTmp = date('Ymd');
    $file = fopen("public/pay/sevenPay_notify$dtTmp.txt","a+");

    fwrite($file,"返回数据===\n");
    fwrite($file,json_encode($data));
    fwrite($file,"\n");

    $info = Db::name('withdrawal')->where('order_num',$data['order_sn'])->find();
    if($info['status'] != 4){
      fwrite($file,"\n");
      fwrite($file,'回调已经成功=====');
      fwrite($file,"\n");
      return 'success';
    }
    if ($data['tradeResult'] != 1) {
      Db::name('withdrawal')->where('order_num',$data['order_sn'])->update(['status' => 2]);

      $proconfig = Db::name('proconfig')->where('id',1)->find();

//      $tuifee = $info['money'] - ($info['money']*$proconfig['charge_ratio']/100);
//      $uid = $info['uid'];
//      Db::name('user')->where('id', $uid)->inc('money', $tuifee)->update();


      fwrite($file,"\n");
      fwrite($file,'下分失败=====');
      fwrite($file,"\n");
    } else {
      Db::name('withdrawal')->where('order_num',$data['order_sn'])->update(['status'=>1]);

      fwrite($file,"\n");
      fwrite($file,'下分成功=====');
      fwrite($file,"\n");
    }
    return 'success';
  }






  //支付接口
  /**
   * 新支付通道
   */
  public  static function pay_one($amount,$zsamount){

    $uid = session('uid');
    $username = session('username');
    $user = Db::name('user')->where('id', $uid)->find();

    $url = "https://api.ruspay.net/api/Pay/addPay";
    $mch_order_no = date('YmdHis',time()).'_'.uniqid();
    $trade_amount = $amount;

    $pay_config = PayConfig::getConfig();

    $mch_id = $pay_config['mch_id'];
    $pay_type = $pay_config['pay_type'];
    $token = $pay_config['token'];
    $notify_url = $pay_config['pay_notify_url'];


    $order_date = date('Y-m-d H:i:s',time());

    $dataTmp = [
      'mch_id' => $mch_id,
      'pay_type' => $pay_type,
      'mch_order_no' => $mch_order_no,
      'trade_amount' => $trade_amount,
      'order_date' => $order_date,
      'notify_url' => $notify_url,
      'user_id' => $uid
    ];




    //按字典正序排序传入的参数
    ksort($dataTmp);
    $sign_str='';
    foreach($dataTmp as $pk=>$pv){
      $sign_str.="{$pk}={$pv}&";
    }
    $sign_str.="key={$token}";


    $dataTmp['sign'] = md5($sign_str);


    $res = self::Posts($url,$dataTmp);
    $res = json_decode($res,true);


    if($res['code'] !=  20000){
      return json(['status' => 0, 'msg' => lang('wa_sub_failed')]);//提交失败
    }




    Db::startTrans();
    $res_rech = Db::name('recharge')
      ->insertGetId([
        'order_num' => $mch_order_no,
        'uid' => $uid,
        'username' => $username,
        'money_front' => $trade_amount,
        'money_after' => $user['money'] + $trade_amount,
        'type' => 1,
        'zsamount' => $zsamount,
        'money' => $trade_amount,
        'addtime' => time(),
        'channel' => 93
      ]);
    if ($res_rech) {
      Db::commit();
      header("location:".$res['result']['pay_pageurl']);
    } else {
      Db::rollback();
      return json(['status' => 0, 'msg' => lang('wa_sub_failed')]);//提交失败
    }


  }


//	==============================================  新支付通道 2

  public static function pay_two($amount,$zsamount){
    $url = 'https://api.eggoout.com/payin/unifiedorder.do';
    $pay_config = PayConfig::getConfig();

    $amount = $amount*100;
    $uid = session('uid');
    $username = session('username');
    $user = Db::name('user')->where('id', $uid)->find();

    $mch_id = $pay_config['mch_id'];
    $pay_type = $pay_config['pay_type'];
    $token = $pay_config['token'];
    $notify_url = $pay_config['pay_notify_url'];


    $mch_order_no = date('YmdHis',time()).'_'.uniqid();
    $dataTmp = [
      'merchantNo' => $mch_id,
      'channelCode' => $pay_type,
      'merchantOrderId' => $mch_order_no,
      'amount' => $amount,
      'currency' => 'TRY',
      'expireTime' => 60,
      'notifyUrl' => $notify_url,
    ];

    //按字典正序排序传入的参数
    ksort($dataTmp);
    $sign_str='';
    foreach($dataTmp as $pk=>$pv){
      $sign_str.= $pk."=".$pv."&";
    }

    $sign_str.="key={$token}";


    $dataTmp['subject'] = '支付';
    $dataTmp['version'] = '1.0';



    $hash = hash_hmac('sha256', $sign_str, $token);
    $dataTmp['sign'] = $hash;


    $res = self::json_post($url,$dataTmp);
    $res = json_decode($res,true);


    if($res['code'] !=  000){
      return json(['status' => 0, 'msg' => lang('wa_sub_failed')]);//提交失败
    }





    Db::startTrans();
    $res_rech = Db::name('recharge')
      ->insertGetId([
        'order_num' => $mch_order_no,
        'uid' => $uid,
        'username' => $username,
        'money_front' => $amount/100,
        'money_after' => $user['money'] + $amount/100,
        'type' => 1,
        'zsamount' => $zsamount,
        'money' => $amount/100,
        'addtime' => time(),
        'channel' => $pay_type
      ]);
    if ($res_rech) {
      Db::commit();
      header("location:".$res['data']['checkStand']);
    } else {
      Db::rollback();
      return json(['status' => 0, 'msg' => lang('wa_sub_failed')]);//提交失败
    }

  }




  public function notifyRusPay2(){
    $data = $this->request->param();



    $dtTmp = date('Ymd');
    $file = fopen("public/pay/rusPay_notify2$dtTmp.txt","a+");
    fwrite($file,date('Y-m-d H:i:s',time())."返回数据===\n");
    fwrite($file,json_encode($data));
    fwrite($file,"\n");


    $mch_order_no = $data['merchantOrderId'];
    $amount = $data['amount']/100;

    $info = Db::name('recharge')->where('order_num',$mch_order_no)->find();
    if($info['status'] == 0){
      $user =  Db::name('user')->where('id', $info['uid'])->find();


      Recharge::Recommendation_reward($info['uid'], $user['parent_id'], $amount);
      //处于初始状态的时候
      Db::name('recharge')
        ->where('order_num',$mch_order_no)
        ->update(['status'=>1,'money'=>$amount,'pay_time'=>time(),'fee'=>$data['fee']/100,'realAmount'=>$data['realAmount']/100]);
      //用户余额新增

      $proconfig = Db::name('proconfig')->where('id',1)->find();

     // $amount = $amount - ($amount*$proconfig['top_up_ratio']/100);

      Db::name('user')->where('id', $info['uid'])->update(['money'=>$user['money']+$amount+$info['zsamount']]);
      echo('SUCCESS');
    }
  }



  // 代收回调处理
  public function xf2()
  {
    $data = $this->request->param();
    $dtTmp = date('Ymd');
    $file = fopen("public/pay/sevenPay2_notify$dtTmp.txt","a+");

    fwrite($file,"返回数据===\n");
    fwrite($file,json_encode($data));
    fwrite($file,"\n");


    $info = Db::name('withdrawal')->where('order_num',$data['merchantOrderId'])->find();
    if($info['status'] != 4){
      fwrite($file,"\n");
      fwrite($file,'回调已经成功=====');
      fwrite($file,"\n");
      return 'success';
    }


    if ($data['status'] != 'SUCCESS') {
      Db::name('withdrawal')->where('order_num',$data['merchantOrderId'])->update(['status' => 2]);

      fwrite($file,"\n");
      fwrite($file,'下分失败=====');
      fwrite($file,"\n");
    } else {
      Db::name('withdrawal')->where('order_num',$data['merchantOrderId'])->update(['status'=>1,'fee'=>$data['fee']/100,'realAmount'=>$data['realAmount']/100]);
      $proconfig = Db::name('proconfig')->where('id',1)->find();

//      $tuifee = $info['money'] ;
//      $uid = $info['uid'];
//      Db::name('user')->where('id', $uid)->inc('money', $tuifee)->update();
      fwrite($file,"\n");
      fwrite($file,'下分成功=====');
      fwrite($file,"\n");
    }
    return 'success';
  }





}

