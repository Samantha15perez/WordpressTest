!function(){"use strict";!function e(){if("loading"===document.readyState)return document.addEventListener("DOMContentLoaded",e);!function(o){for(var e=function(r){o[r].addEventListener("change",function(){var e=Number(o[r].value),t=Number(o[r].getAttribute("data-price")),n=o[r].parentNode.parentNode.nextElementSibling.querySelector("output");n.innerHTML=parseFloat(t*(e/100+1)).toFixed(2)})},t=0;t<o.length;t++)e(t)}(document.querySelectorAll('[name^="webcomic_commerce_prints_adjust"]'))}()}();