document.addEventListener("DOMContentLoaded", function() {
    const height = document.querySelector('#offer-style').offsetHeight;
    const height2 = document.querySelector('#offer-style2').offsetHeight;
    let numb = document.querySelector('#offer-style').children.length;
    page2 = document.getElementById('page2');
    page3 = document.getElementById('page3');

    var element = document.querySelector('.offer');
    var element2 = document.querySelector('.offer2');
    var lastChildElement = element.lastElementChild;
    var lastChildElement2 = element2.lastElementChild;
    var previousElement = lastChildElement.previousElementSibling;
    var newParentElement = document.querySelector(".relocate2");
    var newParentElement2 = document.querySelector("#relocate3");
    if (element.offsetHeight < element.scrollHeight ||
        element.offsetWidth < element.scrollWidth) {
            if (height > "910"){ // grotte van de div is langer dan 1 pagina
                newParentElement.appendChild(lastChildElement);
                page2.innerHTML = '<?php page2 = "yes"; echo $page2 ?>';
            }
            else{
        // newParentElement.appendChild(twoElementsBeforeLastChild);
        // newParentElement.appendChild(previousElement);
        // newParentElement.appendChild(lastChildElement);
            }
    } else {
        // Het child element heeft geen overflow in het parent element
        // Behandel de situatie op de juiste manier
    }
    if (element2.offsetHeight < element2.scrollHeight ||
        element2.offsetWidth < element2.scrollWidth) {
            if (height2 > "910"){ // grotte van de div is langer dan 1 pagina
                newParentElement2.appendChild(lastChildElement2);
            }
            else{
            }
    } else {

        if (height2 <  "305"){ // grotte van de div is langer dan 1 pagina
            page2.style.display = "none";
        }
        else{


        }

        if (height2 <  "910"){ // grotte van de div is langer dan 1 pagina
            page3.style.display = "none";
        }
        else{


        }

    }
});
