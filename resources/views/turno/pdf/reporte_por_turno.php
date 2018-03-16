<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Detalles de Turno</title>
    <link rel="stylesheet" href="style.css" media="all" />
<style>
 
.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #007efc;
  text-decoration: underline;
}

body {
  margin: 30mm 8mm 2mm 30mm;
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #000000;
  background: #FFFFFF;
  font-size: 12px; 
  font-family: "Helvetica Neue", Helvetica, sans-
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;

}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #097bed;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 1.25em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color:#267ed6;
  border-bottom: 1px solid #267ed6;
  white-space: nowrap;  
  font-size: 1.25em;      
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
  background: SeaGreen;
  color: white;
  text-align: right;
}

footer .pagenum:before {
        content: counter(page);
    }
</style>
  
</head>
  <body>
    <header class="clearfix">
      <div id="logo">
          <img src="/resouces/views/turno/turno/pdf/logo.jpg" />
      </div>
      <h1>BRUNA DENT - DETALLE TURNO</h1>
      <div id="company" class="clearfix">
        <div>Bruna Dent</div>
        <div>AV. ROQUE PEREZ<br /> 8020</div>
        <div>3764568959</div>
        <div><a href="mailto:info@bruna.com">info@bruna.com</a></div>
      </div>
      
    </header>
    <main>
      <table class="table table-bordered">
                  <thead>
                     <tr>
                      <th style="width: 40px">Fecha</th>
                      <th style="width: 40px">Hora</th>
                      <th style="width: 40px">Profesional</th>
                      <th style="width: 40px">Paciente</th>
                      <th style="width: 40px">Consultorio</th>
                    </tr>
                  </thead>
                    <tbody>
                  <?php ?>
                  <?php $originalDate = $turnop->fecha;
                  $newDate = date("d-m-Y", strtotime($originalDate)); ?>
                  
                 
                    <tr>
                      <td style="width: 10px" ><?= $newDate; ?></td>
                      <td style="width: 10px" ><?= $turnop->hora_inicio; ?></td>
                      <td style="width: 10px" ><?= $turnop->profesional; ?></td>
                      <td style="width: 10px" ><?= $turnop->paciente; ?></td>
                      <td style="width: 10px" ><?= $turnop->idconsultorio; ?></td>
                    </tr>
                    
                    <?php ?>
                    
                  </tbody>

                  </table>
      <div id="notices">
        <div>AVISO:</div>
        <div class="notice">El turno se puede cancelar o modificar con previo aviso </div>
      </div>
    </main>
    <footer>
      Fecha y Hora de emision <?=$date;?>
      <div>Pag: <span class="pagenum"> </div>
    </footer>
  </body>
</html>