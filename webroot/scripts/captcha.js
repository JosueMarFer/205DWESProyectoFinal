codUsuario = document.getElementById("codUsuario");
password = document.getElementById("password");
repetirPassword = document.getElementById("repetirPassword");
descUsuario = document.getElementById("descUsuario");
idioma = document.getElementById("idioma");

destinoArrastrable = document.querySelector(".resultado");
formulario = document.getElementById("formulario");
num1 = document.getElementById("num1");
num2 = document.getElementById("num2");
botonEnviar = document.getElementById("registrar");
captcha = document.getElementById("captcha");
formulario = document.getElementById("formulario");
pie = document.getElementById("pie");
sol1 = document.getElementById("sol1");
sol2 = document.getElementById("sol2");
sol3 = document.getElementById("sol3");

validarCodUsuario = /^[A-Za-z]{4,8}$/;
validarPassword = /^[a-zA-Z]{4,8}$/;
validarDescUsuario = /^[a-zA-Z ]{1,255}$/;


codUsuario.addEventListener("keyup", (e) => {
    if (validarCodUsuario.test(e.target.value)) {
        e.target.classList.add("correcto");
        e.target.classList.remove("error");
    } else {
        e.target.classList.remove("correcto");
        e.target.classList.add("error");
    }
});
codUsuario.addEventListener("blur", (e) => {
    if (validarCodUsuario.test(e.target.value)) {
    } else {
        let parrafo = document.createElement("p")
        parrafo.textContent = "El codigo deben ser de 4 a 8 letras";
        parrafo.classList.add('errorcampo');
        e.target.parentElement.appendChild(parrafo);
    }
});
codUsuario.addEventListener("focus", (e) => {
    if (contieneParrafos(e.target.parentElement)) {
        for (var item of e.target.parentElement.getElementsByTagName("p")) {
            e.target.parentElement.removeChild(item);
        }
    }
});
password.addEventListener("keyup", (e) => {
    if (validarPassword.test(e.target.value)) {
        e.target.classList.add("correcto");
        e.target.classList.remove("error");
    } else {
        e.target.classList.remove("correcto");
        e.target.classList.add("error");
    }
});
password.addEventListener("blur", (e) => {
    if (validarPassword.test(e.target.value)) {
    } else {
        let parrafo = document.createElement("p")
        parrafo.textContent = "El password deben ser de 4 a 8 letras";
        parrafo.classList.add('errorcampo');
        e.target.parentElement.appendChild(parrafo);
    }
});
password.addEventListener("focus", (e) => {
    if (contieneParrafos(e.target.parentElement)) {
        for (var item of e.target.parentElement.getElementsByTagName("p")) {
            e.target.parentElement.removeChild(item);
        }
    }
});
repetirPassword.addEventListener("keyup", (e) => {
    if (validarPassword.test(e.target.value) && e.target.value == password.value) {
        e.target.classList.add("correcto");
        e.target.classList.remove("error");
    } else {
        e.target.classList.remove("correcto");
        e.target.classList.add("error");
    }
});
repetirPassword.addEventListener("blur", (e) => {
    if (validarPassword.test(e.target.value)) {
        if (e.target.value == password.value) {
        } else {
            let parrafo = document.createElement("p")
            parrafo.textContent = "Los passwords deben coincidir";
            parrafo.classList.add('errorcampo');
            e.target.parentElement.appendChild(parrafo);
        }
    } else {
        let parrafo = document.createElement("p")
        parrafo.textContent = "El password deben ser de 4 a 8 letras";
        parrafo.classList.add('errorcampo');
        e.target.parentElement.appendChild(parrafo);
    }
});
repetirPassword.addEventListener("focus", (e) => {
    if (contieneParrafos(e.target.parentElement)) {
        for (var item of e.target.parentElement.getElementsByTagName("p")) {
            e.target.parentElement.removeChild(item);
        }
    }
});
descUsuario.addEventListener("keyup", (e) => {
    if (validarDescUsuario.test(e.target.value)) {
        e.target.classList.add("correcto");
        e.target.classList.remove("error");
    } else {
        e.target.classList.remove("correcto");
        e.target.classList.add("error");
    }
});
descUsuario.addEventListener("blur", (e) => {
    if (validarDescUsuario.test(e.target.value)) {
    } else {
        let parrafo = document.createElement("p")
        parrafo.textContent = "La descripcion debe ser de 1 a 255 caracteres";
        parrafo.classList.add('errorcampo');
        e.target.parentElement.appendChild(parrafo);
    }
});
descUsuario.addEventListener("focus", (e) => {
    if (contieneParrafos(e.target.parentElement)) {
        for (var item of e.target.parentElement.getElementsByTagName("p")) {
            e.target.parentElement.removeChild(item);
        }
    }
});
botonEnviar.addEventListener("click", (e) => {
    e.preventDefault();
    if (codUsuario.classList.contains("correcto") && password.classList.contains("correcto") && repetirPassword.classList.contains("correcto") && descUsuario.classList.contains("correcto")) {
        num1.textContent = parseInt(Math.random() * 10);
        num2.textContent = parseInt(Math.random() * 10);
        captcha.style.display = 'block';
        let numeroaleatorio = parseInt(Math.random() * 3)
        switch (numeroaleatorio) {
            case 0:
                sol1.textContent = parseInt(num1.textContent) + parseInt(num2.textContent);
                do {
                    sol2.textContent = parseInt(Math.random() * 19);
                    sol3.textContent = parseInt(Math.random() * 19);
                } while (sol2.textContent == sol1.textContent ||
                        sol3.textContent == sol1.textContent ||
                        sol2.textContent == sol3.textContent);
                var correcto = sol1;
                break;
            case 1:
                sol2.textContent = parseInt(num1.textContent) + parseInt(num2.textContent);
                do {
                    sol1.textContent = parseInt(Math.random() * 19);
                    sol3.textContent = parseInt(Math.random() * 19);
                } while (sol2.textContent == sol1.textContent ||
                        sol3.textContent == sol1.textContent ||
                        sol2.textContent == sol3.textContent);
                var correcto = sol2;
                break;
            case 2:
                sol3.textContent = parseInt(num1.textContent) + parseInt(num2.textContent);
                do {
                    sol1.textContent = parseInt(Math.random() * 19);
                    sol2.textContent = parseInt(Math.random() * 19);
                } while (sol2.textContent == sol1.textContent ||
                        sol3.textContent == sol1.textContent ||
                        sol2.textContent == sol3.textContent);
                var correcto = sol3;
                break;
        }
    } else {
        alert("Algun dato es incorrecto");
    }
});
let draggables = document.getElementsByClassName("opcaptcha");

