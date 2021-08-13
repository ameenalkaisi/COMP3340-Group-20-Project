'use strict';

window.onload = function() {
    // add functionality to deletion link so that admin has to confirm  before deletion
    for(let link of document.getElementsByTagName("article")) {
        link.onclick = function() {
            window.location = "post.php?postid=" + link.id;
        }
    }
}