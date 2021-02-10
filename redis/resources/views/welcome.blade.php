<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>New Users</h1>

    <ul>
        <li v-repeat="user: users">@{{ user }}</li>
    </ul>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/0.12.15/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.1/socket.io.min.js"></script>
    <script>
        // var socket = io('http://192.168.20.71:3000/');
        var socket = io('http://127.0.0.1:3000/');

        new Vue({
            el: 'body',

            data: {
                users: []
            },

            ready: function () {
                socket.on('test-channel:UserSignedUp', function(data) {
                    this.users.push(data.username);
                }.bind(this));
            }
        });
    </script>
</body>
</html>
