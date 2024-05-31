      <?php if( is_front_page() ) : ?>
      <script>
          const target = '.mainslider';
          const target_options = {
            type: 'fade',
            rewind: true,
            autoplay: true,
            pauseOnHover: false,
            pauseOnFocus: false,
            arrows: false,
            interval: 4000,
            speed: 2000,
            pagination: false,
          }

          const mySplide = new Splide(target, target_options);
          mySplide.mount();
      </script>
      <?php endif; ?>