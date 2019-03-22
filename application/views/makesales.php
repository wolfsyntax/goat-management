<?php  
 function fetch_sales()  
 {  
      $output = '';  
      $conn = mysqli_connect("localhost", "dmoc2018", "dmoc2018", "mgmf");  
      $sql = "SELECT * FROM goat_profile ";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["eartag_id"].'</td>  
                          <td>'.$row["eartag_color"].'</td>  
                          <td>'.$row["nickname"].'</td>
                          <td>'.$row["gender"].'</td> 
                          <td>'.$row["body_color"].'</td> 
                          <td>'.$row["category"].'</td>    
                          
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["generate_pdf"]))  
 {  
     
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h2 align="center">Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP</h2><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="15%">Eartag_Id</th>  
                <th width="20%">Eartag_Color</th>  
                <th width="15%">Nickname</th> 
                <th width="15%">Gender</th>   
                <th width="15%">BodyColor</th>
                <th width="15%">Category</th>  
                

           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('sample.pdf', 'I');  
 }  
 ?>  


 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>SoftAOX | Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br />
           <div class="container">  
                <h4 align="center"> MGM Farm Reports</h4><br />  
                
                <div class="table-responsive">  
                	<div class="col-md-12" align="right">
                     <form method="post">  
                          <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />  
                     </form>  
                     </div>
                     <br/>
                     <br/>
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">Eartag ID</th>  
                               <th width="20%">Eartag_Color</th>  
                               <th width="15%">Nickname</th>
                               <th width="15%">Gender</th>  
                               <th width="15%">BodyColor</th>
                               <th width="15%">Category</th>      
                               

                          </tr>  
                     <?php  
                     echo fetch_sales();  
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
</html>  