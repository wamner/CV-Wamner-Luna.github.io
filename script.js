// toggle icon navbar
let menuIcon = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menuIcon.onclick = () => {
    menuIcon.classList.toggle('bx-x');
    navbar.classList.toggle('active');
}


// scroll sections
let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header nav a');

window.onscroll = () => {
    sections.forEach(sec => {
        let top = window.scrollY;
        let offset = sec.offsetTop - 100;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');

        if(top >= offset && top < offset + height){
            //active navbar links
            navLinks.forEach(links => {
                links.classList.remove('active');
                document.querySelector('header nav a[href*=' + id +']').classList.add('active');

            });
           // active sections for animation for animation on scroll
            sec.classList.add('show-animate');
        }
        //if want to use animation that repeats on scroll use this
        else{
            sec.classList.remove('show-animate'); 
        }

    });


    // sticky header

    let header = document.querySelector('header');

    header.classList.toggle('sticky', window.scrollY > 100);

    //remove toggle icon and navbar when click navbar links(scroll)

      menuIcon.classList.remove('bx-x');
      navbar.classList.remove('active');


    // animation footer on scroll
      let footer = document.querySelector('footer');

      footer.classList.toggle('show-animate', this.innerHeight + this.scrollY >= document.scrollingElement.
      scrollHeight);

}




/*animacion progress*/ 
// Esperar a que el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", () => {
    // Seleccionar todas las barras de progreso
    const progressBars = document.querySelectorAll(".progress .bar span");

    // Función para activar la animación de las barras
    const fillBars = (bars) => {
        bars.forEach((bar, index) => {
            // Obtener el porcentaje desde el texto (<h3>)
            const percentage = bar.closest(".progress").querySelector("h3 span").textContent;

            // Configurar el ancho objetivo como una variable CSS personalizada
            bar.style.setProperty("--target-width", percentage);

            // Aplicar el porcentaje como ancho después de un breve retraso
            setTimeout(() => {
                bar.style.width = percentage;
            }, 500 + index * 200); // Añade un retraso entre barras
        });
    };

    // Llenar las barras al cargar la página
    fillBars(progressBars);

    // Añadir evento de hover para reactivar la animación
    const skillColumns = document.querySelectorAll(".skills-column");
    skillColumns.forEach((column) => {
        column.addEventListener("mouseenter", () => {
            fillBars(column.querySelectorAll(".progress .bar span"));
        });
    });
});





//iconos

// Seleccionar elementos
const toggleIcon = document.getElementById("toggle-icon");
const homeSci = document.getElementById("home-sci");

// Agregar evento al ícono de "más"
toggleIcon.addEventListener("click", () => {
    homeSci.classList.toggle("active");
    // Cambiar el ícono entre "+" y "x"
    toggleIcon.innerHTML = homeSci.classList.contains("active") 
        ? "<i class='bx bx-x'></i>" 
        : "<i class='bx bx-plus'></i>";
});
