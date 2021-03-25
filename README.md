# apiDocs
laravel(>=8.12)

## 配置
> app_path()/Console/Kernel.php 中追加
```
 \AndPHP\ApiDocs\ApiDocsCommand::class,
```

## 创建 Markdown文件
> 路径: app_path()/ApiDocs/Markdown (没有文件夹，可自行创建)

> 事例

* 配置

```
---
title: 事例         
url_name: api/example
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
```

## 执行命令

```
php artisan docs:html
```