{extends file="RegisterLoginTemplates.tpl"}
{block name=content}

<h1>Witam w mojej aplikacje</h1>
<h2>Teraz możesz się zalogować lub założyć konto</h2>
	<a href="{url action='loginShow'}" class="pure-button pure-button-primary">Zaloguj się</a>
	<a href="{url action='registerShow'}" class="pure-button pure-button-primary">Rejstracja</a>


{/block}