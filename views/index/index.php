<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8>
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0" name=viewport>
    <title>幻境体验馆</title>
    <style>html,
        body {
            width: 100%;
            height: 100%;
        }</style>
    <link href=/assets/css/app.632d34605f759b8efeb2c1b3b5fc29e7.css rel=stylesheet>
</head>
<body>
<div id=app></div>
<script src=//res.wx.qq.com/open/js/jweixin-1.2.0.js></script>
<script>(function (wx) {
        var wxConfig = {
            debug: false,
            appId: '<?php echo $wx["appId"]?>',  // appid
            timestamp: '<?php echo $wx["timestamp"]?>',  // timestamp
            nonceStr: '<?php echo $wx["noncestr"]?>',  // nonceStr
            signature: '<?php echo $wx["signature"]?>', // signature
            jsApiList: ['onMenuShareTimeline',
                'onMenuShareAppMessage',
                'onMenuShareQQ',
                'onMenuShareWeibo',
                'onMenuShareQZone']
        }
        var shareInfo = {
            title: '幻境体验馆 遇见真实的自己',
            desc: '快来参与赢取意大利双人往返机票吧',
            link: location.href.replace(/\#.*/, ''),
            imgUrl: '/static/share-image.jpeg'
        }
        wx.config(wxConfig)
        wx.ready(function () {
            wx.onMenuShareTimeline(shareInfo)
            wx.onMenuShareAppMessage(shareInfo)
            wx.onMenuShareQQ(shareInfo)
            wx.onMenuShareWeibo(shareInfo)
            wx.onMenuShareQZone(shareInfo)
        })
    })(window.wx)</script>
<script type=text/javascript src=/assets/js/manifest.17490b280f1afd2d1291.js></script>
<script type=text/javascript src=/assets/js/vendor.1d34141f00580838cacc.js></script>
<script type=text/javascript src=/assets/js/app.096d52cab6a168e78733.js></script>
</body>
</html>