let titleAnim = document.getElementById("titleAnim"),
    menu = document.getElementById("menu"),
    menuModal = document.getElementById("modal-menu"),
    collection = document.querySelectorAll(".item"),
    collectionProducts = document.querySelectorAll(".item-product"),
    desktop = window.matchMedia("(min-width:850px)"),
    closeMenu = document.querySelector(".close-menu"),
    burgerMenu = document.querySelector(".contLigne"),
    regexPassword = /^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){6,}$/,
    regexEngraving = /^[a-zA-Z]{0,3}$/,
    labels = document.getElementsByTagName("label"),
    error = document.createElement("p");
;


[...collection].forEach(element => {
    element.onmouseover = function () {
        this.querySelector("img").classList.add('coll-img-hov');
    }
    element.onmouseleave = function () {
        this.querySelector("img").classList.remove('coll-img-hov');
    }
});


// burger menu

function burgerMenuTrigger() {

}

burgerMenu.addEventListener('click', function () {
    menuModal.classList.toggle("hide");
    setTimeout(
        function () {
            burgerMenu.classList.toggle("active");
            closeMenu.classList.toggle("active");
            menu.classList.toggle("nav-show");
            menu.classList.toggle("nav-hide");
        }, 1
    )
})

window.ontouchend = function (event) {
    if (event.target === menuModal) {
        burgerMenu.classList.toggle("active");
        closeMenu.classList.toggle("active");
        menu.classList.toggle("nav-show");
        menu.classList.toggle("nav-hide");
        setTimeout(
            function () {
                menuModal.classList.toggle("hide");
            }, 10
        )

    }
}

function showNav() {
    menu.style.top = "10vh";
    menu.style.transition = "all 250ms ease-in-out";
}

function hideNav() {
    menu.style.top = "0vh";
    menu.style.transition = "all 250ms ease-in-out";
}

// Script for desktop


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


    // Collections of products

    collectionProducts.forEach(product => {
        product.addEventListener("mouseenter", function () {
            product.querySelector(".product-infos").style.opacity = 1;
            product.querySelector(".product-pic").style.filter = "grayscale(100%) opacity(50%) blur(1px)";
        })
        product.addEventListener("mouseleave", function () {
            product.querySelector(".product-infos").style.opacity = 0;
            product.querySelector(".product-pic").style.filter = "";
        })

    });

    // Animation Formularies

    if (labels != null) {
        [...labels].forEach(label => {
            let input = label.children[0];
            if (input != null) {
                if (input.value !== "") {
                    label.style.fontSize = ".8rem";
                    input.style.height = "5vh";
                }
                input.addEventListener("focus", function () {
                    label.style.fontSize = ".8rem";
                    input.style.height = "5vh";
                })
                input.addEventListener("blur", function () {
                    if (input.value === "") {
                        label.style.fontSize = "1rem";
                        input.style.height = "0vh";
                    }
                })
            }
        })
    }


}


// Slideshow images dans fiche produits

let picSecondary = document.querySelectorAll(".pic-secondary"),
    picPrimary = document.querySelector("#pic-primary");

picSecondary.forEach(picture => {
    picture.onmouseenter = function () {
        picPrimary.src = picture.src;
        picture.classList.add("image-selected");
    }
    picture.onmouseleave = function () {
        console.log("ok");
        picture.classList.remove("image-selected");
    }
})

// Vérif Gravure

let gravure = document.getElementById("engraving"),
    gravureDiv = document.getElementById("div-engraving");
if (gravure != null) {
    let error = document.createElement("p",)
    gravure.addEventListener("keyup", function () {
        if (!gravure.value.match(regexEngraving)) {
            gravure.style.border = "2px red";
            gravure.style.borderStyle = "none none solid none";
            gravureDiv.append(error);
            error.classList.add("errors");
            error.innerText = "La gravure est limitée à 3 lettres";
        } else {
            gravure.style.border = "2px green";
            gravure.style.borderStyle = "none none solid none";
            error.innerText = "";
        }
    })
}


// Verif password en temps réel

let password = document.getElementById("password"),
    passwordConfirm = document.getElementById("password-confirm"),
    errorPassword = document.getElementById("error-password");
errorPasswordConfirm = document.getElementById("error-password-confirm")
if (password != null) {
    password.onblur = function () {
        if (password.value === "") {
            password.style.border = "2px red";
            password.style.borderStyle = "none none solid none";
            errorPassword.innerText = "Veuillez reinseigner un mot de passe";
        } else if (!password.value.match(regexPassword)) {
            password.style.border = "2px red";
            password.style.borderStyle = "none none solid none";
            errorPassword.innerHTML = "Veuillez utilisez au moins : <br/> • 8 caractères   • Une majuscule <br/>  • Un chiffre <br/>  • Un signe de ponctuation";
        } else {
            password.style.border = "2px green";
            password.style.borderStyle = "none none solid none";
            errorPassword.innerHTML = "";
        }
    }
    if (passwordConfirm !== null)
        passwordConfirm.onblur = function () {
            if (passwordConfirm.value !== password.value) {
                password.style.border = "2px red";
                password.style.borderStyle = "none none solid none";
                passwordConfirm.style.border = "2px red";
                passwordConfirm.style.borderStyle = "none none solid none";
                errorPasswordConfirm.innerHTML = "Les mots de passe ne correspondent pas";
            } else if ((passwordConfirm.value && password.value) === "") {
                passwordConfirm.style.border = "2px red";
                passwordConfirm.style.borderStyle = "none none solid none";
                errorPasswordConfirm.innerHTML = "Veuillez reinseigner un mot de passe";
            } else if (passwordConfirm.value === password.value && passwordConfirm.value.match(regexPassword)) {
                password.style.border = "2px green";
                password.style.borderStyle = "none none solid none";
                passwordConfirm.style.border = "2px green";
                passwordConfirm.style.borderStyle = "none none solid none";
                errorPasswordConfirm.innerHTML = ""
            }
        }
}


// AJAX verif


let usernameInput = document.getElementById("username");
if (usernameInput != null) {
    usernameInput.addEventListener("keyup", async function () {
        let dataSearch = {
            username: usernameInput.value
        };
        if (dataSearch.username !== "") {
            let response = await fetch("/controllers/username-check-controller.php?username=" + dataSearch.username, {
                method: "GET",
                headers: {
                    "Content-type": "application/json"
                }
            });
            let result = await response.json();
            let validationUsername = document.getElementById("validationUsername");
            let submitButton = document.getElementById("submitButton");
            if (result !== "Valide") {
                usernameInput.style.border = "2px red";
                usernameInput.style.borderStyle = "none none solid none";
                validationUsername.classList.add("errors");
                validationUsername.innerText = "Nom utilisateur non disponible";
                submitButton.setAttribute("disabled", "");
            } else if (result === "Valide") {
                usernameInput.style.border = "2px green";
                usernameInput.style.borderStyle = "none none solid none";
                submitButton.removeAttribute("disabled");
            } else {
                validationUsername.innerText = "";
            }
        }
    })
}

