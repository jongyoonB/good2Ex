﻿#pragma  strict 

var  frames  :  Texture2D []; 
var  framesPerSecond  =  10.0 ; 

function  Start  ()  { 

} 

function  Update  ()  { 
    var  index  :  int  =  Time . time  *  framesPerSecond ; 
    index  =  index  %  frames . Length ; 
    GetComponent.<GUITexture>() . texture  =  frames [ index ]; 
}