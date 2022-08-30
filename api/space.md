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

#### 成功返回示例

```json
{
	"code": 200,
	"result": {
		"total": 1,
		"hasNext": false,
		"items": [{
			"type": 2,
			"name": "测试空间",
			"hub_id": "e4Uaa4f",
			"hub_url": "https://your_space_url",
			"expired_at": 0,
			"status": 2
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
	"result": {"status" => 1},
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
