@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de pacientes <a href="odontograma/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('paciente.odontograma.search')
		</div>
	</div>
	<div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Odontograma</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div id="controls" class="panel panel-default">
                            <div class="panel-body">
                                <div class="btn-group" data-toggle="buttons">
                                    <label id="fractura" class="btn btn-danger active">
                                        <input type="radio" name="options" id="option1" autocomplete="off" checked>Fractura</label>
                                    <label id="restauracion" class="btn btn-primary">
                                        <input type="radio" name="options" id="option2" autocomplete="off"> Obturación
                                    </label>
                                    <label id="extraccion" class="btn btn-warning">
                                        <input type="radio" name="options" id="option3" autocomplete="off"> Extracción
                                    </label>
                                    <label id="extraer" class="btn btn-warning">
                                        <input type="radio" name="options" id="option4" autocomplete="off"> A Extraer
                                    </label>
                                    <label id="puente" class="btn btn-primary">
                                        <input type="radio" name="options" id="option5" autocomplete="off"> Puente
                                    </label>
                                    <label id="borrar" class="btn btn-default">
                                        <input type="radio" name="options" id="option6" autocomplete="off"> Borrar
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tr" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    </div>
                    <div id="tl" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    </div>
                    <div id="tlr" class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                    </div>
                    <div id="tll" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    </div>
                </div>
                <div class="row">
                    <div id="blr" class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                    </div>
                    <div id="bll" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    </div>
                    <div id="br" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    </div>
                    <div id="bl" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-left">
                                    <div style="height: 20px; width:20px; display:inline-block;" class="click-red"></div> = Fractura/Carie
                                    <br>
                                    <div style="height: 5px; width:20px; display:inline-block;" class="click-red"></div> = Puente Entre Piezas
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
                                    <div style="height: 20px; width:20px; display:inline-block;" class="click-blue"></div> = Obturación
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-right">
                                    <span style="display:inline:block;"> Pieza Extraída</span> = <img style="display:inline:block;" src="images/extraccion.png">
                                    <br> Idicada Para Extracción = <i style="color:red;" class="fa fa-times fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Nombre</th>
						<th>DNI</th>
						<th>Obra Social</th>
						<th>Sangre</th>
						<th>Edad</th>
						<th>Telefono</th>
						<th>Email</th>
					</thead>
					<!-- bucle -->
					
						
					</tr>
					
					
				</table>
				
			</div>
			
			
		</div>


	</div>

