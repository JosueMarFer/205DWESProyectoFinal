function reloj() {
  let reloj = document.createElement("div");
  reloj.setAttribute("id", "reloj");
  raiz = document.getElementsByClassName("relojJS")[0];
  raiz.appendChild(reloj);
  let aImagenes = [
    "./webroot/images/reloj/zero.png",
    "./webroot/images/reloj/one.png",
    "./webroot/images/reloj/two.png",
    "./webroot/images/reloj/three.png",
    "./webroot/images/reloj/four.png",
    "./webroot/images/reloj/five.png",
    "./webroot/images/reloj/six.png",
    "./webroot/images/reloj/seven.png",
    "./webroot/images/reloj/eight.png",
    "./webroot/images/reloj/nine.png",
    "./webroot/images/reloj/hours.png",
    "./webroot/images/reloj/mins.png",
    "./webroot/images/reloj/seconds.png",
  ];
  let hora1 = document.createElement("img");
  reloj.appendChild(hora1);
  let hora2 = document.createElement("img");
  reloj.appendChild(hora2);
  let hours = document.createElement("img");
  reloj.appendChild(hours);
  let min1 = document.createElement("img");
  reloj.appendChild(min1);
  let min2 = document.createElement("img");
  reloj.appendChild(min2);
  let mins = document.createElement("img");
  reloj.appendChild(mins);
  let sec1 = document.createElement("img");
  reloj.appendChild(sec1);
  let sec2 = document.createElement("img");
  reloj.appendChild(sec2);
  let seconds = document.createElement("img");
  reloj.appendChild(seconds);
  let intervalo = setInterval(
          () => {
    let fechaInicio = new Date();
    hora1.setAttribute("src", aImagenes[parseInt(fechaInicio.getHours() / 10)]);
    hora2.setAttribute("src", aImagenes[parseInt(fechaInicio.getHours() % 10)]);
    min1.setAttribute("src", aImagenes[parseInt(fechaInicio.getMinutes() / 10)]);
    min2.setAttribute("src", aImagenes[parseInt(fechaInicio.getMinutes() % 10)]);
    sec1.setAttribute("src", aImagenes[parseInt(fechaInicio.getSeconds() / 10)]);
    sec2.setAttribute("src", aImagenes[parseInt(fechaInicio.getSeconds() % 10)]);
    hours.setAttribute("src", aImagenes[10]);
    hours.setAttribute("style", "width:1rem; height:1rem");
    mins.setAttribute("src", aImagenes[11]);
    mins.setAttribute("style", "width:1rem; height:1rem");
    seconds.setAttribute("src", aImagenes[12]);
    seconds.setAttribute("style", "width:1rem; height:1rem");
  }, 1000);
}
reloj();