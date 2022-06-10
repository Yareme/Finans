{extends file="main_user_panel.tpl"}
{block name=content}

    <h1>Profil</h1>

    <h2>Imię: {$user->name}</h2>
    <h2>Login: {$user->login}</h2>
    <h2>Kod rodziny: {$invite_code}</h2>
    <a href="{url action='changePasswordShow'}">Zmień hosło</a>
    
    {if $f }
        <form class="row g-4" action="{url action='changePassword'}">
            <legend>Zmiana hasła</legend>
            <fieldset>

                <div class="col-md-2 mb-4">
                    <label for="id_login" class="form-label">Stare hasło: </label>
                    <input id="id_login" type="password" name="pass" class="form-control"/>
                    {if $msgs->isMessage('pass')}
                        <p class="error2">
                            {$msgs->getMessage('pass')}
                        </p>
                    {/if}
                    {if $msgs->isMessage('passBD')}
                        <p class="error2">
                            {$msgs->getMessage('passBD')}
                        </p>
                    {/if}
                </div>

                <div class="col-md-2">
                    <label for="id_pass" class="form-label">Nowe hosło: </label>
                    <input id="id_pass" type="password" name="newPass" class="form-control"/><br />
                    {if $msgs->isMessage('newPass')}
                        <p class="error2">
                            {$msgs->getMessage('newPass')}
                        </p>
                    {/if}

                </div>

                <div class="col-md-2">
                    <label for="id_pass" class="form-label">Potwierdź hosło: </label>
                    <input id="id_pass" type="password" name="newPassRepeat" class="form-control"/><br />
                    {if $msgs->isMessage('newPassRepeat')}
                        <p class="error2">
                            {$msgs->getMessage('newPassRepeat')}
                        </p>
                    {/if}
                    {if $msgs->isMessage('passRep')}
                        <p class="error2">
                            {$msgs->getMessage('passRep')}
                        </p>
                    {/if}
                </div>

                <div class="pure-controls">
                    <button type="submit" class="btn btn-dark">Zmień</button>
                </div>

            </fieldset>

            {if $msgs->isMessage('good')}
                <p class="good">
                    {$msgs->getMessage('good')}
                </p>
            {/if}
        </form>
        {/if}


{/block}