<script src="jquery-1.10.2.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="tools/bootstrap/bootstrap.js"></script>
    <script type="text/javascript">
    function replaceAll(find, replace, str) {
        return str.replace(new RegExp(find, 'g'), replace);
    }

    function createOdontogram() {
        var htmlLecheLeft = "",
            htmlLecheRight = "",
            htmlLeft = "",
            htmlRight = "",
            a = 1;
        for (var i = 9 - 1; i >= 1; i--) {
            //Dientes Definitivos Cuandrante Derecho (Superior/Inferior)
            htmlRight += '<div data-name="value" id="dienteindex' + i + '" class="diente">' +
                '<span style="margin-left: 45px; margin-bottom:5px; display: inline-block !important; border-radius: 10px !important;" class="label label-info">index' + i + '</span>' +
                '<div id="tindex' + i + '" class="cuadro click">' +
                '</div>' +
                '<div id="lindex' + i + '" class="cuadro izquierdo click">' +
                '</div>' +
                '<div id="bindex' + i + '" class="cuadro debajo click">' +
                '</div>' +
                '<div id="rindex' + i + '" class="cuadro derecha click click">' +
                '</div>' +
                '<div id="cindex' + i + '" class="centro click">' +
                '</div>' +
                '</div>';
            //Dientes Definitivos Cuandrante Izquierdo (Superior/Inferior)
            htmlLeft += '<div id="dienteindex' + a + '" class="diente">' +
                '<span style="margin-left: 45px; margin-bottom:5px; display: inline-block !important; border-radius: 10px !important;" class="label label-info">index' + a + '</span>' +
                '<div id="tindex' + a + '" class="cuadro click">' +
                '</div>' +
                '<div id="lindex' + a + '" class="cuadro izquierdo click">' +
                '</div>' +
                '<div id="bindex' + a + '" class="cuadro debajo click">' +
                '</div>' +
                '<div id="rindex' + a + '" class="cuadro derecha click click">' +
                '</div>' +
                '<div id="cindex' + a + '" class="centro click">' +
                '</div>' +
                '</div>';
            if (i <= 5) {
                //Dientes Temporales Cuandrante Derecho (Superior/Inferior)
                htmlLecheRight += '<div id="dienteLindex' + i + '" style="left: -25%;" class="diente-leche">' +
                    '<span style="margin-left: 45px; margin-bottom:5px; display: inline-block !important; border-radius: 10px !important;" class="label label-primary">index' + i + '</span>' +
                    '<div id="tlecheindex' + i + '" class="cuadro-leche top-leche click">' +
                    '</div>' +
                    '<div id="llecheindex' + i + '" class="cuadro-leche izquierdo-leche click">' +
                    '</div>' +
                    '<div id="blecheindex' + i + '" class="cuadro-leche debajo-leche click">' +
                    '</div>' +
                    '<div id="rlecheindex' + i + '" class="cuadro-leche derecha-leche click click">' +
                    '</div>' +
                    '<div id="clecheindex' + i + '" class="centro-leche click">' +
                    '</div>' +
                    '</div>';
            }
            if (a < 6) {
                //Dientes Temporales Cuandrante Izquierdo (Superior/Inferior)
                htmlLecheLeft += '<div id="dienteLindex' + a + '" class="diente-leche">' +
                    '<span style="margin-left: 45px; margin-bottom:5px; display: inline-block !important; border-radius: 10px !important;" class="label label-primary">index' + a + '</span>' +
                    '<div id="tlecheindex' + a + '" class="cuadro-leche top-leche click">' +
                    '</div>' +
                    '<div id="llecheindex' + a + '" class="cuadro-leche izquierdo-leche click">' +
                    '</div>' +
                    '<div id="blecheindex' + a + '" class="cuadro-leche debajo-leche click">' +
                    '</div>' +
                    '<div id="rlecheindex' + a + '" class="cuadro-leche derecha-leche click click">' +
                    '</div>' +
                    '<div id="clecheindex' + a + '" class="centro-leche click">' +
                    '</div>' +
                    '</div>';
            }
            a++;
        }
        $("#tr").append(replaceAll('index', '1', htmlRight));
        $("#tl").append(replaceAll('index', '2', htmlLeft));
        $("#tlr").append(replaceAll('index', '5', htmlLecheRight));
        $("#tll").append(replaceAll('index', '6', htmlLecheLeft));


        $("#bl").append(replaceAll('index', '3', htmlLeft));
        $("#br").append(replaceAll('index', '4', htmlRight));
        $("#bll").append(replaceAll('index', '7', htmlLecheLeft));
        $("#blr").append(replaceAll('index', '8', htmlLecheRight));
    }
    var arrayPuente = [];
    $(document).ready(function() {
        createOdontogram();
        $(".click").click(function(event) {
            var control = $("#controls").children().find('.active').attr('id');
            var cuadro = $(this).find("input[name=cuadro]:hidden").val();
            console.log($(this).attr('id'))
            switch (control) {
                case "fractura":
                    if ($(this).hasClass("click-blue")) {
                        $(this).removeClass('click-blue');
                        $(this).addClass('click-red');
                    } else {
                        if ($(this).hasClass("click-red")) {
                            $(this).removeClass('click-red');
                        } else {
                            $(this).addClass('click-red');
                        }
                    }
                    break;
                case "restauracion":
                    if ($(this).hasClass("click-red")) {
                        $(this).removeClass('click-red');
                        $(this).addClass('click-blue');
                    } else {
                        if ($(this).hasClass("click-blue")) {
                            $(this).removeClass('click-blue');
                        } else {
                            $(this).addClass('click-blue');
                        }
                    }
                    break;
                case "extraccion":
                    var dientePosition = $(this).position();
                    console.log($(this))
                    console.log(dientePosition)
                    $(this).parent().children().each(function(index, el) {
                        if ($(el).hasClass("click")) {
                            $(el).addClass('click-delete');
                        }
                    });
                    break;
                case "extraer":
                    var dientePosition = $(this).position();
                    console.log($(this))
                    console.log(dientePosition)
                    $(this).parent().children().each(function(index, el) {
                        if ($(el).hasClass("centro") || $(el).hasClass("centro-leche")) {
                            $(this).parent().append('<i style="color:red;" class="fa fa-times fa-3x fa-fw"></i>');
                            if ($(el).hasClass("centro")) {
                                //console.log($(this).parent().children("i"))
                                $(this).parent().children("i").css({
                                    "position": "absolute",
                                    "top": "24%",
                                    "left": "18.58ex"
                                });
                            } else {
                                $(this).parent().children("i").css({
                                    "position": "absolute",
                                    "top": "21%",
                                    "left": "1.2ex"
                                });
                            }
                            //
                        }
                    });
                    break;
                case "puente":
                    var dientePosition = $(this).offset(), leftPX;
                    console.log($(this)[0].offsetLeft)
                    var noDiente = $(this).parent().children().first().text();
                    var cuadrante = $(this).parent().parent().attr('id');
                    var left = 0,
                        width = 0;
                    if (arrayPuente.length < 1) {
                        $(this).parent().children('.cuadro').css('border-color', 'red');
                        arrayPuente.push({
                            diente: noDiente,
                            cuadrante: cuadrante,
                            left: $(this)[0].offsetLeft,
                            father: null
                        });
                    } else {
                        $(this).parent().children('.cuadro').css('border-color', 'red');
                        arrayPuente.push({
                            diente: noDiente,
                            cuadrante: cuadrante,
                            left: $(this)[0].offsetLeft,
                            father: arrayPuente[0].diente
                        });
                        var diferencia = Math.abs((parseInt(arrayPuente[1].diente) - parseInt(arrayPuente[1].father)));
                        if (diferencia == 1) width = diferencia * 60;
                        else width = diferencia * 50;

                        if(arrayPuente[0].cuadrante == arrayPuente[1].cuadrante) {
                            if(arrayPuente[0].cuadrante == 'tr' || arrayPuente[0].cuadrante == 'tlr' || arrayPuente[0].cuadrante == 'br' || arrayPuente[0].cuadrante == 'blr') {
                                if (arrayPuente[0].diente > arrayPuente[1].diente) {
                                    console.log(arrayPuente[0])
                                    leftPX = (parseInt(arrayPuente[0].left)+10)+"px";
                                }else {
                                    leftPX = (parseInt(arrayPuente[1].left)+10)+"px";
                                    //leftPX = "45px";
                                }
                            }else {
                                if (arrayPuente[0].diente < arrayPuente[1].diente) {
                                    leftPX = "-45px";
                                }else {
                                    leftPX = "45px";
                                }
                            }
                        }
                        console.log(leftPX)
                        /*$(this).parent().append('<div style="z-index: 9999; height: 5px; width:' + width + 'px;" id="puente" class="click-red"></div>');
                        $(this).parent().children().last().css({
                            "position": "absolute",
                            "top": "80px",
                            "left": "50px"
                        });*/
                        $(this).parent().append('<div style="z-index: 9999; height: 5px; width:' + width + 'px;" id="puente" class="click-red"></div>');
                        $(this).parent().children().last().css({
                            "position": "absolute",
                            "top": "80px",
                            "left": leftPX
                        });
                    }

                    break;
                default:
                    console.log("borrar case");
            }
            return false;
        });
        return false;
    });
    </script>
@endsection