// Smooth scroll for navbar links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e){
    e.preventDefault();
    document.querySelector(this.getAttribute('href')).scrollIntoView({behavior:'smooth'});
  });
});

// Animate progress bars
const progressBars = document.querySelectorAll('.progress-bar');

window.addEventListener('scroll', () => {
  progressBars.forEach(bar => {
    const rect = bar.getBoundingClientRect();
    if(rect.top < window.innerHeight){
      bar.style.width = bar.getAttribute('data-width');
      bar.textContent = bar.getAttribute('data-width');
    }
  });

  // Scroll reveal sections
  document.querySelectorAll('section').forEach(section => {
    const rect = section.getBoundingClientRect();
    if(rect.top < window.innerHeight - 50){
      section.classList.add('visible');
    }
  });
});
