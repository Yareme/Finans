{extends file="main_user_panel.tpl"}
{block name=content}

    <h3>Cześć {$user->name}</h3>

    <div class="split left">
        <div class="centered">
            <h4>Zarobiłeś: {$income}</h4>
        </div>
    </div>

    <div class="split right">
        <div class="centered">
            <h4>Wydałeś: {$expenses}</h4>

        </div>

{/block}

