{extends file="main_user_panel.tpl"}
{block name=content}
    <h1>Tu dodajesz zarobki</h1>


    <form class="row g-3" action="{url action='addIncome'}">

        <div class="col-md-6">
            <label for="income" class="form-label ">Przychód</label>
            <input type="text" class="form-control" id="income" placeholder="1900" name="income"  value="{$form->income}">
            {if $msgs->isMessage('income')}
                <p class="error2">
                    {$msgs->getMessage('income')}
                </p>
            {/if}
        </div>

        <div class="col-md-4">
            <label for="inputState" class="form-label">Kategoria</label>
            <a href="{url action='categoryShow'} " class="form-label navbar-toggler">Dodaj kategorie</a>

            <select id="inputState" class="form-select" name="category_name">

                {foreach $list as $p}
                <option selected name="category_name">{$p["category_name"]}</option>
                {/foreach}

            </select>

        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-dark">Dodaj</button>
        </div>
    </form>

    <h1>Ostatnie zarobki</h1>


        <form class="row g-3" action="{url action="incomeShow"   }">
            <div class="col-auto">
                <input name="search" class="form-control mr-sm-2" type="string" placeholder="Szukaj " aria-label="Search">
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
            </div>
        </form>



    <table id="tab_people" class="table mt-3">
        <thead class="table-dark">
        <tr>
            <th>Suma</th>
            <th>Data</th>
            <th>Kategoria</th>
            <th>Usuń</th>

        </tr>
        </thead>
        {foreach $incomeList as $p}
            {strip}
                <tr>
                    <td>{$p["income"]}</td>
                    <td>{$p["date"]}</td>
                    <td>{$p["category_name"]}</td>
                    <td>
                    <a class="button-small pure-button button-warning" href="{url action='deleteIncome' param=$p['id_income']}" target="_f" onclick="test(event)">Usuń</a>
                        <script>
                            function test(e) {
                                if(confirm('Usunąć?')){
                                    return true;
                                }else{
                                    e.preventDefault();
                                }
                            };
                        </script>
                    </td>
                </tr>
            {/strip}
        {/foreach}
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class=" page-item"><a class="page-link {if $strona<=1} btn disabled {/if}" href="{url action='incomeShow' strona=1 s=$string}"><<</a></li>
            <li class="page-item"><a class="page-link {if $strona<=1} btn disabled {/if}" href="{url action='incomeShow' strona=$strona-1 s=$string}">Poprzednia</a></li>
            <li class=" page-item"><a class="page-link {if $strona==$max} btn disabled {/if}" href="{url action='incomeShow' strona=$strona+1 s=$string}">Następna</a></li>
            <li class=" page-item"><a class="page-link {if $strona==$max} btn disabled {/if}" href="{url action='incomeShow' strona=$max s=$string}">>></a></li>

        </ul>
    </nav>

    {/block}
