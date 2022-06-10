{extends file="main_user_panel.tpl"}
{block name=content}


<H1>Wydatki</H1>

    <form class="row g-3" action="{url action='addExpenses'}">

    <div class="col-md-6">
        <label for="name_item" class="form-label ">Co kupiłeś</label>
        <input type="text" class="form-control" id="name_item" placeholder="Cukier" name="name_item"   ">
        {if $msgs->isMessage('item')}
            <p class="error2">
                {$msgs->getMessage('item')}
            </p>
        {/if}
    </div>

        <div class="col-md-6">
            <label for="quantity" class="form-label ">Ile</label>
            <input type="text" class="form-control" id="quantity" placeholder="1900" name="quantity"   ">
            {if $msgs->isMessage('quantily')}

                <p class="error2">
                    {$msgs->getMessage('quantily')}
                </p>
            {/if}
        </div>


        <div class="col-md-6">
            <label for="inputDate">Data:</label>
            <input id="inputDate" type="date" class="form-control" name="date" data-date-format="YYYY-MMMM-DD" value="2022-04-22">
            {if $msgs->isMessage('date')}
                <p class="error2">
                    {$msgs->getMessage('date')}
                </p>
            {/if}
        </div>

        <div class="col-md-6">
            <label for="price" class="form-label ">Koszt</label>
            <input type="text" class="form-control" id="price" placeholder="1900" name="price"   ">
            {if $msgs->isMessage('price')}

                <p class="error2">
                    {$msgs->getMessage('price')}
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
        {if $msgs->isMessage('category')}

            <p class="error2">
                {$msgs->getMessage('category')}
            </p>
        {/if}
    </div>



    <div class="col-12">
        <button type="submit" class="btn btn-dark">Dodaj</button>
    </div>
    </form>

    <h1>Ostatni wydatki</h1>

        <form class="row g-3" action="{url action="expensesShow"   }">
            <div class="col-auto">
                <input name="search" class="form-control mr-sm-2" type="string" placeholder="Szukaj" aria-label="Search">
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
            </div>
        </form>


    <table id="tab_people" class="table mt-3 ">
        <thead class="table-dark">
    <tr>
        <th>Nazwa</th>
        <th>Ilość</th>
        <th>Sumaryczny koszt</th>
        <th>Data</th>
        <th>Kategoria</th>
        <th>Usuń</th>

    </tr>
    </thead>
    {foreach $li as $p}
        {strip}
            <tr>
                <td>{$p["name_item"]}</td>
                <td>{$p["quantity"]}</td>
                <td>{$p["price"]}</td>
                <td>{$p["date"]}</td>
                <td>{$p["category_name"]}</td>
                <td>
                    <a class="button-small pure-button button-warning" href="{url action='deleteExpenses' param=$p['id_expenses']}"target="_f" onclick="test(event)">Usuń</a>
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
            <li class=" page-item"><a class="page-link {if $strona<=1} btn disabled {/if}" href="{url action='expensesShow' strona=1 s=$string}"><<</a></li>
            <li class="page-item"><a class="page-link {if $strona<=1} btn disabled {/if}" href="{url action='expensesShow' strona=$strona-1 s=$string}">Poprzednia</a></li>
            <li class=" page-item"><a class="page-link {if $strona==$max} btn disabled {/if}" href="{url action='expensesShow' strona=$strona+1 s=$string}">Następna</a></li>
            <li class=" page-item"><a class="page-link {if $strona==$max} btn disabled {/if}" href="{url action='expensesShow' strona=$max s=$string}">>></a></li>

        </ul>
    </nav>

{/block}