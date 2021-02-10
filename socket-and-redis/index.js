var server = require('http').Server();

var io = require('socket.io')(server);

var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('laravel_database_test-channel');

redis.on('message', function (channel, message) {
    message = JSON.parse(message);

    io.emit(channel + ':' + message.event, message.data); //laravel_database_test-channel:UserSignedUp

    console.log(channel, message);
});

server.listen(3000);
