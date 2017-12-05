<?php
require("../controller/ControladorOdontograma.php");
$controladorOdontograma=new ControladorOdontograma();
if(isset($_POST['codigoPaciente']))
{
	$arrayTOdontograma=$controladorOdontograma->consultarUltimoTOdontograma($_POST['codigoPaciente']);
}
?>
<div>
	<input type="hidden" id="hiddenEstados" value="<?=$_POST['estados']==''?count($arrayTOdontograma)>0?$arrayTOdontograma[0]->getEstados():'':$_POST['estados']?>">
	<br>
	<section id="odontogramaSuperior" class="textAlignCenter">
		<input type="text" id="txtD18" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD17" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD16" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD15" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD14" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD13" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD12" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD11" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		|-|
		<input type="text" id="txtD21" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD22" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD23" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD24" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD25" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD26" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD27" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD28" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly"><hr><br>
		
		<div class="diente" id="D18"><div id="D18-C1"></div><div id="D18-C2"></div><div id="D18-C3"></div><div id="D18-C4"></div><div id="D18-C5"></div><div onclick="seleccionarDiente('D18');">D18</div></div>
		<div class="diente" id="D17"><div id="D17-C1"></div><div id="D17-C2"></div><div id="D17-C3"></div><div id="D17-C4"></div><div id="D17-C5"></div><div onclick="seleccionarDiente('D17');">D17</div></div>
		<div class="diente" id="D16"><div id="D16-C1"></div><div id="D16-C2"></div><div id="D16-C3"></div><div id="D16-C4"></div><div id="D16-C5"></div><div onclick="seleccionarDiente('D16');">D16</div></div>
		<div class="diente" id="D15"><div id="D15-C1"></div><div id="D15-C2"></div><div id="D15-C3"></div><div id="D15-C4"></div><div id="D15-C5"></div><div onclick="seleccionarDiente('D15');">D15</div></div>
		<div class="diente" id="D14"><div id="D14-C1"></div><div id="D14-C2"></div><div id="D14-C3"></div><div id="D14-C4"></div><div id="D14-C5"></div><div onclick="seleccionarDiente('D14');">D14</div></div>
		<div class="diente" id="D13"><div id="D13-C1"></div><div id="D13-C2"></div><div id="D13-C3"></div><div id="D13-C4"></div><div id="D13-C5"></div><div onclick="seleccionarDiente('D13');">D13</div></div>
		<div class="diente" id="D12"><div id="D12-C1"></div><div id="D12-C2"></div><div id="D12-C3"></div><div id="D12-C4"></div><div id="D12-C5"></div><div onclick="seleccionarDiente('D12');">D12</div></div>
		<div class="diente" id="D11"><div id="D11-C1"></div><div id="D11-C2"></div><div id="D11-C3"></div><div id="D11-C4"></div><div id="D11-C5"></div><div onclick="seleccionarDiente('D11');">D11</div></div>
		|-|
		<div class="diente" id="D21"><div id="D21-C1"></div><div id="D21-C2"></div><div id="D21-C3"></div><div id="D21-C4"></div><div id="D21-C5"></div><div onclick="seleccionarDiente('D21');">D21</div></div>
		<div class="diente" id="D22"><div id="D22-C1"></div><div id="D22-C2"></div><div id="D22-C3"></div><div id="D22-C4"></div><div id="D22-C5"></div><div onclick="seleccionarDiente('D22');">D22</div></div>
		<div class="diente" id="D23"><div id="D23-C1"></div><div id="D23-C2"></div><div id="D23-C3"></div><div id="D23-C4"></div><div id="D23-C5"></div><div onclick="seleccionarDiente('D23');">D23</div></div>
		<div class="diente" id="D24"><div id="D24-C1"></div><div id="D24-C2"></div><div id="D24-C3"></div><div id="D24-C4"></div><div id="D24-C5"></div><div onclick="seleccionarDiente('D24');">D24</div></div>
		<div class="diente" id="D25"><div id="D25-C1"></div><div id="D25-C2"></div><div id="D25-C3"></div><div id="D25-C4"></div><div id="D25-C5"></div><div onclick="seleccionarDiente('D25');">D25</div></div>
		<div class="diente" id="D26"><div id="D26-C1"></div><div id="D26-C2"></div><div id="D26-C3"></div><div id="D26-C4"></div><div id="D26-C5"></div><div onclick="seleccionarDiente('D26');">D26</div></div>
		<div class="diente" id="D27"><div id="D27-C1"></div><div id="D27-C2"></div><div id="D27-C3"></div><div id="D27-C4"></div><div id="D27-C5"></div><div onclick="seleccionarDiente('D27');">D27</div></div>
		<div class="diente" id="D28"><div id="D28-C1"></div><div id="D28-C2"></div><div id="D28-C3"></div><div id="D28-C4"></div><div id="D28-C5"></div><div onclick="seleccionarDiente('D28');">D28</div></div><br><br><br><hr><br>
		
		<input type="text" id="txtD55" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD54" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD53" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD52" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD51" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		|-|
		<input type="text" id="txtD61" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD62" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD63" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD64" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD65" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly"><hr><br>

		<div class="diente" id="D55"><div id="D55-C1"></div><div id="D55-C2"></div><div id="D55-C3"></div><div id="D55-C4"></div><div id="D55-C5"></div><div onclick="seleccionarDiente('D55');">D55</div></div>
		<div class="diente" id="D54"><div id="D54-C1"></div><div id="D54-C2"></div><div id="D54-C3"></div><div id="D54-C4"></div><div id="D54-C5"></div><div onclick="seleccionarDiente('D54');">D54</div></div>
		<div class="diente" id="D53"><div id="D53-C1"></div><div id="D53-C2"></div><div id="D53-C3"></div><div id="D53-C4"></div><div id="D53-C5"></div><div onclick="seleccionarDiente('D53');">D53</div></div>
		<div class="diente" id="D52"><div id="D52-C1"></div><div id="D52-C2"></div><div id="D52-C3"></div><div id="D52-C4"></div><div id="D52-C5"></div><div onclick="seleccionarDiente('D52');">D52</div></div>
		<div class="diente" id="D51"><div id="D51-C1"></div><div id="D51-C2"></div><div id="D51-C3"></div><div id="D51-C4"></div><div id="D51-C5"></div><div onclick="seleccionarDiente('D51');">D51</div></div>
		|-|
		<div class="diente" id="D61"><div id="D61-C1"></div><div id="D61-C2"></div><div id="D61-C3"></div><div id="D61-C4"></div><div id="D61-C5"></div><div onclick="seleccionarDiente('D61');">D61</div></div>
		<div class="diente" id="D62"><div id="D62-C1"></div><div id="D62-C2"></div><div id="D62-C3"></div><div id="D62-C4"></div><div id="D62-C5"></div><div onclick="seleccionarDiente('D62');">D62</div></div>
		<div class="diente" id="D63"><div id="D63-C1"></div><div id="D63-C2"></div><div id="D63-C3"></div><div id="D63-C4"></div><div id="D63-C5"></div><div onclick="seleccionarDiente('D63');">D63</div></div>
		<div class="diente" id="D64"><div id="D64-C1"></div><div id="D64-C2"></div><div id="D64-C3"></div><div id="D64-C4"></div><div id="D64-C5"></div><div onclick="seleccionarDiente('D64');">D64</div></div>
		<div class="diente" id="D65"><div id="D65-C1"></div><div id="D65-C2"></div><div id="D65-C3"></div><div id="D65-C4"></div><div id="D65-C5"></div><div onclick="seleccionarDiente('D65');">D65</div></div>
	</section>
	<br><br><br>
	<section id="odontogramaInferior" class="textAlignCenter">
		<div class="diente" id="D85"><div id="D85-C1"></div><div id="D85-C2"></div><div id="D85-C3"></div><div id="D85-C4"></div><div id="D85-C5"></div><div onclick="seleccionarDiente('D85');">D85</div></div>
		<div class="diente" id="D84"><div id="D84-C1"></div><div id="D84-C2"></div><div id="D84-C3"></div><div id="D84-C4"></div><div id="D84-C5"></div><div onclick="seleccionarDiente('D84');">D84</div></div>
		<div class="diente" id="D83"><div id="D83-C1"></div><div id="D83-C2"></div><div id="D83-C3"></div><div id="D83-C4"></div><div id="D83-C5"></div><div onclick="seleccionarDiente('D83');">D83</div></div>
		<div class="diente" id="D82"><div id="D82-C1"></div><div id="D82-C2"></div><div id="D82-C3"></div><div id="D82-C4"></div><div id="D82-C5"></div><div onclick="seleccionarDiente('D82');">D82</div></div>
		<div class="diente" id="D81"><div id="D81-C1"></div><div id="D81-C2"></div><div id="D81-C3"></div><div id="D81-C4"></div><div id="D81-C5"></div><div onclick="seleccionarDiente('D81');">D81</div></div>
		|-|
		<div class="diente" id="D71"><div id="D71-C1"></div><div id="D71-C2"></div><div id="D71-C3"></div><div id="D71-C4"></div><div id="D71-C5"></div><div onclick="seleccionarDiente('D71');">D71</div></div>
		<div class="diente" id="D72"><div id="D72-C1"></div><div id="D72-C2"></div><div id="D72-C3"></div><div id="D72-C4"></div><div id="D72-C5"></div><div onclick="seleccionarDiente('D72');">D72</div></div>
		<div class="diente" id="D73"><div id="D73-C1"></div><div id="D73-C2"></div><div id="D73-C3"></div><div id="D73-C4"></div><div id="D73-C5"></div><div onclick="seleccionarDiente('D73');">D73</div></div>
		<div class="diente" id="D74"><div id="D74-C1"></div><div id="D74-C2"></div><div id="D74-C3"></div><div id="D74-C4"></div><div id="D74-C5"></div><div onclick="seleccionarDiente('D74');">D74</div></div>
		<div class="diente" id="D75"><div id="D75-C1"></div><div id="D75-C2"></div><div id="D75-C3"></div><div id="D75-C4"></div><div id="D75-C5"></div><div onclick="seleccionarDiente('D75');">D75</div></div><br><br><br><hr>

		<input type="text" id="txtD85" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD84" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD83" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD82" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD81" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		|-|
		<input type="text" id="txtD71" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD72" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD73" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD74" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD75" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly"><br><br><br><hr><br>

		<div class="diente" id="D48"><div id="D48-C1"></div><div id="D48-C2"></div><div id="D48-C3"></div><div id="D48-C4"></div><div id="D48-C5"></div><div onclick="seleccionarDiente('D48');">D48</div></div>
		<div class="diente" id="D47"><div id="D47-C1"></div><div id="D47-C2"></div><div id="D47-C3"></div><div id="D47-C4"></div><div id="D47-C5"></div><div onclick="seleccionarDiente('D47');">D47</div></div>
		<div class="diente" id="D46"><div id="D46-C1"></div><div id="D46-C2"></div><div id="D46-C3"></div><div id="D46-C4"></div><div id="D46-C5"></div><div onclick="seleccionarDiente('D46');">D46</div></div>
		<div class="diente" id="D45"><div id="D45-C1"></div><div id="D45-C2"></div><div id="D45-C3"></div><div id="D45-C4"></div><div id="D45-C5"></div><div onclick="seleccionarDiente('D45');">D45</div></div>
		<div class="diente" id="D44"><div id="D44-C1"></div><div id="D44-C2"></div><div id="D44-C3"></div><div id="D44-C4"></div><div id="D44-C5"></div><div onclick="seleccionarDiente('D44');">D44</div></div>
		<div class="diente" id="D43"><div id="D43-C1"></div><div id="D43-C2"></div><div id="D43-C3"></div><div id="D43-C4"></div><div id="D43-C5"></div><div onclick="seleccionarDiente('D43');">D43</div></div>
		<div class="diente" id="D42"><div id="D42-C1"></div><div id="D42-C2"></div><div id="D42-C3"></div><div id="D42-C4"></div><div id="D42-C5"></div><div onclick="seleccionarDiente('D42');">D42</div></div>
		<div class="diente" id="D41"><div id="D41-C1"></div><div id="D41-C2"></div><div id="D41-C3"></div><div id="D41-C4"></div><div id="D41-C5"></div><div onclick="seleccionarDiente('D41');">D41</div></div>
		|-|
		<div class="diente" id="D31"><div id="D31-C1"></div><div id="D31-C2"></div><div id="D31-C3"></div><div id="D31-C4"></div><div id="D31-C5"></div><div onclick="seleccionarDiente('D31');">D31</div></div>
		<div class="diente" id="D32"><div id="D32-C1"></div><div id="D32-C2"></div><div id="D32-C3"></div><div id="D32-C4"></div><div id="D32-C5"></div><div onclick="seleccionarDiente('D32');">D32</div></div>
		<div class="diente" id="D33"><div id="D33-C1"></div><div id="D33-C2"></div><div id="D33-C3"></div><div id="D33-C4"></div><div id="D33-C5"></div><div onclick="seleccionarDiente('D33');">D33</div></div>
		<div class="diente" id="D34"><div id="D34-C1"></div><div id="D34-C2"></div><div id="D34-C3"></div><div id="D34-C4"></div><div id="D34-C5"></div><div onclick="seleccionarDiente('D34');">D34</div></div>
		<div class="diente" id="D35"><div id="D35-C1"></div><div id="D35-C2"></div><div id="D35-C3"></div><div id="D35-C4"></div><div id="D35-C5"></div><div onclick="seleccionarDiente('D35');">D35</div></div>
		<div class="diente" id="D36"><div id="D36-C1"></div><div id="D36-C2"></div><div id="D36-C3"></div><div id="D36-C4"></div><div id="D36-C5"></div><div onclick="seleccionarDiente('D36');">D36</div></div>
		<div class="diente" id="D37"><div id="D37-C1"></div><div id="D37-C2"></div><div id="D37-C3"></div><div id="D37-C4"></div><div id="D37-C5"></div><div onclick="seleccionarDiente('D37');">D37</div></div>
		<div class="diente" id="D38"><div id="D38-C1"></div><div id="D38-C2"></div><div id="D38-C3"></div><div id="D38-C4"></div><div id="D38-C5"></div><div onclick="seleccionarDiente('D38');">D38</div></div><br><br><br><hr>
		
		<input type="text" id="txtD48" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD47" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD46" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD45" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD44" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD43" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD42" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD41" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		|-|
		<input type="text" id="txtD31" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD32" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD33" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD34" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD35" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD36" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD37" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
		<input type="text" id="txtD38" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
	</section>
	<br><br>
</div>
<script src="../public/js/jsTratamiento.js"></script>