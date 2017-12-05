function hoverTxtDiente(idTxtDiente)
{
	var idDiente=idTxtDiente.substring(3, 6);
	var css=
	{
		"box-shadow": "0px 0px 10px blue"
	}
	$("#"+idDiente).css(css);
}

function outTxtDiente(idTxtDiente)
{
	var idDiente=idTxtDiente.substring(3, 6);
	var css=
	{
		"box-shadow": "none"
	}
	$("#"+idDiente).css(css);
}

function seleccionarCara(idCaraDiente)
{
	$("#txtCaraTratada").val(idCaraDiente);
}

function seleccionarDiente(idDiente)
{
	$("#txtIdentificadorDienteGeneral").val(idDiente);
	$("#txtDienteTratado").val(idDiente);
}

function agregarTratamiento(diente, cara, estado)
{
	if(diente=="" || cara=="")
	{
		alert("Debe seleccionar el diente y la cara de dicho diente para agregar un Tratamiento");
		return;
	}

	var agregarFila=true;

	$("#tablaTratamiento").find("tr").each(function(index, elemento) 
    {
    	var dienteAsignado;

    	if(!agregarFila)
    	{
    		return false;
    	}

        $(elemento).find("td").each(function(index2, elemento2)
        {
        	if(index2==0)
        	{
        		dienteAsignado=$(elemento2).text();
        	}
        	switch(index2)
        	{
        		case 2:
        			var partesEstado=$(elemento2).text().split("-");
        			if(partesEstado[0]!="15" && partesEstado[0]!="16" && partesEstado[0]!="17" && partesEstado[0]!="18")
        			{
        				if((partesEstado[1]==estado.split("-")[1]) && dienteAsignado==diente)
        				{
        					alert("El tratamiento ya fue asignado");
        					agregarFila=false;
        				}
        			}
        			break;
        	}
        });
    });

	if(agregarFila)
	{
		var filaHtml="<tr><td>"+diente+"</td><td>"+cara+"<td>"+estado+"</td></td><td class='widthEditarTable'><input type='button' class='button2' value='Eliminar' onclick='quitarTratamiento(this);'></td></tr>";
		$("#tablaTratamiento > tbody").append(filaHtml);
		$("#divTratamiento").scrollTop($("#tablaTratamiento").height());
	}
}

function quitarTratamiento(elemento)
{
	$(elemento).parent().parent().remove();
}

function recuperarDatosTratamiento(callback)
{
	var codigoPaciente;
	var estados="";
	var descripcion;

	codigoPaciente=$("#txtCodigoPaciente").val();

	$("#tablaTratamiento").find("tr").each(function(index, elemento) 
    {
        $(elemento).find("td").each(function(index2, elemento2)
        {
        	estados+=$(elemento2).text()+"_";
        });
    });

    descripcion=$("#txtDescripcion").val();
    estados=estados.substring(0, estados.length-2);

    callback(codigoPaciente, estados, descripcion);
}

function guardarTratamiento()
{
	recuperarDatosTratamiento(function(codigoPaciente, estados, descripcion)
	{
		if(estados=="")
		{
			alert("Ud. debe agregar algún Tratamiento");
			return;
		}
		$.post("registrar.php",
	    {
	    	codigoPaciente: codigoPaciente,
	    	estados: estados,
	    	descripcion: descripcion
	    }, 
	    function(pagina)
	    {
	    	limpiarDatosTratamiento();
	    	$("#seccionPaginaAjax").html(pagina);
	    	setTimeout(function()
	    	{
	    		$("#seccionPaginaAjax").html("");
	    	}, 7000);
	    }).done(function(){
	    	cargarTratamientos('seccionTablaTratamientos', 'verodontograma.php', codigoPaciente); 
	    	cargarDientes('seccionDientes', 'dientes.php', '', codigoPaciente);
	    });

	});
}

function limpiarDatosTratamiento()
{
	$("#txtIdentificadorDienteGeneral").val("DXX");
	$("#txtDienteTratado").val("");
	$("#txtCaraTratada").val("");
	$("#txtDescripcion").val("");
	$("#tablaTratamiento").find("tr").each(function(index, row)
	{
		$(row).remove();
	});
}

function cargarDientes(idSeccion, url, estados, codigoPaciente)
{
	$.ajax(
    {
        url: url,
        type: "POST",
        data: {codigoPaciente: codigoPaciente, estados: estados},
        cache: true
    }).done(function(pagina) 
    {
        $("#"+idSeccion).html(pagina);
    });
}

function cargarTratamientos(idSeccion, url, codigoPaciente)
{
	$.ajax(
    {
        url: url,
        type: "POST",
        data: {codigoPaciente: codigoPaciente},
        cache: true
    }).done(function(pagina) 
    {
        $("#"+idSeccion).html(pagina);
    });
}

function prepararImpresion()
{
	$("body #seccionTablaTratamientos").css({"display": "none"});
	$("body #seccionRegistrarTratamiento").css({"display": "none"});
}

function terminarImpresion()
{
	$("body #seccionTablaTratamientos").css({"display": "inline-block"});
	$("body #seccionRegistrarTratamiento").css({"display": "inline-block"});
}