!function(){"use strict";!function e(){if("loading"===document.readyState)return document.addEventListener("DOMContentLoaded",e);function n(e){for(var t=0;t<e.length;t++)if(e[t].addedNodes.length)for(var n=0;n<e[t].addedNodes.length;n++){var o=e[t].addedNodes[n];o&&o.tagName&&o.classList.contains("hentry")&&o.querySelector(".column-webcomic_transcripts").classList.add("column-comments")}}!function(e){new MutationObserver(n).observe(document.querySelector("#the-list"),{childList:!0});for(var t=0;t<e.length;t++)e[t].classList.add("column-comments")}(document.querySelectorAll(".column-webcomic_transcripts"))}()}();
