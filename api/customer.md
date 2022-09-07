# 客户接口

### 获取客户信息
/api/v1/open/customer/info

#### 接口业务参数
<table width="100%">
    <tr>
      <th width="25%">参数</th>
      <th>说明</th>
    </tr>
    <tr>
      <td colspan="2">本接口无需传入任何业务参数</td>
    </tr>
</table>

#### 成功返回示例

```json
{
    "code": 200,
    "result": {
        "type": 1,
        "industry_id": 0,
        "name": "测试客户",
        "phone": null,
        "email": null,
        "memo": null,
        "auth_url": null,
        "fallback_url": null,
        "room_count": 1,
        "room_quota": 10,
        "expired_at": 0,
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
    "msg": "签名验证失败(56)"
}
```
