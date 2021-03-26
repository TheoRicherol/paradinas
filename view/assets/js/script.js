let titleAnim = document.getElementById("titleAnim"),
    menu = document.getElementById("menu"),
    collection = document.querySelectorAll(".item"),
    collectionProducts = document.querySelectorAll(".item-product"),
    desktop = window.matchMedia("(min-width:850px)"),
    closeMenu = document.querySelector(".close-menu"),
    burgerMenu = document.querySelector(".contLigne"),
    popupToggle = document.getElementById("icon-popup"),
    popupUser = document.getElementById("popup-user"),
    regexPassword = /^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){6,}$/;

[...collection].forEach(element => {
    element.onmouseover = function () {
        this.querySelector("img").classList.add('coll-img-hov');
    }
    element.onmouseleave = function () {
        this.querySelector("img").classList.remove('coll-img-hov');
    }
});

// burger menu

burgerMenu.addEventListener('click', function () {
    burgerMenu.classList.toggle("active");
    closeMenu.classList.toggle("active");
    menu.classList.toggle("nav-show");
    menu.classList.toggle("nav-hide");
    menu.style.transition("all .5s ease");
})


function showNav() {
    menu.style.top = "10vh";
    menu.style.transition = "all 250ms ease-in-out";
}

function hideNav() {
    menu.style.top = "0vh";
    menu.style.transition = "all 250ms ease-in-out";
}

// Script pour responsive


if (desktop.matches) {
    window.onload = function () {
        menu.style.top = "10vh";
    }

    window.onscroll = function () {
        if (window.scrollY <= 1) {
            showNav();
        } else {
            hideNav();
        }
    }

    titleAnim.addEventListener("mouseenter", function () {
        if (window.scrollY >= 1) {
            showNav();
        }
    });

    titleAnim.addEventListener("mouseleave", function () {
        if (window.scrollY >= 1) {
            hideNav();
        }
    });

    popupToggle.addEventListener("click", function () {
        if (popupUser.style.display == "none") {
            popupUser.style.display = "block";
        } else if (popupUser.style.display == "block") {
            popupUser.style.display = "none";
        }
    });

    popupToggle.addEventListener("mouseenter", function () {
        popupUser.style.display = "block";
        setTimeout(function () {
            popupUser.style.opacity = "1";
        }, 0)
    });

    popupToggle.addEventListener("mouseleave", function () {
        popupUser.style.opacity = "0";
        setTimeout(function () {
            popupUser.style.display = "none";
        }, 0)
    });

    // Collections de produits 

    collectionProducts.forEach(product => {
        product.addEventListener("mouseenter", function () {
            product.querySelector(".product-infos").style.opacity = 1;
            product.querySelector(".product-pic").style.filter = "grayscale(100%) opacity(50%) blur(1px)";
        })
        product.addEventListener("mouseleave", function () {
            product.querySelector(".product-infos").style.opacity = 0;
            product.querySelector(".product-pic").style.filter = "";
        })

    })

} else {
    popupToggle.addEventListener("touchstart", function (evt) {
        evt.preventDefault();
        if (popupUser.style.opacity == 0) {
            popupUser.style.opacity = 1;
            popupUser.style.display = "block";
        } else {
            popupUser.style.opacity = 0;
            popupUser.style.display = "none";
        }
    })
}


// Slideshow images dans fiche produits

let picSecondary = document.querySelectorAll(".pic-secondary"),
    picPrimary = document.querySelector("#pic-primary");

picSecondary.forEach(picture => {
    if (picture.src == picSecondary.src) {
        picture.classList.toggle("images-selected");
    }
    picture.onclick = function () {
        picPrimary.src = picture.src;

    }
})

// Verif password en temps réel

let password = document.getElementById("password"),
    passwordConfirm = document.getElementById("password-confirm"),
    divpwd = document.getElementById("div-password");
if (password != null) {

    password.onkeyup = function () {
        if (password.value == "") {

        } else if (!password.value.match(regexPassword)) {
            console.log("ok");
            password.style.border = "2px red";
            password.style.borderStyle = "none none solid none";
        } else {
            password.style.border = "2px green";
            password.style.borderStyle = "none none solid none";
        }
    }

    passwordConfirm.onblur = function () {
        if (passwordConfirm.value != password.value) {
            password.style.border = "2px red";
            password.style.borderStyle = "none none solid none";
            passwordConfirm.style.border = "2px red";
            passwordConfirm.style.borderStyle = "none none solid none";
        } else if (passwordConfirm.value === password.value) {
            password.style.border = "2px green";
            password.style.borderStyle = "none none solid none";
            passwordConfirm.style.border = "2px green";
            passwordConfirm.style.borderStyle = "none none solid none";
        }
    }
}


// AJAX verif


let usernameInput = document.getElementById("username");
if (usernameInput != null) {
    usernameInput.addEventListener("blur", async function () {
        let dataSearch = {
            username: usernameInput.value
        };
        if (dataSearch.username != "") {
            let response = await fetch("/controllers/username-check-controller.php?username=" + dataSearch.username, {
                method: "GET",
                headers: {
                    "Content-type": "application/json"
                }
            });
            let result = await response.json();
            console.log(result);
            let validationUsername = document.getElementById("validationUsername");
            let submitButton = document.getElementById("submitButton");
            if (result != "Valide") {
                validationUsername.innerText = "Nom utilisateur non disponible";
                submitButton.setAttribute("disabled", "");
            } else if (result == "Valide") {
                validationUsername.innerText = "Valide";
                submitButton.removeAttribute("disabled");
            } else {
                validationUsername.innerText = "";
            }
        }
    })
}

// Ajax

// var httpRequest = new XMLHttpRequest();
//
// httpRequest.onreadystatechange = function () {
//     if (httpRequest.readyState === 4) {
//         alert("ok");
//     }
// }
//
// httpRequest.open('GET', 'https://atelierp.local:8890', true);
// httpRequest.send();