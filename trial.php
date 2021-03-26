<?php  

 function fetch_data()  
 {
		 
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "php-kuiz");  

	  if (isset($_GET['n'])) {
		  
      $sql = "SELECT * FROM questions ORDER BY qno ASC";  
	  }
	  else
	  {
		        $sql = "SELECT * FROM gcpquestions ORDER BY qno ASC";  

	  }
	  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '		<ul style="list-style-type:none;">
                         <li><b>'.$row["qno"].' .  '.$row["question"].'</b></li>  
                          <li>A.'.$row["ans1"].'</li>  
                          <li>B.'.$row["ans2"].'</li>
							<li>C.'.$row["ans3"].'</li>
							<li>D.'.$row["ans4"].'</li>
							<li><b>Correct Answer :</b> '.$row["correct_answer"].'</li>
						</ul>
                          ';  
      }  
      return $output;  
 }  
 
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Quiz Answers");  
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
      
      $content .= fetch_data();  
     // $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
 
    
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br />
           <div class="container">  
                <h4 align="center"> Quiz Answers</h4><br />  
                <div class="table-responsive">  
                    <div class="col-md-12" align="right">
                     </div>
                     <br/>
                     <br/>
                     <?php  
                     fetch_data();  
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
</html>

