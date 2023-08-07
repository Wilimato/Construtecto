//navigation

document.addEventListener("DOMContentLoaded", function () {
    console.log("DOMContentLoaded event fired!");
    const links = document.querySelectorAll("nav a");
    const currentLocation = window.location.pathname.toLowerCase();

    links.forEach((link) => {
    if (link.getAttribute("href") === currentLocation) {
        link.classList.add("active");
    }
    });
});



document.addEventListener("DOMContentLoaded", function () {
  eventListeners();

  darkMode();
});

//Función modo oscuro

function darkMode() {
  const prefiereDarkMode = window.matchMedia("(prefers-color-scheme: dark)");

  //console.log(prefiereDarkMode.matches);

  if (prefiereDarkMode.matches) {
    document.body.classList.add("dark-mode");
  } else {
    document.body.classList.remove("dark-mode");
  }

  prefiereDarkMode.addEventListener("change", function () {
    if (prefiereDarkMode.matches) {
      document.body.classList.add("dark-mode");
    } else {
      document.body.classList.remove("dark-mode");
    }
  });

  const botonDarkMode = document.querySelector(".moon-dark");
  botonDarkMode.addEventListener("click", function () {
    document.body.classList.toggle("dark-mode");
  });
}

function eventListeners() {
  const mobileMenu = document.querySelector(".mobile-menu");
  mobileMenu.addEventListener("click", navegacionResponsive);

  //muestra campos condicionales

  const metodoContacto = document.querySelectorAll(
    'input[name="contacto[contacto]"]'
  );

  metodoContacto.forEach((metodo) =>
    metodo.addEventListener("click", mostrarMetodosContacto)
  );

  //metodoContacto.addEventListener('click', mostrarMetodosContacto);
}

//Mostrar navegación móvil

function navegacionResponsive() {
  const navegacion = document.querySelector(".navegacion");

  if (navegacion.classList.contains("mostrar")) {
    navegacion.classList.remove("mostrar");
  } else {
    navegacion.classList.add("mostrar");
  }

  //navegacion.classList.toggle("mostrar"); misma función de if declarado
}

function mostrarMetodosContacto(e) {
  const contactoDiv = document.getElementById("contacto");
  if (e.target.value === "telefono") {
    contactoDiv.innerHTML = ` 
        <label for="telefono">Número de Teléfono</label>
        <input type="tel" placeholder="Tu Teléfono" id="telefono" name="contacto[telefono]">
        <label>Elige la fecha y la hora para la llamada</label>

        <label for="fecha">Fecha</label>
        <input type="date" id="fecha" name="contacto[fecha]">

        <label for="hora">Hora</label>
        <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        `;
  } else if (e.target.value === "email") {
    contactoDiv.innerHTML = `
        <label for="email">E-mail</label>
        <input type="email" placeholder="Tu E-mail" id="email" name="contacto[email]">
        `;
  }
}
//Funciones Slider
const sliderContainer = document.querySelector(".slider-container");
const slideRight = document.querySelector(".right-slide");
const slideLeft = document.querySelector(".left-slide");
const upButton = document.querySelector(".up-button");
const downButton = document.querySelector(".down-button");
const slidesLength = slideRight.querySelectorAll("div").length;

let activeSlideIndex = 0;
let intervalId; // Variable para almacenar el ID del intervalo

slideLeft.style.top = `-${(slidesLength - 1) * 600}px`;

upButton.addEventListener("click", () => {
  stopSlider(); // Detener el slider al hacer clic en el botón
  changeSlide("up");
});

downButton.addEventListener("click", () => {
  stopSlider(); // Detener el slider al hacer clic en el botón
  changeSlide("down");
});

// Iniciar el slider automáticamente
startSlider();

function startSlider() {
  intervalId = setInterval(() => {
    changeSlide("up");
  }, 3000); // Cambiar de diapositiva cada 2 segundos (ajusta el intervalo según tus necesidades)
}

function stopSlider() {
  clearInterval(intervalId); // Limpiar el intervalo para detener el slider
}

function changeSlide(direction) {
  const sliderHeight = sliderContainer.clientHeight;
  if (direction === "up") {
    activeSlideIndex++;
    if (activeSlideIndex > slidesLength - 1) {
      activeSlideIndex = 0;
    }
  } else if (direction === "down") {
    activeSlideIndex--;
    if (activeSlideIndex < 0) {
      activeSlideIndex = slidesLength - 1;
    }
  }

  slideRight.style.transform = `translateY(-${
    activeSlideIndex * sliderHeight
  }px)`;
  slideLeft.style.transform = `translateY(${
    activeSlideIndex * sliderHeight
  }px)`;
}

//Slider Swiper

var swiper = new Swiper(".slide-content", {
  slidesPerView: 1,
  spaceBetween: 20,
  loop: true,
  speed: 1000,
  fadeEffect: {
    crossFade: true,
  },
  grabCursor: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    520: {
      slidesPerView: 2,
    },
    950: {
      slidesPerView: 2,
    },
  },
  autoplay: {
    delay: 2000,
  },
});

//slider proveedores

const carrusel = document.querySelector(".carrusel-items");

carrusel.innerHTML += carrusel.innerHTML;
carrusel.innerHTML += carrusel.innerHTML;

let maxScrollLeft = carrusel.scrollWidth - carrusel.clientWidth;
let intervalo = null;
let step = 1;
const start = () => {
  intervalo = setInterval(function () {
    carrusel.scrollLeft = carrusel.scrollLeft + step;
    if (carrusel.scrollLeft === maxScrollLeft) {
      step = step * -1;
    } else if (carrusel.scrollLeft === 0) {
      step = step * -1;
    }
  }, 10);
};

const stop = () => {
  clearInterval(intervalo);
};

carrusel.addEventListener("mouseover", () => {
  stop();
});

carrusel.addEventListener("mouseout", () => {
  start();
});

start();

