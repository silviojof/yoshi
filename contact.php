<?php include 'partials/header.php'; ?>
<div class="pages-header">
  <div class="pages-header-img">
    <img src="images/header-gallery.jpg" />
  </div>
  <div class="pages-header-hero clearfix">
    <h1 class="pages-header-title contact">bookings</h1>
    <div class="pages-header-box clearfix">
      <h2>Any questions<br> <span class="text-alternative">or bookings</span></h2>
    </div>
  </div>
</div>

<section class='row expanded small-collapse' id="contact-box">
  <div class="medium-12 large-6 column form-box">
    <form class="booking-form" action="#" method="post">
      <h6>Send us a message and we will try our best to confirm your choice or give an alternative in no more than 06 hours.</h6>
      <input type="text" name="form-name" id="form-name" placeholder="name" required />
      <div class="double-item-form">
        <input type="email" name="form-email" id="form-email" placeholder="email" />
        <input type="tel" name="form-tel" id="form-tel" placeholder="phone" required />
      </div>
      <div class="one-item-form">
        <p>services</p>
        <input type="checkbox" name="form-services" id="form-haircut" value="haircut" /><label for="form-haircut">haircut</label>
        <input type="checkbox" name="form-services" id="form-color" value="color" /><label for="form-color">color</label>
        <input type="checkbox" name="form-services" id="form-styling" value="styling" /><label for="form-styling">styling</label>
        <input type="checkbox" name="form-services" id="form-brides" value="brides" /><label for="form-brides">brides</label>
      </div>
      <div class="double-item-form">
      <select name="form-stylist">
        <option disabled selected>select a stylist</option>
        <option value="1">Yoshi Takashima</option>
        <option value="2">Gretchen Hunter</option>
        <option value="3">Hope Sandoval</option>
        <option value="4">Ignacio Owen</option>
        <option value="5">Mindy Thomas</option>
        <option value="6">Miranda James</option>
        <option value="7">Karl White</option>
        <option value="8">Ginger Jackson</option>
        <option value="9">Marion Witts</option>
        <option value="10">Tery Young</option>
      </select>
      <input type="date" name="form-date" id="form-date" placeholder="date" required />
    </div>
      <textarea name="form-text" id="form-text" placeholder="message"></textarea>
      <input type="submit" class="form-submit" name="form-submit" value="book an appointment" />
    </form>
  </div>
  <div class="medium-12 large-6 column">
    <div id="map"></div>
    <div class="row expanded contacts">
      <div class="column-flex">
        <h6><em>contact info</em></h6>
        <ul>
          <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>570 Dunsmuir St.<br>Vancouver, BC</span></li>
          <li><i class="fa fa-phone" aria-hidden="true"></i><span>+1 555 555-5555C</span></li>
          <li><i class="fa fa-mobile-phone" aria-hidden="true"></i><span>+1 888 888-8888</span></li>
          <li><i class="fa fa-envelope-o" aria-hidden="true"></i><span>info@vanarts.com</span></li>
        </ul>
      </div>
      <div class="column-flex">
        <h6><em>directions</em></h6>
        <p><strong>From West LA </strong> Nulla in dolor nec non in lectus. Interdum et malesuada fames ac ante ipsum pri.</p>
        <p><strong>From North LA </strong> Ornare non in lectus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
      </div>
    </div>
  </div>
</section>

<section class="contacts-sentence"><h2><em>Anythig that makes sense</em></h2></section>

<section class="contacts-gallery">
  <div class="expanded row small-collapse">
    <div class="small-12 medium-4 large-3 column contact-img">
      <img src="images/gallery01.jpg" alt="" />
    </div>
    <div class="small-12 medium-4 large-3 column contact-img">
      <img src="images/gallery02.jpg" alt="" />
    </div>
    <div class="small-12 medium-4 large-3 column contact-img">
      <img src="images/gallery03.jpg" alt="" />
    </div>
    <div class="small-12 medium-4 large-3 column show-for-large contact-img">
      <img src="images/gallery04.jpg" alt="" />
    </div>
  </div>
</section>


<?php include 'partials/cta.php'; ?>
<?php include 'partials/footer.php'; ?>
