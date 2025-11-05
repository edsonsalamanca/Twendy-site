document.addEventListener("DOMContentLoaded", () => {
  const slides = document.querySelectorAll('.slides-test input[type="radio"]');
  let index = 0;

  // Função que ativa o próximo slide
  function nextSlide() {
    slides[index].checked = false; // desmarca o atual
    index = (index + 1) % slides.length; // vai para o próximo (ou volta ao 1°)
    slides[index].checked = true; // marca o próximo
  }

  // Troca automaticamente a cada 4 segundos
  setInterval(nextSlide, 4000);
});


// --- Modal Galeria ---
// document.addEventListener("DOMContentLoaded", () => {
//   const modal = document.getElementById("galeriaModal");
//   const modalBody = modal.querySelector(".modal-body");
//   const closeBtn = modal.querySelector(".close-modal");
//   const buttons = document.querySelectorAll(".slide .content button");

//   buttons.forEach((btn, index) => {
//     btn.addEventListener("click", () => {
//       // Caminho das imagens ou vídeos
//       const slides = document.querySelectorAll(".item");
//       const bg = slides[index].style.backgroundImage;

//       // Verifica se há um vídeo (tu podes adaptar isso depois)
//       const videoSrc = slides[index].dataset.video;

//       modalBody.innerHTML = ""; // limpa conteúdo anterior

//       if (videoSrc) {
//         // Se tiver vídeo
//         const video = document.createElement("video");
//         video.src = videoSrc;
//         video.controls = true;
//         video.autoplay = true;
//         modalBody.appendChild(video);
//       } else {
//         // Caso contrário, mostra imagem
//         const img = document.createElement("img");
//         img.src = bg.slice(5, -2); // remove url("...") do CSS
//         modalBody.appendChild(img);
//       }

//       modal.style.display = "flex";
//     });
//   });

//   // Fecha o modal
//   closeBtn.addEventListener("click", () => {
//     modal.style.display = "none";
//     modalBody.innerHTML = "";
//   });

//   // Fecha clicando fora
//   modal.addEventListener("click", (e) => {
//     if (e.target === modal) {
//       modal.style.display = "none";
//       modalBody.innerHTML = "";
//     }
//   });
// });

document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("galeriaModal");
  const modalBody = modal.querySelector(".modal-body");
  const closeModal = modal.querySelector(".close-modal");
  const seeMoreButtons = document.querySelectorAll(".twendy-galeria-section .item button");

  // ✅ Fecha o modal ao clicar fora do conteúdo
  modal.addEventListener("click", (e) => {
    if (e.target === modal) modal.style.display = "none";
  });

  // ✅ Fecha o modal ao clicar no “X”
  closeModal.addEventListener("click", () => {
    modal.style.display = "none";
    modalBody.innerHTML = ""; // limpa conteúdo
  });

  // ✅ Percorre todos os botões “See More / Play”
  seeMoreButtons.forEach((button) => {
    button.addEventListener("click", function (e) {
      e.stopPropagation();

      // encontra o item pai
      const item = button.closest(".item");

      // se for vídeo
      if (item.classList.contains("video-slide")) {
        const videoSrc = item.dataset.video;
        modalBody.innerHTML = `
          <video controls autoplay style="max-width:100%;max-height:90vh;object-fit:contain;display:block;">
            <source src="${videoSrc}" type="video/mp4">
            O seu navegador não suporta vídeo.
          </video>
        `;
      } else {
        // caso seja imagem
        const bg = item.style.backgroundImage;
        const imgUrl = bg.slice(5, -2); // extrai o caminho da imagem
        modalBody.innerHTML = `<img src="${imgUrl}" alt="Imagem da galeria" style="max-width:100%;max-height:90vh;object-fit:contain;display:block;">`;
      }

      modal.style.display = "flex"; // abre o modal
    });
  });
});
