'use strict';

window.onload = function() {
    // add functionality to deletion link so that admin has to confirm  before deletion
    for(let link of document.querySelectorAll("a[href^=\"delete_post\"]")) {
        link.onclick = function() {
            if(confirm("Are you sure you want to delete this user?")) {
                window.location = link.href;
            } else return false; // return false to stop event propagation
        }
    }
}