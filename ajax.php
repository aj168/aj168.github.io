<?php 
//qq 1900432277
error_reporting(0); 
$act=isset($_GET['act'])?$_GET['act']:null;
$url=isset($_GET['url'])?$_GET['url']:null;
    switch($act){
        case 'dy':
            $reurl = substr($url,strpos($url,"http"));
            if(strpos($reurl," ")>0){
                $reurl = substr($reurl,0,strpos($reurl," "));
            }
            ini_set('user_agent','user-agent: Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3');
            $url = file_get_contents($reurl);

            preg_match('/itemId:\s+\"(.*?)\"/sS',$url,$itemId);
            preg_match('/dytk:\s+\"(.*?)\"/sS',$url,$dytk);
            $json = file_get_contents('https://www.iesdouyin.com/web/api/v2/aweme/iteminfo/?item_ids='.$itemId[1].'&dytk='.$dytk[1]);
            $res = json_decode($json,true);

            $name = $res['item_list'][0]['desc'];//名称
            $img = $res['item_list'][0]['video']['origin_cover']['url_list'][0];//图
            $img_run = $res['item_list'][0]['video']['dynamic_cover']['url_list'][0];//缩略视频
            $zan = $res['item_list'][0]['statistics']['digg_count']; //点赞
            $pl = $res['item_list'][0]['statistics']['comment_count']; //评论
            $url = $res['item_list'][0]['video']['play_addr']['url_list'][0];
            $video = getrealurl(str_replace("playwm","play",$url));
            if(!empty($url)){
                echo '{"code":1,"msg":"解析成功","name":"'.$name.'","url":"'.$video.'","img":"'.$img.'","img_run":"'.$img_run.'","zan":"'.$zan.'","pl":"'.$pl.'"}';
            }else{
                echo '{"code":-1,"msg":"未知错误"}';
            }
        break;
    default:
        exit('{"code":0,"msg":"No Act"}');
    break;
}

        function getrealurl($url){
            $header = get_headers($url,1);
            return $header['location']; 
        }   
 ?>