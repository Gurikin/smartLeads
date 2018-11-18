<?php ?>
<div class="jumbotron">
    <h1>SMART-LEADS</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <h4>Оставить отзыв</h4>
            <hr/>
            <form class="col-12" id="ajax-form" method="POST" action="/user/feedbackAdd">
                <div class="form-group">
                    <label for="firstName">Ваше имя</label>
                    <input class="form-control" id="firstName" name="firstName" type="text" value=""/>
                </div>

                <div class="form-group">
                    <label for="email">Ваш email</label>
                    <input type="email" class="form-control" id="email" onchange="validateInput();"
                           name="email" placeholder="name@example.com">
                    <span class="field-validation-error" id="errMail" value=""></span>
                </div>

                <div class="form-group">
                    <label for="feedbackbody">Ваше сообщение</label>
                    <textarea class="form-control" id="feedbackbody" name="feedbackbody" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <div>
                        <input class="button" type="submit" value="Отправить отзыв"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/application/scripts/validInput.js"></script>
