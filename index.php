<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <title>抖音视频无水印解析 - 阿洛科技</title>
    <meta name="keywords" content="抖音视频解析,无水印解析">
    <meta name="description" content="抖音视频解析,无水印解析">
    <link href="//lib.baomitu.com/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="//lib.baomitu.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="http://wap.gouzaizi.cn/assets/simple/css/oneui.css">
    <script src="//lib.baomitu.com/jquery/1.12.4/jquery.min.js"></script>
    <!--[if lt IE 9]>
    <script src="//lib.baomitu.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="//lib.baomitu.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <img style="background: linear-gradient(to bottom,#49BDAD,#6a67c7);" class="full-bg full-bg-bottom animated pulse" ondragstart="return false;" oncontextmenu="return false;">

<div style="padding-top: 99px;">
<h1 class="font-s48 font-w700 text-uppercase text-white push-10 text-center animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown"><trans>抖音无水印解析</trans></h1>
<h2 class="h3 font-w400 text-white-op push-50 text-center animated fadeIn" data-toggle="appear" data-timeout="750"><trans>阿洛科技</trans></h2>

<div class="col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-4">
    <div class="col-md-6">
        <div class="block">
        <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs">
            <li class="active"><a href="#home"><i class="fa fa-paw text-primary push-5-r"></i><trans>请输入视频连接</trans><i class="fa fa-paw text-primary push-5-l"></i></a></li>
        </ul>
        <div class="block-content tab-content">
            <div class="tab-pane active in" id="home">
                <div class="col-sm-12">
                    <div class="input-daterange input-group">
                        <span class="input-group-addon">视频连接</span>
                        <input class="form-control" type="text" name="url" placeholder="请输入视频连接">
                    </div><br>
                     <button class="btn btn-primary btn-block" id="jx" style="background-color: #6a67c7; border-color: #6a67c7;">一键解析</button>
                </div>
            </div>
        </div>
        <hr>
            </div>
        </div>
    </div>
</div>

</div>


<div class="bg-black-op">
<div class="content content-boxed">
<div class="push-20-t push-50">
<div class="row items-push text-center">
<div class="col-xs-6 col-md-3 animated flipInY" data-toggle="appear" data-offset="-100" data-class="animated flipInY" data-timeout="200">
<div class="item item-2x item-circle push-10">
<i class="fa fa-paw fa-2x text-white"></i>
</div>
<div class="font-w600 text-white-op text-uppercase"><trans>一键去除</trans></div>
</div>
<div class="col-xs-6 col-md-3 animated flipInY" data-toggle="appear" data-offset="-100" data-class="animated flipInY" data-timeout="400">
<div class="item item-2x item-circle push-10">
<i class="fa fa-safari fa-2x text-white"></i>
</div>
<div class="font-w600 text-white-op text-uppercase"><trans>方便快捷</trans></div>
</div>
<div class="col-xs-6 col-md-3 animated flipInY" data-toggle="appear" data-offset="-100" data-class="animated flipInY" data-timeout="600">
<div class="item item-2x item-circle push-10">
<i class="fa fa-gift fa-2x text-white"></i>
</div>
<div class="font-w600 text-white-op text-uppercase"><trans>永久免费</trans></div>
</div>
<div id="kf" class="col-xs-6 col-md-3 animated flipInY" data-toggle="appear" data-offset="-100" data-class="animated flipInY" data-timeout="800">
<div class="item item-2x item-circle push-10">
<i class="fa fa-qq fa-2x text-white"></i>
</div>
<div class="font-w600 text-white-op text-uppercase"><trans>联系客服</trans></div>
</div>
</div>
</div>
</div>
</div>

<div style="display:none">
    <script type="text/javascript" src="https://s23.cnzz.com/z_stat.php?id=848113217&web_id=848113217"></script>
</div>
<script src="//lib.baomitu.com/layer/2.3/layer.js"></script>
<script>
    $('#kf').click(function(){
        window.open("http://wpa.qq.com/msgrd?v=3&uin=848113217&site=qq&menu=yes");
    });

    $('#jx').click(function(){
        var loading = layer.load(4, { shade: false });
        var url = $('input[name="url"]').val();
        $.ajax({
            type:"GET",
            url:"./ajax.php?act=dy",
            dataType:"json",
            async:true,
            scriptCharset: 'GBK',
            data:{'url':url},
            beforeSend:function(){
               $('#jx').attr('disabled',true).html('正在解析中');
            },
            success:function(data){
                if(data.code==1){
                     layer.open({
                          type: 1,
                          title:data.name,
                          skin: 'layui-layer-rim',
                          area: ['288px', '456px'],
                          content: '<img src="'+data.img+'" class="img-thumbnail"><hr><div class="alert alert-warning"><a target="_blank" class="btn btn-danger btn-sm" href="'+data.img_run+'">查看缩略图(动)</a> <a target="_blank" class="btn btn-info btn-sm" href="'+data.img+'">查看缩略图(静)</a> <hr> <button class="btn btn-success btn-sm btn-block" onclick="layer.alert(\''+data.url+'\',{skin:\'layui-layer-molv\'})">查看视频链接</button></div><div class="alert alert-danger text-center">有问题请联系客服</div>'
                        });
                }else{
                    layer.alert(data.msg,{icon:2});
                }
                $('#jx').attr('disabled',false).html('一键解析');
                layer.close(loading);
            },
            error:function(){
               layer.alert('错误',{icon:2});
               $('#jx').attr('disabled',false).html('一键解析');
               layer.close(loading);
            }
        });
    });
</script>