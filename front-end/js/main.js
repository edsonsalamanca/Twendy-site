

    function atualizarDataHora() {
      const agora = new Date();
      const dataFormatada = agora.toLocaleDateString('pt-BR');
      const horaFormatada = agora.toLocaleTimeString('pt-BR');

      document.getElementById('dataAtual').textContent = dataFormatada;
      document.getElementById('horaAtual').textContent = horaFormatada;
    }

    // Atualiza a cada segundo
    setInterval(atualizarDataHora, 1000);
    atualizarDataHora(); // Executa no carregamento



    /**Carousel */

    const thumbs = document.querySelectorAll('.carousel-thumbnails img');
  thumbs.forEach((thumb, index) => {
    thumb.addEventListener('click', () => {
      thumbs.forEach(t => t.classList.remove('active-thumb'));
      thumb.classList.add('active-thumb');
    });
  });

  // Update thumbnail on carousel slide
  const carouselElement = document.querySelector('#customCarousel');
  carouselElement.addEventListener('slide.bs.carousel', function (event) {
    thumbs.forEach(t => t.classList.remove('active-thumb'));
    thumbs[event.to].classList.add('active-thumb');
  });

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  scrollTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

/*scroll */
  $('#top-home'),on('click',function(){

    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });

  })


  //Executa o efeito a cada 5 segundos
  setInterval(() => {
    $('#whatsappBtn').addClass('zoom-rotate');
    setTimeout(() => {
      $('#whatsappBtn').removeClass('zoom-rotate');
    }, 800);
  }, 5000);

  // Também executa o efeito ao passar o mouse
  $('#whatsappBtn').on('mouseenter', function () {
    $(this).addClass('zoom-rotate');
    setTimeout(() => {
      $(this).removeClass('zoom-rotate');
    }, 800);
  });


  
