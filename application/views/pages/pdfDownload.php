 <!DOCTYPE html>
              <html lang="en">
               <style>  

   

                body {
                 
                  font-family: sans-serif; 


              }

            
                 .grid {  
                     
                 
                    
                 }  

                 .row {  
                     display: inline-flex; 

                      font-family: sans-serif;
                     grid-template-columns: 50% 50%;   
                     
                 }  


                 
            table, th, td {
                border: 0.001px solid #c9c6c2;
                border-collapse: collapse;
        }
        @page {
          margin-left: 0.7cm;
          margin-right: 0.7cm;
          margin-top: 3cm;
        }

        /*Marca de agua*/

        #marcaAgua {
                position: fixed;
                bottom:   -1045px;
                left:     0px;
                /** El ancho y la altura pueden cambiar
                    según las dimensiones de su membrete
                **/
                width:    21.8cm;
                height:   28cm;

                /** Tu marca de agua debe estar detrás de cada contenido **/
                z-index:  -1000;
            }

        #marcaAgua_tituloFinal {
                
               margin-top: -20px;
              

                /** Tu marca de agua debe estar detrás de cada contenido **/
                z-index:  -1000;
            }
                    

     
     </style>   

<body >
<!-- style="background: #edeff0; -->

<?php

// DEBO TRAERME EL NOMBRE DEL ARCHIVO PARA PODER LEERLO Y MOSTRARLO EN LA VISTA PDF, PARA ESO DEBO PASARle EL NOMBRE DEL ARCHIVO DESDE EL CONTROLADOR HACIA LA VISTA PDF, Y LUEGO LEERLO EN LA VISTA PDF PARA MOSTRAR LOS DATOS EN LA VISTA PDF
        $content = utf8_encode(file_get_contents('C:\laragon\www\SAP_LISTA_PRECIOS_SCRIPT/sap_import/'.$elements));

   
        if (strpos($elements, 'PORTADA') !== false) {
            // Eliminem '_PORTADA' del nom per obtenir el nom net de la imatge
            $nombreImagen = str_replace('_PORTADA', '', $elements);
            
            
            // Mostrem el capçal amb la ruta de la imatge
            echo '<header style="margin-top: -70px;"><img src="public/dist/img/' . $nombreImagen . '.jpg" width="742" height="1070" alt=""></header>';
          

        }
 
?>
  <header style=" margin-top: -70;">
    
      <img src="public/dist/img/logo.png" width="240" height="80" alt="">

       <p style="margin-left: 5px; color:#7a7a7a; font-size: 7px;"><b>INVERSIONES LA FUENTE, C.A.</b></p>
       <p style="margin-left: 5px; color:#7a7a7a; font-size: 7px; margin-top: -5px;">AV MARACAY, ZONA C LOCAL NRO S/N ZONA INDUSTRIAL SAN VICENTE, MARACAY ARAGUA ZONA POSTAL 2104</p>
       <p style="margin-left: 5px; color:#7a7a7a; font-size: 7px; margin-top: -5px;">TELFS.: 0243-2373580 / 2373693 / 2373821 FAX: 0243-2373277 / <b>RIF.: J-31440341-9</b></p>
            <p style="margin-left: 5px; color:#7a7a7a; font-size: 7px; margin-top: -5px;">Fuente 04</b></p>
       <br>

     <h3 style="margin-left: 5px; color: #545352; text-align: center;">Lista de Precios<i> "Inversiones La Fuente C.A".</i></h3>
      <p style="font-size: 12px; margin-left: 5px; color: #757879; text-align: center"><strong>Precios al:</strong> <?=  $DateAndTime = date('d-n-Y h:i a', time());?></p>
       <hr style="color: #edeff0;"></hr>
       <br>
       <br>

  </header><!-- /header -->

<div class="grid">


<?php


      
      $xml    = simplexml_load_string($content);

       foreach ($xml as $materials) {

               
             $description = substr($materials->MAKTX, 0, 45);
              echo '

                <div class="row">

                <table>
                        
                          <tbody style="font-size:11px;">
           
                            
                            <tr>

                                <td> <img src= "C:/laragon/www/sap_generator_img/materiales/'.$materials->MATNR.'.jpg" width="130" height="130" ></td>
                              
                                <td  style="width:230px; background:  #f9fdff; color:#3D3837;">
                    
                                <p  style=" font-size: 14px;  margin-left: 0.2cm; color:#346F8D;">'.$materials->MATNR.'</p>
                                <p  style="font-size: 10px; margin-left: 0.2cm; margin-top: -12px"><b>Ref:</b> '.$materials->MFRPN.'</p>
                                <p  style="font-size: 9px; margin-left: 0.2cm; margin-top: -6px">  '.$description.'</p>
                                <p style=" margin-left: 0.2cm; margin-top: -6px"><b>Marca: </b>    '.$materials->WRKST.'</p>   
                                <p style="margin-left: 0.2cm;  margin-top: -10px"> <b>Min. Vta:</b>  '.$materials->AUMNG.' </p>
                                <p style="margin-left: 0.2cm;  margin-top: -10px"> <b>Cant. BTO:</b> '.$materials->BTO.' - <b>Inner:</b>'.$materials->INNER.'</p>
                                <p style="margin-left: 0.2cm;  margin-top: -10px"> <b>Precio:</b>    '.$materials->KBETR.' </p>
                                <p style="margin-left: 0.2cm;  margin-top: -10px"> <b>Precio + IVA:</b> '.$materials->IVA.' </p>
                                
                            </tr>

                 </table>



                            </div>
         

                             <div id="marcaAgua">
                                <img src="public/dist/img/marcas2.jpg" width="800"  alt="" style="margin-left: -30px;">
                             </div>';
                }


           ?>

</div>
                             



  <footer id="marcaAgua_tituloFinal" >
    
   <hr style="color: #edeff0;"><p style="color:#7a7a7a; font-size: 9px; text-align: center;"><i>Desarrollado por el Departamento de Sistemas de <b>"INVERSIONES LA FUENTE, C.A".</b></i></p></hr>
   
  </footer>

</body>
</html>

