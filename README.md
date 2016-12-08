# docker-zentaopms
# Introduction
基于`Dokcer`,`Unbuntu16.04`,`PHP5.6`,`MySql5.7`,`Ngnix1.11.6` 搭建环境。
# Structure
![image](http://git.oschina.net/micooz/dockerfile/raw/master/structure.png)
#### 其中包括3个容器镜像：
    1. Ngnix Container
    2. PHP-FPM Container
    3. MySQL Container
#### 目录结构：
![image](https://raw.githubusercontent.com/jasonhcb/docker-zentaopms/master/list.png)


dockerfile use in docker edit and the conf use in the containers edit 

---

# Build And Run
## Use Dockder-compose 

```
$ cd zentaopms 
$ docker-compose up -d
```
## Use Docker build and run
### Build images
```
# build Nginx Image
$ sudo docker build --tag zentaopms/nginx -f nginx/Dockerfile .

# build PHP-FPM Image
$ sudo docker build --tag zentaopms/php-fpm -f php-fpm/Dockerfile .

# pull MySQL Official Image
$ sudo docker pull mysql:5.7
```
### Run containers
You must run the contaners in the following sequence:
1. MySQL Container
2. PHP-FPM Container
3. Nginx Container
```
# Run MySQL Container
$ sudo docker run --name mysql -v ./www/mysql:/var/lib/mysql  -e MYSQL_ROOT_PASSWORD=my-secret-pw -d mysql
# see https://github.com/docker-library/docs/tree/master/mysql

# Run PHP-FPM Container
$ sudo docker run --name php-fpm -v ./www:/www --link mysql:mysql -d micooz/php-fpm
# see https://github.com/docker-library/docs/tree/master/php

# Run Nginx Container
$ sudo docker run --name nginx -p 80:80 -p 443:443 -v ./www:/www --link php-fpm:fpmservice -d micooz/nginx
# see https://github.com/docker-library/docs/tree/master/nginx
```
至此，环境已经搭配好

---

## Zentaopms 安装以及注意事项
### install or reload
> - 官方安装：(这里以我本地服务的www为例子：本地我的项目路径为:/root/zentaopms/www/)

```
1. 下载安装包到/root/zentaopms/www/
2. 访问：IP: zentaopm/www/
3. 默认执行intall文件，安装指示安装
```
> - 拷贝安装

```
1. 将原本项目拷贝到你容器连接目录,这里是/root/zentaopms/www/
2. 编辑/root/zentaopms/www/zentaopms/config/my.php 修改主机配置，如Mysql密码等等
3. 将数据库dump，导入到新的数据库
4. 执行upgrate程序安装
```
### 注意事项：

```
1. 安装过程中遇到权限问题 ：需要给项目权限：(基于zentaopms项目目录)
$ chmod o=rwx -R config/
$ chmod o=rwx -R www/data
$ chmod o=rwx -R tmp
```
