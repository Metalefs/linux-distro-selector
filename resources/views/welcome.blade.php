<!DOCTYPE html>
<html>
    <head>
        <title>Distro-Spinner</title>
         <!-- Latest compiled and minified CSS -->
    
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
         <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

        <link rel="stylesheet" href="/css/bootscss.css" type="text/css"/>
        
        <style>
        @import url('https://fonts.googleapis.com/css?family=Lato');
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: block;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: block;
                vertical-align: top;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 86px;
                
            .form-controll{
                display: block;
                width: 100%;
                padding: .375rem .75rem;
                font-size: 1rem;
                line-height: 1.5;
                color: #495057;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #ced4da;
                border-radius: .25rem;
                transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            }
        </style>
    </head>
        <body>
            <div class="container">
                <div class="content">
                    <div class="title">Escolha a sua distro Linux<img src="/pics/linux.jpg"></div>
                    <div class="form-group">
                       <form role="form "method="post" action='/submit'}>
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

                        <label for="nomeAluno">Nome do aluno : </label>
                        <input type="text" id="nomeAluno" name="nomeAluno" class="form-controll" placeholder="Seu nome">
                        <select class="selectpicker" name="turma" id="turma">
                            <option name="ADS-1" value="ADS-1">ADS-1</option>
                            <option name="ADS-2" value="ADS-2">ADS-2</option>
                            <option name="ADS-3" value="ADS-3">ADS-3</option>
                            <option name="ADS-4" value="ADS-4">ADS-4</option>
                            <option name="ADS-5" value="ADS-5">ADS-5</option>
                        </select>
                        <select class="selectpicker" name="distro" data-live-search="true">
                           @foreach($distros as $distro) 
                                  <option value="{{$distro->Id}}">{{$distro->Title}}</option>
                           @endforeach
                        </select>
                        <button class="btn-success" type=submit>Confirmar</button>
                        <p style="font-style:italic;">{{count($distros)}} Distros disponíveis - Insira o nome da distro para pesquisar</p> 
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Turma</th>
                        <th>Aluno</th>
                        <th>Distro</th>
                        <th>Description</th>
                    </tr>
                </thead>
                @foreach($alunos as $aluno)
                <tr>
                    <td>{{$aluno->Turma}}</td>
                    <td>{{$aluno->Nome}}</td>  
                    <td>{{$aluno->Title}}</td>
                    <td>{{$aluno->Description}}</td>
                    <td>
                        <form method="get" action='/delete'}>
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            <input name="IdAluno" type="hidden" value="{{$aluno->Id}}"/>
                            <button type="submit" class="btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </body>
</html>
