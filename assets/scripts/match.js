const tinder = document.getElementById('tinder');
const interestId = document.getElementById('interestId').innerHTML;

// create a simple instance
// by default, it only adds horizontal recognizers
const mc = new Hammer(tinder);

// listen to events...
mc.on("panleft", function(ev) {
    window.location.href = '/' + interestId + '/dislike/project';
});

mc.on("panright", function(ev) {
    window.location.href = '/' + interestId + '/like/project';
});

