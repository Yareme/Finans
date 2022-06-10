{extends file="main_user_panel.tpl"}
{block name=content}

    <h1>Tu dodajesz kategorie</h1>


    <form class="row g-3" action="{url action='addCategory'}">

        <div class="col-md-6">
            <label for="inputCity" class="form-label">Podaj nazwe kategorie</label>
            <input type="text" class="form-control" id="inputCity" placeholder="Praca stała" name="category_name">

            {if $msgs->isMessage('addCategory')}

                <p class="good">
                    {$msgs->getMessage('addCategory')}
                </p>
            {/if}
            {if $msgs->isMessage('addCategoryError')}
                <p class="error2">
                   {$msgs->getMessage('addCategoryError')}
                </p>
            {/if}

        </div>

        <div class="col-12 mb-2">
            <button type="submit" class="btn btn-dark">Dodaj</button>
        </div>
    </form>


    <form class="row g-3" action="{url action="categoryShow" }">
        <div class="col-auto">
            <input name="search" class="form-control mr-sm-2    " type="string" placeholder="Szukaj" aria-label="Search">
        </div>
        <div class="col-auto">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
        </div>
    </form>



    <table id="tab_people" class="table mt-3">
        <thead class="table-dark">
        <tr>
            <th>Categoria</th>
            <th>Usuń</th>
        </tr>
        </thead>
        {foreach $li as $p}
            {strip}
                    <tr>
                    <td>
                        {$p["category_name"]}

                    </td>

                    <td>


                        <a class="button-small pure-button button-warning" href="{url action='deleteCategory' param=$p['id_category']}" target="_f" onclick="test(event)">Usuń</a>
                        <script>
                            function test(e) {
                                if(confirm('Usunąć?')){
                                    return true;
                                }else{
                                    e.preventDefault();
                                }
                            };
                        </script>
{*
                        <a class="button-small pure-button button-warning" href="{url action='deleteCategory' param=$p['id_category']}">Usuń</a>
*}
                    </td>
                    </tr>
            {/strip}
        {/foreach}
        {if $msgs->isMessage('er')}
            <p class="error2">
                {$msgs->getMessage('er')}
            </p>
        {/if}
    </table>
    <nav>
        <ul class="pagination">

            {*<li class="page-item"><a class="page-link" href="{url action='categoryShow' strona=$strona-1 s=$string}"><</a></li>
          {if $strona!=$max}   <li class="page-item"><a class="page-link" href="{url action='categoryShow' strona=$strona+1 s=$string}">> </a></li>
{/if}*}
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class=" page-item"><a class="page-link {if $strona<=1} btn disabled {/if}" href="{url action='categoryShow' strona=1 s=$string}"><<</a></li>

                    <li class="page-item"><a class="page-link {if $strona<=1} btn disabled {/if}" href="{url action='categoryShow' strona=$strona-1 s=$string}">Poprzednia</a></li>
                    {for $s=1 to $max}
                        <li class="page-item"><a class="page-link" href="{url action='categoryShow' strona={$s} s=$string}">{$s}</a></li>
                    {/for}

                    <li class=" page-item"><a class="page-link {if $strona==$max} btn disabled {/if}" href="{url action='categoryShow' strona=$strona+1 s=$string}">Następna</a></li>
                    <li class=" page-item"><a class="page-link {if $strona==$max} btn disabled {/if}" href="{url action='categoryShow' strona=$max s=$string}">>></a></li>

                </ul>
            </nav>


        </ul>
    </nav>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
{/block}
