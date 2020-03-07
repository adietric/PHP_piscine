function del_everything() {

    var cookies = document.cookie.split(";");
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}

function del_cookie(id_nb) {

    var cookies = document.cookie.split("<a></a>");
    var mine = "";
    if (cookies.length < 3) {
        del_everything();
    } else {
        for (var i = 0; i < cookies.length - 1; i++) {
            var n = cookies[i].search('<div id="' + id_nb + '" class=');
            if (n == -1) {
                mine += cookies[i] + '<a></a>';
            }
        }
        document.cookie = mine;
    }
}

var cookies = document.cookie.split("<a></a>");
for (var i = 0; i < cookies.length - 1; i++) {
    var cookie = cookies[i];
    re_do_old_to_do(cookie);
}

var id_nb;
if (cookies.length)
    id_nb = cookies.length - 1;
else
    id_nb = 0;

function do_a_to_do() {

    var text
    var current_div;
    var tmp = document.cookie;
    if (text = window.prompt()) {
        if (text != "") {
            current_div = document.getElementById('ft_list');
            current_div.insertAdjacentHTML('afterbegin', '<div id="' + id_nb + '" class="new_div" onclick="del_it(' + id_nb + ');">' + text + '</div><a></a>');
            document.cookie = '<div id="' + id_nb + '" class="new_div" onclick="del_it(' + id_nb + ');">' + text + '</div><a></a>;expires=Sun, 4 Oct 2020 12:00:00 UTC';
            document.cookie += tmp;
            id_nb = id_nb + 1;
        }
    }
}

function del_it(id_nb) {

    if (window.confirm("Voulez vous vraiment détruire ce to-do ?")) {
        current_div = document.getElementById(id_nb);
        current_div.parentNode.removeChild(current_div);
        del_cookie(id_nb);
    }
}

function re_do_old_to_do(cookie) {

    var current_div;
    current_div = document.getElementById('ft_list');
    current_div.insertAdjacentHTML('beforeend', cookie + "<a></a>");
    document.cookie = document.getElementById('ft_list').innerHTML + ';expires=Sun, 4 Oct 2020 12:00:00 UTC';
}