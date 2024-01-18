<HTML>
	<HEAD>
		<TITLE>Definición de matrices</TITLE>
	</HEAD>
	<BODY>	
		<CENTER><H3>Uso del constructor array() (ejemplo c502.php)</H3> 
		<?php 
		
			$Estad = array(1=>"Alemania", "Austria",5=> "Bélgica");
			 
		?> 
		<TABLE BORDER="1" CELLPADDING="1" CELLSPACING="2">
			<TR ALIGN="center" >
				<TD>Elemento</TD>
				<?php
					for ($ind=0;$ind<count($Estad);$ind++)
						echo"<TD>$ind</TD>";
				?>
			</TR>
			<TR ALIGN="center" >
				<TD>Valor</TD>
				<?php
		   			for ($ind=0;$ind<count($Estad);$ind++)
			  			echo "<TD> $Estad[$ind] </TD>";
				?>		 
			</TR>
		</TABLE>
	</BODY>
</HTML>