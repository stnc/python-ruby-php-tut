<?php 


function execInBackground($cmd) {
    if (substr(php_uname(), 0, 7) == "Windows"){
        pclose(popen("start /B ". $cmd, "r")); 
    }
    else {
        exec($cmd . " > /dev/null &");  
    }
}

execInBackground('notepad.exe');
$a='a:8:{s:28:"chromatin_teamSetting_Status";s:0:"";s:30:"chromatin_teamSetting_facebook";s:0:"";s:29:"chromatin_teamSetting_twitter";s:0:"";s:28:"chromatin_teamSetting_github";s:0:"";s:31:"chromatin_teamSetting_inteagram";s:0:"";s:32:"chromatin_teamSetting_googleplus";s:0:"";s:30:"chromatin_teamSetting_linkedin";s:0:"";s:29:"chromatin_teamSetting_youtube";s:0:"";}';
$r=unserialize ($a);
var_dump ($r);