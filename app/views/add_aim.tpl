{extends file="main_user_panel.tpl"}
{block name=content}



    <h1>Tu dodajesz cele</h1>

    <!-- Button trigger modal -->



    <form action="{url action="addAim"}">
        <div class="col-md-6">
            <label for="text_aim">Opis celu</label>
            <input class="form-control" id="text_aim" name="text_aim" rows="2" value="{$form->text_aim}" >
            {if $msgs->isMessage('text_aim')}
                <p class="error2">
                    {$msgs->getMessage('text_aim')}
                </p>
            {/if}
        </div>


        <div class="col-md-2">
            <label for=" price_aim">Ile trzeba zebrać</label>
                <input  type="number" class="form-control" id="price_aim" name="price_aim" value="{$form->price_aim}">
            {if $msgs->isMessage('price_aim')}
                <p class="error2">
                    {$msgs->getMessage('price_aim')}
                </p>
            {/if}
        </div>

        <div class="col-12">
            <button type="submit" class="col-sm-1 btn btn-dark mt-2">Dodaj</button>
        </div>


    </form>


    <H1>Bierzące cele</H1>


        <form class="row g-3" action="{url action="aimShow"   }">
           <div class="col-auto">
               <input name="search" class="form-control mr-sm-2" type="string" placeholder="Szukaj" aria-label="Search">
           </div>
            <div class="col-auto">
            <button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Szukaj</button>
            </div>
        </form>


    <table   class="table mt-3">
        <thead class="table-dark">
        <tr>
            <th>Opis</th>
            <th>Wymagana kwota</th>
            <th>Już jest</th>
            <th>Dodaj</th>
            <th>Usuń</th>

        </tr>
        </thead>
        {foreach $li as $p}
            {strip}
                <tr>
                    <td>{$p["text_aim"]}</td>
                    <td>{$p["price_aim"]}</td>
                    <td>{$p["owned"]}</td>
                    <td class="tt">

                                        <form   class="row gy-2 gx-3 align-items-center" action="{url action='updateAim' param=$p['id_aim'] }">
                                            <div class="col-sm-6">
                                                <input class="form-control" type="number" id="owned" name="owned_form" >
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit"  class="btn btn-dark" >Dodaj</button>
                                                <a class="btn btn-link" href="{url action='moreAim' param=$p['id_aim']}">Więcej</a>
                                            </div>


                                        </form>

                    </td>

                    <td>
                        <a class="button-small pure-button button-warning" href="{url action='deleteAim' param=$p['id_aim']}"target="_f" onclick="test(event)">Usuń</a>
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
            <li class=" page-item"><a class="page-link {if $strona<=1} btn disabled {/if}" href="{url action='aimShow' strona=1 s=$string}"><<</a></li>
            <li class="page-item"><a class="page-link {if $strona<=1} btn disabled {/if}" href="{url action='aimShow' strona=$strona-1 s=$string}">Previous</a></li>
            <li class=" page-item"><a class="page-link {if $strona==$max} btn disabled {/if}" href="{url action='aimShow' strona=$strona+1 s=$string}">Next</a></li>
            <li class=" page-item"><a class="page-link {if $strona==$max} btn disabled {/if}" href="{url action='aimShow' strona=$max s=$string}">>></a></li>

        </ul>
    </nav>

{/block}
