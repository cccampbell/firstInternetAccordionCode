import domReady from '@roots/sage/client/dom-ready';
// Import Bootstrap
import 'bootstrap';
import Alpine from 'alpinejs';

/**
 * Application entrypoint
 */
domReady(async () => {
  window.Alpine = Alpine;
  Alpine.start();
  const initAccordions = () => {
    const accordions = document.querySelectorAll('.accordion-fi');
    accordions.forEach((accordion) => {
      // get all accordion items of current accordion
      const accordion_items = accordion.querySelectorAll('.accordion-item');
      accordion_items.forEach((item) => {
        // get button as that is what we will use as target to toggle the accordion item
        const button = item.querySelector('.accordion-button');
        const current_item = button.closest('.accordion-item');
        // get accordion-body height and set the var --content-height to it so when it's open the css can find the height and animate it
        const content_height = current_item.querySelector(
          '.accordion-content-wrapper .accordion-body'
        ).clientHeight;
        current_item.style.setProperty(
          '--content-height',
          `${content_height}px`
        );

        button.addEventListener('click', function () {
          // close all other accordion items if there are other open
          accordion_items.forEach((other_item) => {
            if (other_item !== current_item) {
              other_item.classList.remove('open');
            }
          });
          // toggle as saves checking if it is open or not
          current_item.classList.toggle('open');
        });
      });
    });
  };
  // initAccordions();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
