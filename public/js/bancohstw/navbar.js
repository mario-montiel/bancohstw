const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');
    const line1 = document.querySelector('.line1');
    const line2 = document.querySelector('.line2');
    const line3 = document.querySelector('.line3');

    hamburger.addEventListener('click', () => {
      navLinks.classList.toggle('open');
      hamburger.classList.toggle('hamburger-absolute')
      line1.classList.toggle('line-1')
      line2.classList.toggle('line-2')
      line3.classList.toggle('line-3')
    });