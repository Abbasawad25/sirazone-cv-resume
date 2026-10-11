





































<?php
define('TOKEN','8548408886:AAF6h9X_DnKqdvEjC-0O4U8h7jDvtOjQ9ek'); 

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".TOKEN."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
function sortlist($text){
$exline = explode("\n",$text);
$arr = [];
$arrtext = [];
$out = "";
if(strstr($text,"المشتركين") == true){
$si = 3;
$sn = 3;
$last = true;
}else{
$si = 1;
$sn = 2;
$last = false;
}
for($i = $si;$i < count($exline)-1;$i++){
$number = explode(" ",$exline[$i]);
$number = str_replace(",","",$number[$sn]);
$arrtext[]= [$number=>$exline[$i]];
$arr[]= $number;
}
sort($arr);
for($z = 0;$z < count($arr);$z++){
foreach($arrtext as $aaa){
foreach($aaa as $value => $textx)
if($arr[$z] == $value){
$out = $out . $textx."\n";
}
}
}
$c = count($exline)-1;
if(!$last){
return $exline[0]."\n".$out.$exline[$c];
}else{
return $exline[0]."\n".$exline[1]."\n"."\n".$out.$exline[$c];
}
}
if($text == "/start"){
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"مرحبا بك, 
قم بتوجيه رسالة لستة القنوات من بوت النشر الخاص بك الى هنا 

welcome, forward me the list of channels that you got from your bot and I'll sort them for you",
      ]);
    }
if($text != "/start"){
if(strstr($text,"/verify - لفحص القنوات") == true or strstr($text,"total channels subs") == true){
bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>sortlist($text),
  ]);
}else{
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"plsease forward the list of channels from your bot to me.

الرجاء قم بتوجيه رسالة لستة القنوات من بوت النشر الخاص بك الى هنا.",
      ]);
}
}
