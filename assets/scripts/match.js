const tinder = document.getElementById('tinder');
const interestId = document.getElementById('interestId').innerHTML;

// create a simple instance
// by default, it only adds horizontal recognizers
const mc = new Hammer(tinder);

function ajaxPost(url, data) {
    let req = new XMLHttpRequest();
    req.open("POST", url);
    console.log('zgeg')
    req.send(JSON.stringify(data));

}

// listen to events...
mc.on("panleft", function () {
    ajaxPost('/' + interestId + '/like/project-ajax', {like: false});
});

mc.on("panright", function () {
    ajaxPost('/' + interestId + '/like/project-ajax', {like: true});
});

