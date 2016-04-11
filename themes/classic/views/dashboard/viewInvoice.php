<?php
  require('././././protected/vendors/fpdf/fpdf.php');
  // CVarDumper::dump($invoiceArray,10,1); die;

	$pdf = new FPDF();
	$pdf->AddPage('P',array(150,150));
	/*Row A*/
	$pdf->SetFont('Times','',12);
	$pdf->SetFont('Arial','B',15);
	$pdf->SetTextColor(126,206,202);
	$pdf->Cell(50,10,'VenturePact',0,0,'L');
	$pdf->Ln(6);

	/*Row B*/
	$pdf->SetTextColor(42,42,42);
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(1,10,'3rd Floor, 79 Madison Ave,');

	$pdf->Cell(115.6,10,'Invoice Id: '.$invoiceArray->id,0,0,'R');
	$pdf->Ln(3);

	/*Row C*/
	$pdf->SetTextColor(42,42,42);
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(1,10,'New York, NY 10016, United States');

	$pdf->Cell(130,10,'Invoice Date: '.explode(' ',$invoiceArray->add_date)[0],0,0,'R');
	$pdf->Ln(10);

	/*Row D*/
	$pdf->SetTextColor(42,42,42);
	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(1,10,'Bill For: ');
	$pdf->Ln(3);
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(1,10,$invoiceArray->product->name);
	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(1,10,'By: ');
	$pdf->Ln(3);
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(1,10,$invoiceArray->product->company_name);
	$pdf->Ln(3);
	$pdf->Cell(1,10,$invoiceArray->product->founding_country);
	$pdf->Ln(20);


	$pdf->SetTextColor(42,42,42);
	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(100,10,'Clicks Count',1,0,'C');

	$pdf->Cell(30,10,'Amount'.$invoiceArray->id,1,0,'C');
	$pdf->Ln(10);


	$pdf->SetTextColor(42,42,42);
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(100,10,$invoiceArray->click_count,1,0,'C');

	$pdf->Cell(30,10,'$'.$invoiceArray->amount,1,0,'C');
	$pdf->Ln(10);

	$pdf->SetTextColor(42,42,42);
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(100,10,'Total',1,0,'R');

	$pdf->Cell(30,10,'$'.$invoiceArray->amount,1,0,'C');
	$pdf->Ln(10);

	if($invoiceArray->payment_status) {
		$pdf->SetFont('Times','',12);
		$pdf->SetFont('Arial','B',15);
		$pdf->SetTextColor(126,206,202);
		$pdf->Cell(130,10,'PAID',0,0,'R');
	} else {
		$pdf->SetFont('Times','',12);
		$pdf->SetFont('Arial','B',15);
		$pdf->SetTextColor(255,0,0);
		$pdf->Cell(130,10,'UNPAID',0,0,'R');
	}

	$pdf->SetY(109);
	$pdf->SetTextColor(42,42,42);
	$pdf->SetFont('Arial','I',6);
	$pdf->Cell(0,10,'Please note that the invoices are generated on monthly basis. You can change the billing cycle of your product from Product Settings page.',0,0,'C');
	$pdf->SetFont('Arial','B',6);
	$pdf->Ln(5);
	$pdf->Cell(0,10,'Thank You for having business with us.',0,0,'C');
	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',8);
	$pdf->SetTextColor(126,206,202);
	$pdf->Cell(0,10,'Regards Team VenturePact',0,0,'C');
	$pdf->Output();
?>