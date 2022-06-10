{extends file="RegisterLoginTemplates.tpl"}

{block name=content}

    <section class=" vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Logowanie</h2>
                                <p class="text-white-50 mb-5">Wpisz login i haslo!</p>
                                <form action="{url action='login'}" class="needs-validation" method="post" novalidate>
                                <div class="form-outline form-white mb-4">


                                    <input value="{$form->login}" name="login" type="text" id="log"  class="form-control form-control-lg  {if $msgs->isMessage('login')} is-invalid {/if} " required/>
                                    <label class="form-label" for="log">Login</label>
                                    <div class="invalid-feedback">
                                        {$msgs->getMessage('login')}
                                    </div>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg {if $msgs->isMessage('password')} is-invalid {/if}" />
                                    <label class="form-label" for="typePasswordX">Password</label>
                                    <div class="invalid-feedback">
                                        {$msgs->getMessage('password')}
                                    </div>

                                </div>
                                    <div class="error">
                                        {if $msgs->isMessage('errLogin') &&(!$msgs->isMessage('login') ||!$msgs->isMessage('password'))}
                                            {$msgs->getMessage('errLogin')}
                                            {/if}
                                    </div>
                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Zapomniełeś hasła?</a></p>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                    </form>
                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                </div>

                            </div>

                            <div>
                                <p class="mb-0">Nie masz konta? <a href="{url action='registerShow'}" class="text-white-50 fw-bold">Rejestracja</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






{/block}
