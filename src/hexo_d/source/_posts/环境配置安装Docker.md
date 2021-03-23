---
title: CentOS环境配置安装Docker
date: 2020-11-13 21:57:50
tags: [Docker,CentOS]
categories: 
- 服务器
---

### CentOS环境配置安装Docker
#### 查看升级系统内核
> Docker 要求 CentOS 系统的内核版本高于 3.10 ，查看本页面的前提条件来验证你的CentOS 版本是否支持 Docker 。

* 通过 uname -r 命令查看你当前的内核版本

```
uname -r
```
#### 使用 root 权限登录 Centos。确保 yum 包更新到最新。

```
yum update -y
```

#### 卸载旧版本(如果安装过旧版本的话)

```
yum remove docker docker-common docker-selinux docker-engine
```

#### 安装需要的软件包
> yum-util 提供yum-config-manager功能，另外两个是devicemapper驱动依赖的

```
yum install -y yum-utils device-mapper-persistent-data lvm2
```

#### 设置yum源
> 设置yum源【docker官方镜像源】

```
yum-config-manager --add-repo https://download.docker.com/linux/centos/docker-ce.repo
```
> 设置yum源【docker阿里镜像源】

```
yum-config-manager --add-repo http://mirrors.aliyun.com/docker-ce/linux/centos/docker-ce.repo
```

#### 安装docker
> 可以查看所有仓库中所有docker版本，并选择特定版本安装

```
yum list docker-ce --showduplicates | sort -r
```
```
dnf install https://download.docker.com/linux/centos/7/x86_64/stable/Packages/containerd.io-1.2.6-3.3.el7.x86_64.rpm
```

> 由于repo中默认只开启stable仓库，故这里安装的是最新稳定版17.12.0

```
yum install <FQPN>  # 例如：sudo yum install docker-ce-17.12.0.ce
```

> 安装docker

```
yum install docker-ce -y
```


#### 启动并加入开机启动

```
systemctl start docker
systemctl enable docker
```

> 验证安装是否成功(有client和service两部分表示docker安装启动都成功了)

```
docker version
```

 

### 问题

> 因为之前已经安装过旧版本的docker，在安装的时候报错如下：

```
Transaction check error:
  file /usr/bin/docker from install of docker-ce-17.12.0.ce-1.el7.centos.x86_64 conflicts with file from package docker-common-2:1.12.6-68.gitec8512b.el7.centos.x86_64
  file /usr/bin/docker-containerd from install of docker-ce-17.12.0.ce-1.el7.centos.x86_64 conflicts with file from package docker-common-2:1.12.6-68.gitec8512b.el7.centos.x86_64
  file /usr/bin/docker-containerd-shim from install of docker-ce-17.12.0.ce-1.el7.centos.x86_64 conflicts with file from package docker-common-2:1.12.6-68.gitec8512b.el7.centos.x86_64
  file /usr/bin/dockerd from install of docker-ce-17.12.0.ce-1.el7.centos.x86_64 conflicts with file from package docker-common-2:1.12.6-68.gitec8512b.el7.centos.x86_64
```
 
> 卸载旧版本的包

```
yum erase docker-common-2:1.12.6-68.gitec8512b.el7.centos.x86_64
```

> 再次安装docker
```
yum install docker-ce
```


### 安装docker-compose

> 安装epel源.

```
yum install -y epel-release
```

> 安装docker-compose

```
yum install -y docker-compose
```