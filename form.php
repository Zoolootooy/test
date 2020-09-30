<?php require('partials/header.php');

?>


    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
                <form id="first" name="first" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-8 offset-2   form-group ">
                            <input class="form-control shadow-sm" type="text" name="url" id="url" placeholder="URL">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 offset-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="type1" value="get" >
                                <label class="form-check-label" for="inlineRadio1">GET</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="type2" value="post">
                                <label class="form-check-label" for="inlineRadio1">POST</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 offset-2   form-group ">
                            <input class="form-control shadow-sm" type="text" name="proxy" id="proxy" placeholder="Proxy">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 offset-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="proxy-type" id="proxy-radio1" value="http" >
                                <label class="form-check-label" for="inlineRadio1">HTTP</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="proxy-type" id="proxy-radio2" value="https">
                                <label class="form-check-label" for="inlineRadio1">HTTPS</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="proxy-type" id="proxy-radio3" value="socks5" checked>
                                <label class="form-check-label" for="inlineRadio1">SOCKS5</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 offset-2">
                            <div id="response">
                                <span id="status">cURL</span>
                                <span id="code"></span>
                            </div>
                        </div>
                        <div class="col-1 offset-2">
                            <div id="loading" class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <div class="col-2 text-right">
                            <button
                                    id="btnGO"
                                    class="btn btn-primary btn-lg btn-block shadow-sm">
                                GO
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12">
                <div id="htmlData"></div>
            </div>
        </div>
    </div>


<?php require('partials/footer.php'); ?>