const { concat } = require("lodash");

document.addEventListener("DOMContentLoaded", function() {
    var button = document.querySelector("button");
    button.addEventListener("click", function() {
        alert("Hello!");
    });
    var name = prompt("What's your name?!");
    var heading = document.querySelector("h2");
    heading.innerText = concat("Hello, ", heading);
});
