<?php

class CAlmanaque
{
	// mes del almanaque
	private $mes;

	// a�o del almanaque
	private $year;

	// nombre delmes
	private $nomMes;

	// lista de nombre de d�as de la semana
	private $nomDias;


	// constructor
	function __construct($pyear, $pmes)
   	{
        $this->year = $pyear;
		$this->mes = $pmes;

      	setlocale( LC_TIME, "sp_SP", "SP");
		$this->nomMes = strftime("%B", mktime(0,0,0,$this->mes));

		// nombre de los d�as de la semana
		// se empieza por un d�a que se sabe que es lunes (el d�a 190)

		for($i=0; $i<7; $i++)
		{
			$this->nomDias[] = strftime("%A", mktime(0,0,0,1,19+$i,2004));
		}


		$lin =  "<table width=\"80%\" cellpadding=\"0\" cellspacing=\"10\">\n";
		$lin .= "<tr>";
		$lin .= "<td valign=\"top\" align=\"center\">";
        $lin .= "<td>";

		// inicia la tabla
		$lin .= "<div class=\"eCMonth\">\n";
		$lin .= "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n";
		$lin .= "<tr><td colspan=\"7\" class=\"eTMonth\">".ucfirst($this->nomMes). "-" . $this->year ."</td></tr>\n";
		$lin .= "<tr>";

		// Ponemos la primera letra del nombre de cada d�a
		for($i=0;$i<7;$i++)
		{
			$lin .= "<td class=\"eDay\">".strtoupper(substr($this->nomDias[$i],0,1))."</td>\n";
		}
		$lin .= "</tr>\n";

		// obtenemos el primer d�a del mes
		$day = mktime(0,0,0,$this->mes,1,$this->year);

		// devuelve el n�mero de d�a contados desde el domingo (0)
		$numeroDay = date("w", $day);

		// se cambia el domingo ser� el n�mero 7
		if($numeroDay == 0) $numeroDay = 7;

		// comienzo del mes
		// la primera semana puede llevar cuadros vac�os
		$lin .= "<tr>";
		for($i=0; $i<$numeroDay-1; $i++)
		{
			$lin .= "<td class=\"eMonth\">&nbsp;</td>\n";
		}

        // Cu�ntos d�as tiene este mes
		$DiasDelMes = cal_days_in_month( CAL_GREGORIAN, $this->mes, $this->year );


        // Completa el almanaque
		for($i=0;$i<$DiasDelMes;$i++)
		{
			$nd = $i+1;

			// se obtiene el n�mero de d�a en formato unix
			$day = mktime(0,0,0,$this->mes, $nd ,$this->year);

			// devuelve el n�mero de d�a contados desde el domingo (0)
			$numeroDay = date("w", $day);

			// se cambia el domingo ser� el n�mero 7
			if($numeroDay == 0) $numeroDay = 7;

            // con d�a 1, se inicia el registro
			if( $numeroDay == 1 )
				$lin .= "<tr>";

            // el d�a vigente se marca de color rojo
            if ( $_GET['fdia'] == $nd)
        		$lin .= "<td class=\"hoy\"><a href=\"inicio.php?dia=".$day."&fyear=".$pyear."&fmes=".$pmes."&fdia=".$nd."\">".$nd."</a></td>\n";
        	else
        		$lin .= "<td class=\"resto\"><a href=\"inicio.php?dia=".$day."&fyear=".$pyear."&fmes=".$pmes."&fdia=".$nd."\">".$nd."</a></td>\n";

            // al llegar al 7mo. d�a se cierra el registro
			if( $numeroDay == 7 )
				$lin .= "</tr>\n";
		}

        // si no se termina en 7mo d�a, se completan las casillas
        // faltantes
		if($numeroDay != 7)
		{
			for($i=$numeroDay+1;$i<=7;$i++)
			{
				$lin .= "<td class=\"eMonth\">&nbsp;</td>\n";
			}
		}

        // cierra la tabla del almanaque
		$lin .= "</tr>\n</table>\n</div></td>\n";

        // se imprime la tabla
		print $lin;


	}


}