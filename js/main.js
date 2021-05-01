// FUNCIÓN PARA EDITAR UNA CUENTA Y LLENAR EL MODAL
function editar(boton)
{
    var id = boton.value;
    
    var ref_mod = document.getElementById("referencia_mod");
    var desc_mod = document.getElementById("descripcion_mod");

    $.ajax({
        type: "POST",
        url: "php/search.php",
        data:
        {
            id : id
        },
        success: function(r){

            console.log(r);

            r = JSON.parse(r);

            ref_mod.value = String(r.referencia);
            desc_mod.value = String(r.descripcion);
            id_mod.value = String(r.id);
        }
    })
}

// FUNCIÓN PARA AGREGAR MÁS CUENTAS EN DEBE O HABER
function duplicate(lado)
{
    if(lado == "d")
    {
        var div = document.getElementById("debe");
        var rubroDebe = document.createElement("div");
        rubroDebe.setAttribute("class", "rubroDebe");
        var row = document.createElement("div");
        row.setAttribute("class", "row");
        var grid1 = document.createElement("div");
        grid1.setAttribute("class", "col-12 col-sm-12 col-md-7 col-lg-7");
        var select = document.createElement("select");
        select.setAttribute("class", "form-control selectDebe");
        var grid2 = document.createElement("div");
        grid2.setAttribute("class", "col-12 col-sm-12 col-md-5 col-lg-5");
        var input = document.createElement("input");
        input.setAttribute("class", "form-control montoDebe");
        input.setAttribute("type", "number");
        input.setAttribute("placeholder", "Monto Q.");

        input.addEventListener('change' , sumarDebe) ;

        grid1.appendChild(select);
        grid2.appendChild(input);
        row.appendChild(grid1);
        row.appendChild(grid2);
        rubroDebe.appendChild(row);
        div.appendChild(rubroDebe);

        $("select:empty").load("php/opciones.php");
    }
    else
    {
        var div = document.getElementById("haber");
        // var elemento = document.getElementsByClassName("rubroHaber")[0].outerHTML;
        // console.log(elemento);
        // div.innerHTML += elemento;

        var rubroHaber = document.createElement("div");
        rubroHaber.setAttribute("class", "rubroHaber");
        var row = document.createElement("div");
        row.setAttribute("class", "row");
        var grid1 = document.createElement("div");
        grid1.setAttribute("class", "col-12 col-sm-12 col-md-7 col-lg-7");
        var select = document.createElement("select");
        select.setAttribute("class", "form-control selectHaber");
        var grid2 = document.createElement("div");
        grid2.setAttribute("class", "col-12 col-sm-12 col-md-5 col-lg-5");
        var input = document.createElement("input");
        input.setAttribute("class", "form-control montoHaber");
        input.setAttribute("type", "number");
        input.setAttribute("placeholder", "Monto Q.");

        input.addEventListener('change' , sumarHaber) ;

        grid1.appendChild(select);
        grid2.appendChild(input);
        row.appendChild(grid1);
        row.appendChild(grid2);
        rubroHaber.appendChild(row);
        div.appendChild(rubroHaber);

        $("select:empty").load("php/opciones.php");
    }
}

// FUNCIÓN PARA VALIDAR UNA POLIZA Y MANDAR A LLAMAR PHP PARA GUARDAR EN BD
function guardar()
{
    var error = document.getElementById("error");
    error.setAttribute("class", "");
    error.setAttribute("role", "");
    error.innerHTML = "";
    
    var debeSelectValues = [];
    var debeMontoValues = [];
    var haberSelectValues = [];
    var haberMontoValues = [];

    var debeSelect = document.getElementsByClassName("selectDebe");
    var debeMonto = document.getElementsByClassName("montoDebe");
    var haberSelect = document.getElementsByClassName("selectHaber");
    var haberMonto = document.getElementsByClassName("montoHaber");

    var no = document.getElementById("no").value;
    var fecha = document.getElementById("fecha").value;
    var concepto = document.getElementById("concepto").value;

    var sumaDebe = document.getElementById("totalDebe").value;
    var sumaHaber = document.getElementById("totalHaber").value;

    var validador = 1;
    var valor = 0;

    if((no == "") || (fecha == ""))
    {
        validador = -1;
    }

    for(var i = 0; i < debeSelect.length; i++)
    {
        valor = debeSelect[i].value;
        if(valor == "Seleccione una cuenta")
        {
            validador = -1;
            break;
        }
        else
        {
            debeSelectValues.push(valor);
        }

        valor = debeMonto[i].value;
        if(valor == "")
        {
            validador = -1;
            break;
        }
        else
        {
            debeMontoValues.push(valor);
        }
    }

    for(var i = 0; i < haberSelect.length; i++)
    {
        valor = haberSelect[i].value;
        if(valor == "Seleccione una cuenta")
        {
            validador = -1;
            break;
        }
        else
        {
            haberSelectValues.push(valor);
        }

        valor = haberMonto[i].value;
        if(valor == "")
        {
            validador = -1;
            break;
        }
        else
        {
            haberMontoValues.push(valor);
        }
    }

    if(validador == -1)
    {
        error.setAttribute("class", "alert alert-danger");
        error.setAttribute("role", "alert");
        error.innerHTML = "Debe llenar todos los campos";
    }
    else if(sumaDebe.value != sumaHaber.value)
    {
        error.setAttribute("class", "alert alert-danger");
        error.setAttribute("role", "alert");
        error.innerHTML = "El debe y el haber deben sumar lo mismo";
    }
    else
    {
        $.ajax({
            url: "php/guardar.php",
            method: "POST",
            data: {
              no : no,
              fecha : fecha,
              debeSelectValues : debeSelectValues,
              haberSelectValues : haberSelectValues,
              debeMontoValues : debeMontoValues,
              haberMontoValues : haberMontoValues,
              concepto : concepto,
              sumaDebe : sumaDebe,
              sumaHaber : sumaHaber
            },
            success: function( result ) {
              if(result == 1)
              {
                  alert("Guardado existosamente");
                  window.location.href='polizas.php';
              }
              else
              {
                console.log(result);
                alert("Hubo un error, inténtalo de nuevo");
                window.location.href='polizas.php';
              }
            }
          });
          console.log(debeSelectValues);
          console.log(haberSelectValues);
          console.log(debeMontoValues);
          console.log(haberMontoValues);
    }

}
