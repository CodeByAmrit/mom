
var aAudio = new Audio('sound/click2.mp3');
var bAudio = new Audio('sound/click3.mp3');
function myAudioFunction(letter) {
    if (letter == 'a') {
        aAudio.play();
    } else if (letter == 'b') {
        bAudio.play();
    }
}
function showDivSignup() {
    document.getElementById('login-container').style.display = "none";
    document.getElementById('signup-container').style.display = "block";
 }
function showDivLogin() {
    document.getElementById('login-container').style.display = "block";
    document.getElementById('signup-container').style.display = "none";
 }