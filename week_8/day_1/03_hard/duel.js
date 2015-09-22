/**
 * Andrew Jackson once killed attorney Charles Dickinson in a duel,
 * and we're going to use that to our advantage here to create 
 * a much less gruesome version of the duel on this webpage. 
 *
 * I mean if you want to make it gruesome maybe do that on your own time.
 *
 * Anyway, I have given you a basic HTML structure for a 
 * DUEL OF FORM BUTTONS between these two dead guys, and you
 * should make the page do what it needs to do, using your knowledge
 * of JS, HTML, CSS, and... gun dueling.
 *
 * Here's what this 'game' should do:
 * 
 * 1. Clicking a "FIRE" button should fire a shot at the other dueler.
 *   - shots have a random chance of succeeding or failing
 *   - number of shots fired should increase every click on the "FIRE" button
 *   - number of hits obviously only increases when the shot is successful
 *   - both duelers are invincible (for now!)
 * 
 * 2. Clicking the "RESET" button resets all the shot and hit counters and
 * adds 1 to the num resets
 *
 * 3. Any time you click any of the buttons on the page, change the background
 * color of the page to a completely random color. (Google will be your friend for
 * figuring out how to do that. The random color bit, that is.)
 *
 * OPTIONAL STUFF:
 * - add photos of the two duelers below their name (google search that stuff)
 * - play a sound when someone clicks the "FIRE" button. I added a "shot.wav" 
 *   so you can do this; you'll need to read about the <audio> element
 *   and how to use it in JS
 * - ???
 * - Profit!
 */
 
function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}
 
var andrewJacksonFire = document.getElementById("andrew-shoot");
var charlesDickinsonFire = document.getElementById("charles-shoot");
var resetButtom = document.getElementById("reset");
 
 
andrewJacksonFire.onclick = function(){
     
    var numShots = document.getElementById("andrew-numshots");
    var numHits = document.getElementById("andrew-numhits");
    var doesItHit = getRandomInt(0, 20);
     
    numShots.innerHTML = parseInt(numShots.innerHTML) + 1;
    if(doesItHit >= 10){
        numHits.innerHTML = parseInt(numHits.innerHTML) + 1;
    }
    
    document.getElementById("audio-shot").play();
};
 
charlesDickinsonFire.onclick = function(){
    var numShots = document.getElementById("charles-numshots");
    var numHits = document.getElementById("charles-numhits");
    var doesItHit = getRandomInt(0, 20);
     
    numShots.innerHTML = parseInt(numShots.innerHTML) + 1;
    if(doesItHit >= 10){
        numHits.innerHTML = parseInt(numHits.innerHTML) + 1;
    }
    
    document.getElementById("audio-shot").play();
};

resetButtom.onclick = function(){
    if(
        parseInt(document.getElementById("charles-numhits").innerHTML) === 0 &&
        parseInt(document.getElementById("charles-numshots").innerHTML) === 0 &&
        parseInt(document.getElementById("andrew-numshots").innerHTML) === 0 &&
        parseInt(document.getElementById("andrew-numhits").innerHTML) === 0
    ){
        alert("You must fire one shot before restarting!");  
    } else {
    
        document.getElementById("charles-numhits").innerHTML = 0; 
        document.getElementById("charles-numshots").innerHTML = 0;
        document.getElementById("andrew-numshots").innerHTML = 0;
        document.getElementById("andrew-numhits").innerHTML = 0;
        document.getElementById("num-resets").innerHTML = parseInt(document.getElementById("num-resets").innerHTML) + 1;
    }
        
    };