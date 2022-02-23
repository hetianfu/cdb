<?php
declare (strict_types = 1);

namespace app\index\middleware;

class Check
{
  /**
   * 处理请求
   *
   * @param \think\Request $request
   * @param \Closure       $next
   * @return Response
   */
  public function handle($request, \Closure $next){

    //前置中间件
    if(empty(session('uid'))&& !preg_match('/pay/',$request->pathinfo())  && !preg_match('/Pay/',$request->pathinfo()) && !preg_match('/login/',$request->pathinfo()) && !preg_match('/Login/',$request->pathinfo()) && !preg_match('/sem/',$request->pathinfo())){
      return redirect((string) url('login/index'));
    }
    return $next($request);
  }
}