for (let index = 0; index < draggables.length; index++) {
    draggables[index].setAttribute("draggable", "true");
    draggables[index].addEventListener("drag", (e) => {
        draggables[index].style.opacity = "0.5";
        arrastrable = e.target;
    });
    draggables[index].addEventListener("dragend", (e) => {
        draggables[index].style.opacity = "1";
        arrastrable = null;
    });
}

destinoArrastrable.addEventListener("dragenter", (e) => destinoArrastrable.style.backgroundColor = "yellow");
destinoArrastrable.addEventListener("dragleave", (e) => destinoArrastrable.style.backgroundColor = "transparent");
destinoArrastrable.addEventListener("dragover", (e) => e.preventDefault());
destinoArrastrable.addEventListener("drop", (e) => {
    if (parseInt(num1.textContent) + parseInt(num2.textContent) == arrastrable.textContent) {
        destinoArrastrable.innerHTML = "OK";
        destinoArrastrable.style.backgroundColor = "green"
        funcionEnhorabuena();
    } else {
        destinoArrastrable.innerHTML = "NO";
        destinoArrastrable.style.backgroundColor = "red"
        num1.textContent = parseInt(Math.random() * 10);
        num2.textContent = parseInt(Math.random() * 10);
        captcha.style.display = 'block';
        let numeroaleatorio = parseInt(Math.random() * 3)
        switch (numeroaleatorio) {
            case 0:
                sol1.textContent = parseInt(num1.textContent) + parseInt(num2.textContent);
                do {
                    sol2.textContent = parseInt(Math.random() * 19);
                    sol3.textContent = parseInt(Math.random() * 19);
                } while (sol2.textContent == sol1.textContent ||
                        sol3.textContent == sol1.textContent ||
                        sol2.textContent == sol3.textContent);
                var correcto = sol1;
                break;
            case 1:
                sol2.textContent = parseInt(num1.textContent) + parseInt(num2.textContent);
                do {
                    sol1.textContent = parseInt(Math.random() * 19);
                    sol3.textContent = parseInt(Math.random() * 19);
                } while (sol2.textContent == sol1.textContent ||
                        sol3.textContent == sol1.textContent ||
                        sol2.textContent == sol3.textContent);
                var correcto = sol2;
                break;
            case 2:
                sol3.textContent = parseInt(num1.textContent) + parseInt(num2.textContent);
                do {
                    sol1.textContent = parseInt(Math.random() * 19);
                    sol2.textContent = parseInt(Math.random() * 19);
                } while (sol2.textContent == sol1.textContent ||
                        sol3.textContent == sol1.textContent ||
                        sol2.textContent == sol3.textContent);
                var correcto = sol3;
                break;
        }
    }
});
function funcionEnhorabuena() {
    let enhorabuena = document.createElement("p");
    enhorabuena.textContent = "ENHORABUENA, NO ERES UN ROBOT";
    captcha.innerHTML = "";
    captcha.appendChild(enhorabuena);
    enviarCaptcha = document.createElement("input");
    enviarCaptcha.setAttribute("name", "registro");
    enviarCaptcha.style.display = "none";
    formulario.appendChild(enviarCaptcha);
    let temp = setTimeout(() => formulario.submit(), 2000);
}
;

function contieneParrafos(elemento) {
    if (elemento.getElementsByTagName("p").length > 0) {
        return true;
    } else {
        return false;
    }
}
;