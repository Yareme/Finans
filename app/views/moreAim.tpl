{extends file="main_user_panel.tpl"}
{block name=content}

    <h1>Cel: {$text_aim }</h1>

        <form class="row g-3" action="{url action="moreAim" id=$id    }">
            <div class="col-auto">
                <input name="search" class="form-control mr-sm-2" type="string" placeholder="Szukaj" aria-label="Search">
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
            </div>
        </form>

    <table class="table mt-3">
        <thead class="table-dark">
        <tr>

            <th>Suma</th>
            <th>Imię</th>
            <th>Data</th>
            <th>Usuń</th>

        </tr>
        </thead>
        {foreach $li as $p}
            {strip}
                <tr>

                    <td>{$p["receipt"]}</td>
                    <td>{$p["name"]}</td>
                    <td>{$p["date"]}</td>
                   {if $user->id==$p['id_user']} <td>
                       <a class="button-small pure-button button-warning" href="{url action='deleteAimReceipt' id=$id param=$p['id_receipt'] s=$strona}">Usuń</a>
                       </td>
                   {/if}


                </tr>
            {/strip}
        {/foreach}
    </table>



    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class=" page-item"><a class="page-link {if $strona<=1} btn disabled {/if}" href="{url action='moreAim' id=$id strona=1 s=$string}"><<</a></li>
            <li class="page-item"><a class="page-link {if $strona<=1} btn disabled {/if}" href="{url action='moreAim' id=$id  strona=$strona-1 s=$string}">Previous</a></li>
            <li class=" page-item"><a class="page-link {if $strona==$max} btn disabled {/if}" href="{url action='moreAim' id=$id strona=$strona+1 s=$string}">Next</a></li>
            <li class=" page-item"><a class="page-link {if $strona==$max} btn disabled {/if}" href="{url action='moreAim' id=$id strona=$max s=$string}">>></a></li>

        </ul>
    </nav>


{/block}
