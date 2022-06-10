{extends file='RegisterLoginTemplates.tpl'}

{block name="content"}

    <section class=" vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-5 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-1 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase mb-5">Restracja</h2>
                                <form action="{url action='register'}" class="needs-validation" method="post">

                                    <div class="form-outline form-white mb-3">
                                        <input name="name" value="{$form->name}" type="text" id="typeEmailX" class="form-control form-control-lg  {if $msgs->isMessage('name')} is-invalid {/if}"  />
                                        <label class="form-label" for="typeEmailX">Imię</label>
                                        {if $msgs->isMessage('name')}
                                            <p class="error">
                                                {$msgs->getMessage('name')}
                                            </p>
                                        {/if}
                                    </div>

                                    <div class="form-outline form-white mb-3">
                                        <input type="text" name="login" value="{$form->login}" id="typePasswordX" class="form-control form-control-lg  {if $msgs->isMessage('login') || $msgs->isMessage('login_exist')} is-invalid {/if}" />
                                        <label class="form-label" for="typePasswordX">Login</label>
                                        {if $msgs->isMessage('login')}
                                            <p class="error">
                                                {$msgs->getMessage('login')}
                                            </p>
                                        {/if}
                                        {if $msgs->isMessage('login_exist')}
                                            <p class="error">
                                                {$msgs->getMessage('login_exist')}
                                            </p>
                                        {/if}
                                    </div>

                                    <div class="form-outline form-white mb-3">
                                        <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg  {if $msgs->isMessage('password')} is-invalid {/if}" />
                                        <label class="form-label" for="typePasswordX">Hasło</label>
                                        {if $msgs->isMessage('password')}
                                            <p class="error">
                                                {$msgs->getMessage('password')}
                                            </p>
                                        {/if}
                                    </div>

                                    <div class="form-outline form-white mb-3">
                                        <input type="password" name="password_repeat" id="typePasswordX" class="form-control form-control-lg {if $msgs->isMessage('password_repeat') || $msgs->isMessage('password_repeat_right')} is-invalid {/if}" />
                                        <label class="form-label" for="typePasswordX">Powtóż hasło</label>
                                        {if $msgs->isMessage('password_repeat')}
                                            <p class="error">
                                                {$msgs->getMessage('password_repeat')}
                                            </p>
                                        {/if}
                                        {if $msgs->isMessage('password_repeat_right')}
                                            <p class="error">
                                                {$msgs->getMessage('password_repeat_right')}
                                            </p>
                                        {/if}
                                    </div>

                                    <div class="form-outline form-white mb-3">
                                        <input type="number" name="invite_code" value="{$form->invite_code}" id="typePasswordX" class="form-control form-control-lg  {if $msgs->isMessage('invietCode')} is-invalid {/if}" />
                                        <label class="form-label" for="typePasswordX">Podaj kod jak masz</label>
                                        {if $msgs->isMessage('invietCode')}
                                            <p class="error">
                                                {$msgs->getMessage('invietCode')}
                                            </p>
                                        {/if}
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Rejestracja</button>
                                </form>
                            </div>
                            <div>
                                <p class="mb-0">Już masz konto? <a href="{url action='loginShow'}" class="text-white-50 fw-bold">Zaloguj się</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
{*
    <form action="{url action='register'}" method="post"  class="pure-form pure-form-aligned bottom-margin">
        <legend>Rejestracja</legend>
        <fieldset>
            <div class="pure-control-group">
                <label for="id_name">Name: </label>
                <input id="id_name" type="text" name="name" value="{$form->name}"/>
                {if $msgs->isMessage('name')}
                    <p class="error">
                        {$msgs->getMessage('name')}
                    </p>
                {/if}
            </div>

            <div class="pure-control-group">
                <label for="id_login">login: </label>
                <input id="id_login" type="text" name="login" value="{$form->login}"/>
                {if $msgs->isMessage('login')}
                    <p class="error">
                        {$msgs->getMessage('login')}
                    </p>
                {/if}
                {if $msgs->isMessage('login_exist')}
                    <p class="error">
                        {$msgs->getMessage('login_exist')}
                    </p>
                {/if}
            </div>

            <div class="pure-control-group">
                <label for="id_pass">password: </label>
                <input id="id_pass" type="password" name="password" /><br />
                {if $msgs->isMessage('password')}
                    <p class="error">
                       {$msgs->getMessage('password')}
                    </p>
                {/if}
            </div>

            <div class="pure-control-group">
                <label for="id_pass_repeat">repeat password: </label>
                <input id="id_pass_repeat" type="password" name="password_repeat" /><br />
                {if $msgs->isMessage('password_repeat')}
                    <p class="error">
                        {$msgs->getMessage('password_repeat')}
                    </p>
                {/if}
                {if $msgs->isMessage('password_repeat_right')}
                    <p class="error">
                        {$msgs->getMessage('password_repeat_right')}
                    </p>
                {/if}
            </div>
            <div class="pure-control-group">
                <label for="id_invite_code">Podaj kod jak masz: </label>
                <input id="id_invite_code" type="number" name="invite_code" value="{$form->invite_code}" /><br />
                {if $msgs->isMessage('invietCode')}
                    <p class="error">
                        {$msgs->getMessage('invietCode')}
                    </p>
                {/if}
            </div>

            <div class="pure-controls">
                <input type="submit" value="register" class="pure-button pure-button-primary"/>
                <a href="{url action='loginShow'}" class="pure-button pure-button-primary">Zaloguj się</a>

            </div>
        </fieldset>
    </form>
*}





    {/block}