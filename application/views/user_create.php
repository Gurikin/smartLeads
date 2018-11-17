<?php ?>
<form id="ajax-form" action="/user/add">

    <div class="form-horizontal">
        <h4>Создание новой задачи</h4>
        <hr />


        <div class="form-group">
            <div class="col-md-10">
                <label class="control-label col-md-2" for="secondName">Фамилия</label>

                <input class="text-box single-line" id="secondName"  onchange="validateInput();" name="secondName" type="text" value="Pupkin"/>
                <span id="errSN" value=""></span>

            </div>
        </div>

        <div class="form-group">
            <div class="col-md-10">
                <label class="control-label col-md-2" for="firstName">Имя</label>

                <input class="text-box single-line" id="firstName" onchange="validateInput();" name="firstName" type="text" value="Vasya"/>
                <span id="errMN" value=""></span>

            </div>
        </div>

        <div class="form-group">
            <div class="col-md-10">
                <label class="control-label col-md-2" for="middleName">Отчество</label>
                <input class="text-box single-line" id="middleName" onchange="validateInput();" name="middleName" type="text" value="Dormidontovich"/>
                <span id="errJT" value=""></span>
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-10">
                <label class="control-label col-md-2" for="jobTitle">Должность</label>
                <input class="text-box single-line" id="jobTitle" name="jobTitle" type="text" value="Senior engeneer" />
                <span class="field-validation-valid"></span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-10">
                <label class="control-label col-md-2" for="login">Login</label>
                <input class="text-box single-line" id="login" name="login" type="text" value="Vas-vas" />
                <span class="field-validation-valid"></span>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-10">
                <label class="control-label col-md-2" for="password">Пароль</label>
                <input class="text-box single-line" id="password" name="password" type="password" value="pass" />
                <span class="field-validation-valid"></span>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-10">
                <label class="control-label col-md-2" for="phone">Телефон</label>
                <input class="text-box single-line" id="phone" name="phone" type="text" value="1111" />
                <span class="field-validation-valid"></span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <input type="submit" value="Добавить" onclick="sendAjaxForm_createUser();"/>
            </div>
        </div>
    </div>
</form>

<div>
    <a onclick="$('#modalWindow').toggle(350);">Вернуться к списку</a>
</div>




<?php
?>