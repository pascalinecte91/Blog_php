<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-10 mx-auto text-center">
                <h4> laissez-moi un message <br><br> Je vous répondrai dès que possible</h4>

                <div style="padding-left: 15px; margin-top:30px; border: 4px solid #A0A0A0;
                    text-align:left;background-color:white">
                    <form action="<?= $router->url('send', []); ?>"
                        onsubmit="alert('Votre message a bien été transmis, nous vous repondrons dès que possible Merci !')"
                        method="POST">

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>NOM</label>
                                <input type="text" class="form-control" placeholder="Nom" id="name" required="Votre nom"
                                    name="name">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Adresse Mail</label>
                                <input type="email" class="form-control" placeholder="Adresse Mail" id="email"
                                    required="Merci d'écrire votre adresse mail." name="email">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Télephone</label>
                                <input type="tel" class="form-control" placeholder="Numéro de Téléphone" id="phone"
                                    required minlenght="10" name="phone">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Votre message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message"
                                    required="Merci de laisser un message." name="message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                </div>
                <br>

                <div id="success"></div>
                <button type="submit" name="envoyer" class="btn btn-danger mb-2">ENVOYER</button>
                </form>
            </div>
        </div>
    </div>
</body>