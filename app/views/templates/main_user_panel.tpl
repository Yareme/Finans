
<!doctype html>
<html lang="pl" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{$page_description|default:'Opis domyślny'}">
    <title>{$page_title|default:"Tytuł domyślny"}</title>
    <script src="{$conf->app_root}/js/js.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{$conf->app_root}/css/style.css"  type="text/css" crossorigin="anonymous">

</head>
<body>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="{url action='main'}">Strona glówna</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link {$active1|default:""}" aria-current="page" href="{url action='incomeShow' strona="1"}">Dodaj zarobki</a>
                </li>

                <li class="nav-item">
                        <a class="nav-link {$active2|default:""}" href="{url action='expensesShow' strona="1"}">Dodaj wydatki</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {$active3|default:""} " href="{url action='categoryShow' strona="1"}">Moje kategorie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {$active4|default:""} " href="{url action='aimShow' strona="1"}">Moje cele</a>
                </li>



            </ul>
            <span class="navbar-text">

                <a class="btn">{$user->balance|default:"0"}</a>

        <a href="{url action='profileShow'}"class="btn "> {$user->login}</a>
                        <a href="{url action='logout'}" class="btn ">Logout</a>

      </span>
        </div>
    </div>
</nav>


<div class="content">
    {block name=content} Domyślna treść zawartości .... {/block}
</div><!-- content -->


</body>
</html>