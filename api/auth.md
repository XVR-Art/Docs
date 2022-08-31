# 鉴权接口

### 功能描述

用户在进入空间时, XVR.Art 将把用户信息以 x-www-form-urlencoded 的方式发送至您指定的地址进行鉴权, 鉴权通过后用户才能进入此空间, 您需要按下面指定的格式返回鉴权是否成功。

注意: 私有空间才会通过此方式进行鉴权, 公共空间不会要求此鉴权。

#### 发送参数列表 (x-www-form-urlencoded)

<table width="100%">
    <tr>
      <th width="25%">参数</th>
      <th>说明</th>
    </tr>
    <tr>
      <td>email</td>
      <td>字符串, 用户邮箱, 以此参数和自有业务系统的账号对接</td>
    </tr>
    <tr>
      <td>hub_id</td>
      <td>字符串, 空间ID, 从空间列表接口可以获取到您开通的空间列表</td>
    </tr>
    <tr>
      <td>hub_url</td>
      <td>字符串, 空间地址</td>
    </tr>
</table>

#### 返回参数列表 (json)

<table width="100%">
    <tr>
      <th width="25%">参数</th>
      <th>说明</th>
    </tr>
    <tr>
      <td>code</td>
      <td>HTTP状态码, eg: 200</td>
    </tr>
    <tr>
      <td>msg</td>
      <td>消息, eg: OK</td>
    </tr>
    <tr>
      <td>status</td>
      <td>鉴权结果, 1 通过, 0 失败</td>
    </tr>
    <tr>
      <td>fallback_url</td>
      <td>鉴权失败时跳转的地址, 可以留空, 如果有相关活动页面建议传回</td>
    </tr>
</table>

#### 鉴权成功返回示例

```json
{
  "code": 200,
  "result": 1,
  "msg": "OK"
}
```

#### 鉴权返回示例

```json
{
  "code": 200,
  "result": 0,
  "fallback_url": "http://your_fallback_url",
  "msg": "当前用户无权进入空间"
}
```
