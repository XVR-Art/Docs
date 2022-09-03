# 空间接口

### 获取空间列表
/api/v1/open/space/list

#### 接口业务参数
<table width="100%">
    <tr>
      <th width="25%">参数</th>
      <th>说明</th>
    </tr>
    <tr>
      <td>page</td>
      <td>当前页码, 非必填, 默认1</td>
    </tr>
    <tr>
      <td>page_size</td>
      <td>每页条数, 非必填, 默认10</td>
    </tr>
</table>

#### 返回字段描述
<table width="100%">
    <tr>
      <th width="25%">参数</th>
      <th>说明</th>
    </tr>
    <tr>
      <td>type</td>
      <td>空间类型, 1: 私有房间 (private) 访问需鉴权, 2: 公共房间 (public)</td>
    </tr>
    <tr>
      <td>name</td>
      <td>空间名称</td>
    </tr>
    <tr>
      <td>hub_id</td>
      <td>空间ID, 唯一</td>
    </tr>
    <tr>
      <td>hub_url</td>
      <td>空间地址, Access Token 授权时需携带 access_token 授权参数在此URL上</td>
    </tr>
    <tr>
      <td>auth_type</td>
      <td>授权类型, 1: 无需鉴权 (none), 2: 密钥 (access_token), 3: 第三方接口鉴权 (url)</td>
    </tr>
    <tr>
      <td>auth_url</td>
      <td>鉴权地址, auth_type=3时的第三方鉴权地址</td>
    </tr>
    <tr>
      <td>cover</td>
      <td>封面图片</td>
    </tr>
    <tr>
      <td>video</td>
      <td>视频地址</td>
    </tr>
    <tr>
      <td>fallback_url</td>
      <td>鉴权失败或退出房间时重定向地址, 优先级高于 customer.fallback_url</td>
    </tr>
    <tr>
      <td>logo_url</td>
      <td>LOGO地址</td>
    </tr>
    <tr>
      <td>expired_at</td>
      <td>过期时间, 东八区时间戳, 0为永不过期</td>
    </tr>
    <tr>
      <td>status</td>
      <td>状态, 1: 启用 (enabled), 2: 停用 (disabled)</td>
    </tr>
</table>

#### 成功返回示例

```json
{
    "code": 200,
    "result": {
        "total": 1,
        "hasNext": false,
        "items": [{
            "type": 1,
            "name": "测试空间",
            "hub_id": "Your space ID",
            "hub_url": "https://your_space_url",
            "cover": "",
            "video": "",
            "auth_type": 2,
            "auth_url": "",
            "fallback_url": "",
            "logo_url": "",
            "expired_at": 0,
            "status": 1
        }]
    },
    "msg": "OK"
}
```

#### 失败返回示例

```json
{
    "code": 400,
    "result": null,
    "msg": "签名验证失败(56)"
}
```

### 切换空间状态
/api/v1/open/space/toggleStatus

#### 接口业务参数
<table width="100%">
    <tr>
      <th width="25%">参数</th>
      <th>说明</th>
    </tr>
    <tr>
      <td>hub_id</td>
      <td>字符串, 要切换的空间ID</td>
    </tr>
</table>

#### 成功返回示例

```json
{
    "code": 200,
    "result": {
        "status": 1
    },
    "msg": "OK"
}
```

#### 失败返回示例
```json
{
    "code": 400,
    "result": null,
    "msg": "空间不存在"
}
```

### 获取空间访问授权码
/api/v1/open/space/getAccessToken

#### 接口业务参数
<table width="100%">
    <tr>
      <th width="25%">参数</th>
      <th>说明</th>
    </tr>
    <tr>
      <td>hub_id</td>
      <td>字符串, 要获取访问授权码的空间ID</td>
    </tr>
</table>

#### 成功返回示例

```json
{
    "code": 200,
    "result": {
        "access_token": "f9962bb90f2f45498ae2eebec5c0638e",
        "expired_at": 1662100301
    },
    "msg": "OK"
}
```

#### 失败返回示例
```json
{
    "code": 400,
    "result": null,
    "msg": "空间不存在"
}
```
