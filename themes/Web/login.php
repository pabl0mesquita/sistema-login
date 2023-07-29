<?php $v->layout("__theme"); ?>
<div class="login">
    <article class="login_box radius">
        <h1 class="hl icon-coffee"> Faça o login em nossa plataforma.</h1>
        <div class="ajax_response"></div>

        <form id="form_login" name="login" action="<?= url("/login"); ?>" method="post">
            <label>
                <span class="field icon-envelope">E-mail:</span>
                <input name="email" type="email" placeholder="Informe seu e-mail" required/>
            </label>

            <label>
                <span class="field icon-unlock-alt">Senha:</span>
                <input name="password" type="password" placeholder="Informe sua senha:" required/>
            </label>
            <div style="display:flex;">
                <button type="submit" class="radius btn-entrar icon-sign-in">Entrar</button>
            </div>
        </form>

        <footer>
            <div>
            <h4>Caso não seja cadastrado clique <a>aqui</a></h4>
            </div>
            <div>
            <p>Desenvolvido por <b>Pablo O. Mesquita</b></p>
            </div>
            <div>
            <p>&copy; <?= date("Y"); ?> - todos os direitos reservados</p>
            </div>
        </footer>
    </article>
</div>

