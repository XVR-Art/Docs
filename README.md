# XVR.Art 开放文档

[![XVR元宇宙](https://xvr.oss-cn-hangzhou.aliyuncs.com/common/logo.png)](https://xvr.art)


XVR元宇宙致力于提供虚拟数字空间服务，为数字藏品赋能元宇宙，同时支持教育培训，会议空间，画廊展馆等空间。


### API列表

1. [客户接口 (Customer)](https://github.com/XVR-Art/Docs/blob/master/api/customer.md)
   
   1. 获取您在XVR.art的客户信息

2. [空间接口 (Space)](https://github.com/XVR-Art/Docs/blob/master/api/space.md)
   
   1. 获取空间列表
   
   2. 切换空间状态
   
   3. 获取空间一次性访问密钥 (Access Token)

3. [鉴权接口 (Auth)](https://github.com/XVR-Art/Docs/blob/master/api/auth.md)

    1. 自定义您的空间的鉴权逻辑, 控制谁可以进入空间

### 可用SDK

1. [PHP SDK](https://github.com/XVR-Art/Docs/tree/master/sdks/php)

### 接口公共参数
<table width="100%">
    <tr>
        <th width="25%">参数</th>
        <th>说明</th>
    </tr>
    <tr>
        <td>ak</td>
        <td>字符串, 系统为每个客户分配的唯一身份凭证</td>
    </tr>
    <tr>
        <td>sign</td>
        <td>字符串, 签名, [详见签名算法](#sign)</td>
    </tr>
    <tr>
        <td>timestamp</td>
        <td>数字, 东八区时间戳</td>
    </tr>
</table>


### 接口调用说明

1. 所有参数(公共参数和业务参数)使用x-www-form-urlencoded的方式提交

2. 接口返回内容均为json, 且只有在业务成功的时候返回 http 200,  其他时候视情况而定, 业务出错返回 http 400, 系统异常返回 http 500, 具体信息请检查返回的 msg 字段。

### <span id="sign">签名算法</span>

所有参数(公共参数和业务参数), 除了 sign 全部需要加入签名。

参数按键升序排列后，然后把键值拼接, 首尾再拼接上sk(系统分配的接口密钥), MD5后小写处理即可。

```php
# 伪代码
sign = strtolower(md5(sk . k1 . v1 . k2 . v2 . sk))
```

```php
# 签名的PHP实现
function makeSign(array $params, string $secret): string
{
    ksort($params);
    $string = $secret;
    foreach ($params as $key => $val) {
        $string .= $key . $val;
    }
    $string .= $secret;
    
    return strtolower(md5($string));
}
```

