<?php $v->layout("__theme"); ?>
<div class="login">
    <article class="login_box radius">
        <h1 class="hl icon-coffee">Login</h1>
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

            <button type="submit" class="radius btn-entrar icon-sign-in">Entrar</button>
        </form>

        <footer>
            <p>Desenvolvido por <b>https://pablomesquita.com</b></p>
            <p>&copy; <?= date("Y"); ?> - todos os direitos reservados</p>
            <a target="_blank"
               class="icon-whatsapp transition"
               href="https://api.whatsapp.com/send?phone=554833715879&text=Olá, preciso de ajuda com o login."
            >WhatsApp: (21) 965556934</a>
        </footer>
    </article>
</div>

