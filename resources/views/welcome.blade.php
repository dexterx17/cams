<!DOCTYPE doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <meta content="IE=edge" http-equiv="X-UA-Compatible" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <title>
            Acceso Laboratorio
        </title>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"></link>
        <style type="text/css" media="screen">
            #img1{
                width: 100%;
                height: 400px;
            }
        </style>
    </head>
    <body onload="load()">
        <div class="container" id="app">
            <div class="header clearfix">
                <nav>
                    <ul class="nav nav-pills pull-right">
                        <li class="active" role="presentation">
                            <a href="#" onclick="location.reload()">
                                Refresh
                            </a>
                        </li>
                    </ul>
                </nav>
                <h3 class="text-muted">
                    Acceso Laboratorio
                </h3>
            </div>
            <div class="jumbotron">
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <input class="btn btn-primary" name="B3" onclick="ptzUpSubmit()" type="button" value="↑" />
                    </div>
                    <div class="btn-group" role="group">
                        <input class="btn btn-primary" name="B2" onclick="ptzDownSubmit()" type="button" value="↓" />
                    </div>
                    <div class="btn-group" role="group">
                        <input class="btn btn-primary" name="B1" onclick="ptzLeftSubmit()" type="button" value="←" />
                    </div>
                    <div class="btn-group" role="group">
                        <input class="btn btn-primary" name="B0" onclick="ptzRightSubmit()" type="button" value="→" />
                    </div>
                </div>
                <form method="get" name="form1" target="test"></form>
                <img id="img1" src="" border="0">
                <p class="text-center">
                    <a class="btn btn-lg btn-success" href="#" role="button" id="abrir">
                        Abrir puerta
                    </a>
                </p>
            </div>
            <div class="row marketing">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table class="table table-hover table-responsive">
                        <caption>Accesos</caption>
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Imagen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="footer">
                <p>
                    © {{ date('Y')}} ESPE.
                </p>
            </footer>
        </div>
        <!-- /container -->
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript">

            var img = new Image();
            var imgObj;

            function preload()
            {
                img.src='/tmpfs/auto.jpg?'+new Date;
            }

            function changesrc()
            {
                img1.src=img.src;
                preload();
                setTimeout(changesrc,3500);
            }

            function update()
            {
                imgObj = document.getElementById('img1');
                
                imgObj.src = img.src;
                img.src = "/tmpfs/auto.jpg?" + (new Date()).getTime();
            }

            function takeError()
            {
                img.src = "/tmpfs/auto.jpg?" + (new Date()).getTime();
            }

            function startonload()
            {
                img.src = "/tmpfs/auto.jpg?" + (new Date()).getTime();
                img.onerror=takeError;
                img.onload=update;
            }

            function load()
            {
                if (navigator.appName.indexOf("Microsoft IE Mobile") != -1)
                {
                    preload();
                    changesrc();
                    return;
                }
                startonload();
            }

            function ptzUpSubmit()
            {
                form1.action="cgi-bin/hi3510/ytup.cgi";
                form1.submit();
            }

            function ptzDownSubmit()
            {
                form1.action="cgi-bin/hi3510/ytdown.cgi";
                form1.submit();
            }

            function ptzLeftSubmit()
            {
                form1.action="cgi-bin/hi3510/ytleft.cgi";
                form1.submit();
            }

            function ptzRightSubmit()
            {
                form1.action="cgi-bin/hi3510/ytright.cgi";
                form1.submit();
            }
            $('#abrir').on('click',function(){
                    
                var url = "http://10.211.159.120:4040/abrir";
                $.get(url,function(data){
                    alert('data');
                    alert(data);
                });

                /*window.location.href=url;
                window.setTimeout(function(){
                    window.stop();
                },3000);*/
            });
        </script>
    </body>
</html>
