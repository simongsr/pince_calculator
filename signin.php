<?php

    $pwds = array("enrico.baittiner", "guest86218", "guest80122", "guest97754", "guest98122", "guest51271", "guest11348", "guest72253", "guest34169", "guest72063", "guest56199", "guest95425", "guest49719", "guest86103", "guest45389", "guest59525", "guest76538", "guest19535", "guest93109", "guest50180", "guest66026", "guest62762", "guest19706", "guest21629", "guest75625", "guest54334", "guest4860", "guest29141", "guest75896", "guest94909", "guest14936", "guest15211", "guest35435", "guest88047", "guest1141", "guest60826", "guest91061", "guest94042", "guest29981", "guest73539", "guest3079", "guest72200", "guest77565", "guest50244", "guest6130", "guest83467", "guest43517", "guest32249", "guest81747", "guest13540", "guest92312", "guest62686", "guest98289", "guest96146", "guest89119", "guest19568", "guest65078", "guest40081", "guest9227", "guest47398", "guest41518", "guest46762", "guest24354", "guest58855", "guest81673", "guest99496", "guest47215", "guest11920", "guest39013", "guest44451", "guest8328", "guest38182"
, "guest16190", "guest98254", "guest5567", "guest55648", "guest59425", "guest26482", "guest92756", "guest25147", "guest26736", "guest58411", "guest37164", "guest8882", "guest38893", "guest99348", "guest58190", "guest34027", "guest3271", "guest24818", "guest17058", "guest10699", "guest41489", "guest10053", "guest56303", "guest64066", "guest33630", "guest68303", "guest24360", "guest25955", "guest35844");

    if (in_array($_POST["password"], $pwds)) {

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Pince calculator</title>

        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/jumbotron-narrow.css" rel="stylesheet">

        <style type="text/css">
        input + label {
            margin-left: 10px;
            }
        </style>

    </head>

    <body>

        <div class="container">
            <div class="header">
                <ul class="nav nav-pills pull-right">
                    <li><a href="#info">Informazioni</a></li>
                    <li><a href="#contacts"><span class="glyphicon glyphicon-envelope"></span> Contatti</a></li>
                </ul>
                <h3 class="text-muted">Pince calculator <sub><small>beta</small></sub></h3>
            </div>

            <div class="row marketing">
                <div class="col-lg-12">
                    <canvas id="myCanvas" style="width: 100%;"></canvas>
                </div>
            </div>

            <div class="row marketing">
                <div class="col-lg-12">
                    <form id="model-data">
                        <div class="form-group has-success has-feedback">
                            <label class="control-label" for="w_front_neck">Larghezza scollo davanti [cm]</label>
                            <input id="w_front_neck" class="form-control" type="text" name="w_front_neck" value="7">
                            <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                        </div>

                        <div class="form-group has-success has-feedback hidden">
                            <label class="control-label" for="h_front_neck">Altezza incollatura davanti [cm]</label>
                            <input id="h_front_neck" class="form-control" type="text" name="h_front_neck" value="3">
                            <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                        </div>

                        <div class="form-group has-success has-feedback">
                            <label class="control-label" for="l_breast">Lunghezza seno [cm]</label>
                            <input id="l_breast" class="form-control" type="text" name="l_breast" value="27">
                            <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                        </div>

                        <div class="form-group has-success has-feedback">
                            <label class="control-label" for="w_breast">Larghezza seno [cm]</label>
                            <input id="w_breast" class="form-control" type="text" name="w_breast" value="10">
                            <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                        </div>

                        <div class="form-group has-success has-feedback">
                            <label class="control-label" for="w_shoulder">Larghezza spalla [cm]</label>
                            <input id="w_shoulder" class="form-control" type="text" name="w_shoulder" value="13">
                            <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                        </div>

                        <fieldset>
                            <legend>Spalla</legend>

                            <div style="margin-bottom: 10px;">
                                <input id="chk_angle" type="radio" name="shoulder" for="#h_front_shoulder_angle" checked="checked"><label for="chk_angle" style="margin-right: 50px;">Angolo</label>
                                <input id="chk_height" type="radio" name="shoulder" for="#h_front_shoulder_slope"><label for="chk_height">Altezza</label>
                            </div>

                            <div class="form-group has-success has-feedback">
                                <label class="control-label" for="h_front_shoulder_angle">Angolo inclinazione spalla davanti [° - gradi sessagesimali]</label>
                                <input id="h_front_shoulder_angle" class="form-control" type="text" name="h_front_shoulder_angle" value="21.801">
                                <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                            </div>

                            <div class="form-group has-success has-feedback">
                                <label class="control-label" for="h_front_shoulder_slope">Altezza inclinazione spalla davanti [cm]</label>
                                <input id="h_front_shoulder_slope" class="form-control" type="text" name="h_front_shoulder_slope" value="5.2">
                                <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                            </div>

                        </fieldset>

                        <hr>

                        <div class="form-group has-success has-feedback">
                            <label class="control-label" for="pince_gap">Larghezza pince sulla spalla [cm]</label>
                            <input id="pince_gap" class="form-control" type="text" name="pince_gap" value="7">
                            <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                        </div>

                        <div class="form-group has-success has-feedback">
                            <label class="control-label" for="h_waistline">Altezza giro davanti [cm]</label>
                            <input id="h_waistline" class="form-control" type="text" name="h_waistline" value="16">
                            <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                        </div>


                        <button class="btn btn-success">Aggiorna</button>
                    </form>
                </div>
            </div>


            <div class="row marketing">
                <div class="col-lg-12">
                    <h2 id="info">Informazioni</h2>
                </div>
            </div>

            <div class="row marketing">
                <div class="col-lg-12">
                    <h2 id="contacts">Contatti</h2>
                    <p><a href="mailto:simopandolfi@gmail.com"><span class="glyphicon glyphicon-envelope"></span> Simone Pandolfi</a></p>
                </div>
            </div>

            <div class="footer">
                <p>&copy; Simone Pandolfi 2014</p>
            </div>

        </div> <!-- /container -->


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="/js/paper-full.min.js"></script>
        <script type="text/paperscript" src="/js/pince-model.js" canvas="myCanvas"></script>


        <script type="text/javascript">
            $(function() {
                $('input[name="shoulder"]').change(function(ev) {
                    var $self = $(this);
                    $('input[name="shoulder"]:not(:checked)').each(function() {
                        var $self = $(this);
                        $($self.attr('for')).prop('readonly', true);
                    });
                    $($self.attr('for')).prop('readonly', false);
                })
                .not(':checked').each(function(ev) {
                    $($(this).attr('for')).prop('readonly', true);
                });
            });
        </script>

    </body>
</html>


<?php

    } else {

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Pince calculator</title>

        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/signin.css" rel="stylesheet">

        <script src="/js/assets/js/ie-emulation-modes-warning.js"></script>
        <script src="/js/assets/js/ie10-viewport-bug-workaround.js"></script>
    </head>

    <body>

        <div class="container">

            <form action="/signin.php" method="POST" class="form-signin" role="form">
                <h2 style="color: #999;">Pince calculator</h2>

                <hr>

                <h4 class="form-signin-heading">Please sign in</h4>

                <h5 style="color: #f00;">Wrong password! Please retry...</h5>

                <input name="password" type="password" class="form-control" placeholder="Password" required autofocus>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>

        </div> <!-- /container -->

    </body>
</html>


<?php

    }

?>
