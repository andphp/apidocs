---
title: 创建用户赋Docker权限
sticky: 1
cover: false
date: 2020-11-13 23:40:53
tags:
categories:
keywords:
description:
top_img:
---

### 用户操作

1. 增加用户 useradd [username]
2. 设置用户密码 passwd [username]
3. 删除用户 userdel [username]
4. 查看所有用户 cat /etc/passwd
5. 查看当前活跃用户 w
6. 查看简明用户列表 cat /etc/passwd|grep -v nologin|grep -v halt|grep -v shutdown|awk -F":" '{ print $1"|"$3"|"$4 }'|more

### 用户组操作

1. 新建工作组 groupadd [groupname]
2. 将用户添加进工作组 usermod -G [groupname] [username]
3. 查看用户组 cat /etc/group

### 授权sudo权限，需要修改sudoers文件。
> 首先找到文件位置，示例中文件在/etc/sudoers位置。

```
whereis sudoers
```

> 强调内容 修改文件权限，一般文件默认为只读。
```
ls -l /etc/sudoers 查看文件权限
chmod -v u+w /etc/sudoers 修改文件权限为可编辑
```

> 修改文件，在如下位置增加一行，保存退出。
```
vim /etc/sudoers 进入文件编辑器
```

* 文件内容改变如下：
```
root ALL=(ALL) ALL 已有行
username ALL=(ALL) ALL 新增行
```
> 记得将文件权限还原回只读。
```
ls -l /etc/sudoers 查看文件权限
chmod -v u-w /etc/sudoers 修改文件权限为只读
```

### docker 权限

> docker守护进程启动的时候，会默认赋予名字为docker的用户组读写Unix socket的权限，因此只要创建docker用户组，并将当前用户加入到docker用户组中，那么当前用户就有权限访问Unix socket了，进而也就可以执行docker相关命令

```
sudo groupadd docker     #添加docker用户组
sudo gpasswd -a $USER docker     #将登陆用户加入到docker用户组中
newgrp docker     #更新用户组
docker ps    #测试docker命令是否可以使用sudo正常使用
```