
  
   <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto text-center">
        <h4> laissez-moi  message <br>   Je vous réponds dès que possible</h4>
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        <div style="padding-left: 15px; margin-top:30px; border: 4px solid #A0A0A0; text-align:left;">
        <form name="sentMessage" id="contactForm" novalidate>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>NOM</label>
              <input type="text" class="form-control" placeholder="Nom" id="name" required data-validation-required-message="Please enter your name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Adresse Mail</label>
              <input type="email" class="form-control" placeholder="Adresse Mail" id="email" required data-validation-required-message="Please enter your email address.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Télephone</label>
              <input type="tel" class="form-control" placeholder="Numéro de Téléphone" id="phone" required data-validation-required-message="Please enter your phone number.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Votre message</label>
              <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
</div>
          <br>




           
          <div id="success"></div>
          <button type="submit" class="btn btn-secondary" id="sendMessageButton">Envoyer</button>
        </form>
      </div>
    </div>
  </div>

<body>


</body>
 <footer>
 </footer>