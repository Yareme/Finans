{extends file="main_user_panel.tpl"}
{block name=content}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{url action='updateAim'}">
                        <label for="owned">Ile chcesz dodać</label>
                        <textarea class="form-control" id="owned" name="owned" rows="2"></textarea>
                        <button type="submit" class="col-sm-1 btn btn-primary mt-2">  <a  class="button-small pure-button button-warning" href="{url action='updateAim' param=$p['id_aim']}">D</a></button>
                    </form>


                    {*  <a  class="button-small pure-button button-warning" href="{url action='updateAim' param=$p['id_aim']}">D</a>*}

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>
{/block}