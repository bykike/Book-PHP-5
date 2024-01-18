<?php
  class Car {
      var $driver;
      // constructor de la clase
      function Car() {
      }
      //  devuelve el nombre de la clase
      function getClassName() {
         return 'Car';
      }
      function getDriver() {
         return $this->driver;
      }
         function setDriver($driver) {
         $this->driver = $driver;
      }
        function drive($speed) {
          echo($this->getDriver() . " está conduciendo a $speed km/ph");
      }
   }
?>

