//"use strict";
var resultdata;
const { "Launcher": EpicGames } = require("epicgames-client");
const { freeGamesPromotions } = require("./src/gamePromotions");
const { writeFile } = require("fs");
var sd = require('silly-datetime');
 
const Auths = require(`${__dirname}/device_auths.json`);
const CheckUpdate = require("check-update-github");
const Config = require(`${__dirname}/config.json`);
const History = require(`${__dirname}/history.json`);
const Logger = require("tracer").console(`${__dirname}/logger.js`);
const Package = require("./package.json");

var mysql      = require('mysql');
const { exit } = require("process");
var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : 'wodemima',
  database : 'epic'
});


var unclaimedPromos=[];
var userresult;
var bagresult;
var freeresult;
var gamelist;
connection.connect();
var userbagid=[];




let { options, delay, loop } = Config;



function isUpToDate() {
    return new Promise((res, rej) => {
        CheckUpdate({
            "name":           Package.name,
            "currentVersion": Package.version,
            "user":           "revadike",
            "branch":         "master",
        }, (err, latestVersion) => {
            if (err) {
                rej(err);
            } else {
                res(latestVersion === Package.version);
            }
        });
    });
}

function write(path, data) {
    // eslint-disable-next-line no-extra-parens
    return new Promise((res, rej) => writeFile(path, data, (err) => (err ? rej(err) : res(true))));
}

function sleep(delay) {
    return new Promise((res) => setTimeout(res, delay * 60000));
}

function newsleep(delay) {
    return new Promise((res) => setTimeout(res, delay));
}




selectUserName=function(sql,callback){

	connection.query(sql,function(err,result){
     // console.log(sql);
        if(err){
			console.log('[错误] --- ',err.message);
			return;
		} 
        var dataString = JSON.stringify(result);
        resultdata = JSON.parse(dataString);
        callback(resultdata)    //此处callback就是将值取出来
        
    	}); 
    };


    
selectUserName("SELECT * FROM user",result=>{
    userresult=result;
        getuserbag();
});










//获取用户账号信息
//获取用户已领取内容
//更新免费列表





function getuserbag()
{
  
    
    selectUserName("SELECT * FROM history",result=>{
        bagresult=result;
  
        
    rrr()
});

}


function inArray(search,array){
    for(var i in array){
        if(array[i]==search){
            return true;
        }
    }
    return false;
}



function deletefree()
{    

        
        selectUserName("delete from free",result=>{
        updatefree()
    });
    
    
}
    
    
    
function updatefree()
{
    
    


    for(let game of gamelist)
    {
        var sql="insert into free values('"+game.id+"','"+game.title+"')";
     
        selectUserName(sql,result=>{
            Logger.info(`已提交游戏更新`);
    });
    }
    
}











function rrr()
{
    (async() => { 
    

   
    Logger.info(`读取用户信息完毕 共`+userresult.length+"个账号");
    for (let email of userresult)
    {  
        //console.log("当前"+email)
        let { country } = email;
       // console.log(email)
        let useDeviceAuth = true;
        let clientOptions = { email: email.id };
        let client = new EpicGames(clientOptions);
      
        if (await!client.init()) {
            Logger.error("初始化进程失败");
            break;
        }
        userbagid.length=0;
        
            for (let game of bagresult)
            {
                 if(email.id==game.userid)
                 {
                 
                    userbagid.push(game.gameid)
                 }
            }
           
           
           let freePromos = await freeGamesPromotions(client, country, country);
        gamelist=freePromos;
        
     
        








     
    
        selectUserName("select id from free where id='"+freePromos[0].id+"'",results=>{
        if(results.length<1)
        {
            deletefree();
        }
        });

        //Logger.info(`本周`+freePromos.length+"个免费游戏");

    
        // write(`${__dirname}/device_auths.json`, JSON.stringify(Auths, null, 4)).catch(() => false); // ignore fails

        unclaimedPromos.length=0;

        for(let games of freePromos)
        {  
           // console.log(userbagid)
           //console.log(games.id+":"+inArray(games.id,userbagid))
           if(inArray(games.id,userbagid)==false)
           {
               unclaimedPromos.push(games);
           }
        }
        //console.log(unclaimedPromos.length);
        //exit()
            
            
          if(unclaimedPromos.length==0)
          {
            Logger.info(`账号:${email.id} 已经领过了所有游戏 跳过`);
            continue;
            
          }
         // console.log({ useDeviceAuth })
        let success = await client.login({ useDeviceAuth }).catch(() => false);
            if (!success) {
                Logger.error(`登陆失败 ${client.config.email}`);
                $sql="update user set fail=1 where id='"+client.config.email+"'";
                selectUserName(sql,results=>{})
                continue;
            }
            Logger.info(`登录 ${client.account.name} (${email.id})`);
            email.country = client.account.country;
          for  (let games of unclaimedPromos)
           {
            try {
                
                sql=" INSERT INTO history(gameid,namespace,title,userid,time)\
                SELECT  '"+games.id+"','"+games.namespace+"','"+games.title+"','"+client.config.email+"','"+sd.format(new Date(), 'YYYY-MM-DD HH:mm:ss')+"'\
                WHERE not exists (select userid from history\
                where gameid = '"+games.id+"' AND userid  = '"+client.config.email+"')";
                let purchased = await client.purchase(games, 1);
                    if (purchased) {
                    Logger.info(`成功领取 ${games.title} (${purchased})`);
                    selectUserName(sql,results=>{})
                    } else {
                    Logger.warn(`${games.title} 已经领取过`);
                    
                    selectUserName(sql,results=>{})
                    }
                } catch (err) {
                    Logger.warn(`领取 ${games.title} 失败 原因:(${err})`);
                    if (err.response
                    && err.response.body
                    && err.response.body.errorCode === "errors.com.epicgames.purchase.purchase.captcha.challenge") {
                    // It's pointless to try next one as we'll be asked for captcha again.
                    Logger.error("Aborting!");
                    break;
                    }
                    
                }
               
          }
           
        
     
            if(client.account!=undefined)
            {
            await client.logout();
            Logger.info(`登出 ${client.account.name} EPIC`);
            }




   
       
    }
    //console.log("循环完毕")
   exit();

})().catch((err) => {
    Logger.error(err);
    process.exit(1);
});
}





