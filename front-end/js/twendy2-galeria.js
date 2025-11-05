// Pega o container correto da galeria
// const galeria = document.querySelector('.twendy-galeria-section');
// if (galeria) {
//   const next = galeria.querySelector('.next');
//   const prev = galeria.querySelector('.prev');
//   const slide = galeria.querySelector('.slide');

//   next.addEventListener('click', () => {
//     const items = galeria.querySelectorAll('.item');
//     slide.appendChild(items[0]); // move o primeiro pro final
//   });

//   prev.addEventListener('click', () => {
//     const items = galeria.querySelectorAll('.item');
//     slide.prepend(items[items.length - 1]); // move o último pro início
//   });
// }
document.addEventListener('DOMContentLoaded', () => {
  const galeria = document.querySelector('.twendy-galeria-section');
  if (!galeria) return;

  const slide = galeria.querySelector('.slide');
  const next = galeria.querySelector('.next');
  const prev = galeria.querySelector('.prev');

  // --- Funções para trocar manualmente ---
  function nextSlide() {
    const items = galeria.querySelectorAll('.item');
    slide.appendChild(items[0]);
  }

  function prevSlide() {
    const items = galeria.querySelectorAll('.item');
    slide.prepend(items[items.length - 1]);
  }

  // Botões manuais
  next.addEventListener('click', () => {
    nextSlide();
    resetAutoSlide(); // reinicia o timer quando o usuário clicar
  });

  prev.addEventListener('click', () => {
    prevSlide();
    resetAutoSlide();
  });

  // --- Troca automática ---
  let autoSlide = setInterval(nextSlide, 4000); // troca a cada 4 segundos

  // Reinicia o temporizador se o usuário interagir
  function resetAutoSlide() {
    clearInterval(autoSlide);
    autoSlide = setInterval(nextSlide, 4000);
  }
});
