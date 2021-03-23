---
title: Linux-CentOS7-升级内核的方法
sticky: 1
cover: false
date: 2020-11-13 22:54:13
tags: [Linux,CentOS]
categories: 
- 服务器
keywords:
description:
top_img:
---

### 查看操作系统内核版本
```
uname -r
```

### 安装ELRepo到CentOS
> 最好从官方网站获取最新版本（官网地址：http://elrepo.org/tiki/tiki-index.php），下面两个命令直接从官网上复制最新版的即可。

```
rpm --import https://www.elrepo.org/RPM-GPG-KEY-elrepo.org
```
```
yum install https://www.elrepo.org/elrepo-release-7.0-3.el7.elrepo.noarch.rpm -y
```

### 添加 repository 后, 列出可以使用的kernel包版本

```
yum --disablerepo="*" --enablerepo="elrepo-kernel" list available
```

### 安装需要的kernel版本，这里安装 kernel-lt

```
yum --enablerepo=elrepo-kernel install kernel-lt -y
```

> 内核版本介绍：
lt:longterm的缩写：长期维护版；
ml:mainline的缩写：最新稳定版；

### 检查kernel启动顺序

```
cat /boot/grub2/grub.cfg
```

> 查看到刚才安装的kernel版本处在第一个位置，修改/etc/default/grub文件是系统在运行时自动执行最新的kernel

```
vi /etc/default/grub
```

修改
```
GRUB_DEFAULT=0
```

### 重新创建kernel配置

```
grub2-mkconfig -o /boot/grub2/grub.cfg
```

### 重新启动服务器使用最新kernel

```
reboot
```