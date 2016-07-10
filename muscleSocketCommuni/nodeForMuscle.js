var express = require('express');
var routes = require('routes');
var http = require('http');
var path = require('path');

var app = express();
app.use(express.static(path.join(__dirname, 'public')));

var httpServer =http.createServer(app).listen(3000, function(req,res){
  console.log('Socket IO server has been started');
});
// upgrade http server to socket.io server
var io = require('socket.io').listen(httpServer);

io.sockets.on('connection',function(socket){
   console.log('Connected');
   socket.emit('fromserver');
   socket.on('fromclient',function(data){
       //socket.broadcast.emit('toclient',data); 
       //socket.emit('toclient',data); 
       //console.log('Message from client :'+data.msg);
       console.log('Message : '+data);
   })
   socket.on('MusclePower', function(data){
      console.log('send Data to Web');
      //socket.broadcast.emit('toWeb',{data: data});
      var keys;
      var muscleData="";
      keys = Object.keys(data);
      for(var i in keys){
          muscleData += data[keys[i].toString()];
      }
      console.log('MusclePower Data : '+muscleData);

      socket.broadcast.emit('toWeb',{data: muscleData});
   })

});
