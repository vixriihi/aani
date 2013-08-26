var room;
$(document).ready(function() {
    // Check that browser supports localStorage
    if (!localStorage) {
        sendMessage('danger', 'Your browser isn\'t supported!');
        return;
    }

    // Get personal key for this client
    var key = localStorage.getItem('client_key');
    if (key === null) {
        $.getJSON('/api/client/register', function(data) {
            key = data['key'];
            localStorage.setItem('client_key', key);
        });
    }

    // Join button listener
    $('#joinButton').click(function(event) {
        event.preventDefault();
        room = $('#roomKey').val();

        var url = '/api/room/' + room;
        $.post(url, {'key': key}, function(data) {
            if (data['result'] === 'success') {
                addRoom(room, data['name']);
                updateQuestion(room);
            }
        });
    });

    // Create answer button listener
    var timeout;
    var answerId;
    $('#view').on('click', '.answer', function(event) {
        clearTimeout(timeout);
        event.preventDefault();
        var selected = $(this);
        answerId = selected.attr('id');
        $('.answer').removeClass('active');
        selected.addClass('active');
        timeout = setTimeout(function() {
            $('.answer').removeClass('answer');
            clearTimeout(timeout);
            answerQuestion(room, answerId, key);
        }, 5000);
    });

    // TODO: create long polling system

    // Create list of rooms
    var rooms = getRooms();
    if (rooms === null) {
        $('#roomMenu').hide();
        return;
    }
    for (key in rooms) {
        $('#roomMenu > ul').append('<li><a href="#" onclick="updateQuestion(\'' + key + '\')">' + rooms[key] + '</a></li>');
    }



});

answerQuestion = function(roomId, answerID, key) {
    var url = '/api/room/' + roomId + '/answer';
    var data = {'key': key, 'answer': answerID};
    $.post(url, data, function(data) {
        if (data['result'] === 'success') {
            console.log('done JES');
        }
    });
}

sendMessage = function(level, message, closable) {
    if (typeof closable === "undefined") {
        closable = false;
    }
    var template = $('#messagesTpl').html();
    var data = {'level': level, 'msg': message, 'closable': closable};
    var html = Mustache.to_html(template, data);
    $('#messages').html(html);
}

updateQuestion = function(roomId) {
    room = roomId;
    var url = '/api/room/' + roomId + '/question';
    $.getJSON(url, function(data) {
        if (data['result'] === 'success') {
            var template = $('#voiceTpl').html();
            var html = Mustache.to_html(template, data);
            $('#view').html(html);
        }
    });
    return false;
}



addRoom = function(key, name) {
    var rooms = getRooms();
    if (rooms === null) {
        var rooms = {};
    }
    rooms[key] = name;
    localStorage.setItem('rooms', JSON.stringify(rooms));
}

getRooms = function() {
    var rooms = localStorage.getItem('rooms');
    if (rooms === null) {
        return null;
    }
    return JSON.parse(rooms);
}