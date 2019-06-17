<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/6/17
 * Time: 下午3:07
 */

$http = new \Swoole\Http\Server("0.0.0.0",9501);
$redis = new \Redis();
$redis->connect("127.0.0.1",6379);
$redis->auth('123456');
$http->set([
   'worker_num' => 2,
   'task_worker_num' => 5,
   'daemonize' => false
]);

$http->on('request',function (\Swoole\Http\Request $request,\Swoole\Http\Response $response) use ($http,$redis){
//请求过滤
    if($request->server['path_info'] == '/favicon.ico' || $request->server['request_uri'] == '/favicon.ico'){
        return $response->end();
    }
    $taskId = isset($request->get['taskId']) ? $request->get['taskId']: '';
    if($taskId !== ''){
        //返回任务状态
        $status = $redis->get($taskId);
        return $response->end("task: $taskId;status: $status");
    }
    $params = json_encode(array(111,222));//此处处理requst请求数据作为任务执行的数据，根据需要修改
    $taskId = $http->task($params);
    $response->end("<h1>Do task:$taskId.</h1>");
});

$http->on('task',function($serv, $taskId, $fromId, $data) use ($redis){
//任务处理，可以把处理结果和状态在redis里面实时更新，便于获取任务状态
    for($i = 0; $i < 50;$i++){
        $redis->set('task' . $taskId, $i);
        sleep(1);
    }
    return $i;//必须有return 否则不会调用onFinish
});

$http->on('Finish',function ($serv, $taskId, $data){
    echo "$taskId task finish";
});

$http->start();