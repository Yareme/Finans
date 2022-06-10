{extends file="main_admin_panel_T.tpl"}
{block name=content}



    <a href="{url action='logout'}">Logout</a>
    {if $role}
    <a href="{url action='main'}">User Panel</a>
    {/if}
<div>


<h1>Admin panel</h1>
<h2>Wyszukaj użytkownika</h2>


    <form class="row g-3" action="{url action="userShow" }">
        <div class="col-auto mb-3 ">
            <input name="search" class="form-control mr-sm-2    " type="string" placeholder="Szukaj" aria-label="Search">
            {if $msgs->isMessage('notUser')}
                <p class="error2">
                    {$msgs->getMessage('notUser')}
                </p>
            {/if}
            {if $msgs->isMessage('errReset')}
                <p class="error2">
                    {$msgs->getMessage('errReset')}
                </p>
            {/if}
        </div>
        <div class="col-auto">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
        </div>

    </form>
    {if isset($list) && $list!=null}
    <table id="tab_people" class=" table  ">
        <thead class="table-dark" >
        <tr>
            <th>Login</th>
            <th>Imię</th>
            <th>id_family</th>
            <th>Zresetuj Hasło</th>
        </tr>
        </thead>
                <tr>
                    <td>{$list["login"]}</td>
                    <td>{$list["name"]}</td>
                    <td>{$list["id_family"]}</td>
                    <td>{* Запуск модального окна*}
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Zresetuj
                        </button>
                    </td>

                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Czy napewno chcesz zresetować hasło?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid" >
                                        <a class="btn btn-dark" href="{url action='resetPassword' id=$list['id_user']}" role="button">Tak</a>
                                        <button type="button" class="btn btn-secondary col-md-5" data-bs-dismiss="modal">Nie</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </tr>


    </table>
    {/if}

{/block}