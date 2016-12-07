#!/bin/bash
set -e

#给文件目录写权限
chmod -R 777 /www/zentaopms/www/data/upload/1/

exec "$@"
