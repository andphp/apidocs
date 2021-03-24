---
title: example
urlname: api/example
sticky: 1
cover: false
date: 2020-11-13 22:54:13
tags: [system,apiDocs]
categories: 
- system
keywords:
description:
top_img:
---



### 请求URI:

```http
http://newiot.test/api/front/v2/login/post
```

> Description:获取社区下所有楼栋

### Header参数：

|参数名|值|
|--|--|
|  | Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3.... |

### 请求参数：【formdata】

|参数名|示例值|描述|类型|是否必须|
|--|--|--|--|--|
| version | v1 |  | string |  |
| method | signUp.admin.login |  | string |  |
| username | admin |  | string |  |
| password | 123456 | 密码 | number |  |
| platform | ios3443 |  | string |  |
| format | json |  | string |  |
| community_building_id | 17 |  | number |  |
| building_id | 89 |  | number |  |
| gate_number | 2 |  | number |  |
| id | 49 |  | number |  |
| size | 2 |  | number |  |
| phone | 13983854512 |  | string |  |
| api_token | eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiIiL.... | 身份认证token | string |  |
| password | 123456 | 密码 | number |  |
| ids | 12 |  | number |  |

#### 获取社区下所有楼栋(共1个示例)

```
{
    "code": 200,
    "msg": "",
    "data": [
        {
            "id": 89,
            "name": "A栋"
        },
        {
            "id": 90,
            "name": "B栋"
        },
        {
            "id": 91,
            "name": "C栋"
        },
        {
            "id": 101,
            "name": "F栋"
        },
        {
            "id": 102,
            "name": "Z栋"
        }
    ]
}
```

---
