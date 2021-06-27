# EPIC免费游戏web领取托管
项目创意来源于: [epicgames-freebies-claimer](https://github.com/Revadike/epicgames-freebies-claimer).

## 环境要求
- PHP(开发使用7.4.16版本 理论上7.x版本都支持)
- MYSQL
- [DeviceAuthGenerator](https://github.com/xMistt/DeviceAuthGenerator/releases)(文件内已包含)
- Node.js(开发使用v14.16.1 理论上任何版本都应该没问题)
- [XAMPP7.4.16版本](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/7.4.16/)(快速部署APACHE+MYSQL环境)
## 快速部署教程
1. 下载或clone仓库
2. npm install（国内用户可以使用cnpm 具体用法请自行搜索）
3. 更改api/conn.php中的数据库用户密码及数据库
4. 更改httpd.conf中的DocumentRoot为你的路径
5. 将数据库文件(.sql)运行



## FAQ
**这是啥**
  
  众所周知 EPIC每周送两游戏 但是很多人懒得登陆epic客户端（UE4做的客户端确实屎）或者懒得登陆网页版EPIC 那么这个项目适合真正的懒人，你只需要在本地通过DeviceAuthGenerator获取account_id,secret,device_id后上传至服务器 服务器即可自动遍历这些账号领取游戏


## 其他事情


![Alt](https://pics5.baidu.com/feed/f31fbe096b63f624e7ac9eed1eaa7bfe184ca364.jpeg?token=9200906c6200971ac8c81594d4df83f3)

## 更新日志
V1.0 初始化上传项目
- [x] 框框测试
