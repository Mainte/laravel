<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use FPDF;

class PDFController extends Controller
{
	private $wp; 							//Larghezza pagina
	private $wwp;							//Larghezza pagina utilizzabile
    private $hp; 							//Altezzo pagina
    private $ml; 							//Margine sinistro
    private $mr; 							//Margine destro
    private $mt; 							//Margine alto
    private $mb; 							//Margine basso
    private $hh; 							//Altezza header altre pagine
    private $hf; 							//Altezza footer altre pagine
    private $nome_pdf;						//Nome del PDF

    private $i;								//Indice per test

   
	public function __construct(){
        $this->middleware('auth');
    }

    public function SetParametri(){
    	$this->wp=210; 
		$this->hp=297; 
		$this->ml=20;
		$this->mr=20;
		$this->mt=20;
		$this->mb=20;
		$this->hh=40;
		$this->hf=20;
		$this->i=0;
    }

    public function SetLayout(){
		FPDF::AliasNbPages();
        FPDF::SetDisplayMode(100);
        FPDF::SetMargins($this->ml, $this->mt, $this->mr);
        FPDF::SetAutoPageBreak('on', $this->mb+$this->hf);  
        FPDF::SetDrawColor(0, 0, 0);
        FPDF::SetTextColor(0, 0, 0);
        FPDF::SetFillColor(190, 190, 190);
    }

    public function SetFonts(){
        FPDF::AddFont('OPENSANS300', "", "opensans300.php");
        FPDF::AddFont('OPENSANS400', "", "opensans400.php");
        FPDF::AddFont('OPENSANS500', "", "opensans500.php");
        FPDF::AddFont('OPENSANS700', "", "opensans700.php");
        FPDF::AddFont('OPENSANS800', "", "opensans800.php");
    }

    public function SetNomePDF($nome = NULL){
    	empty($nome) ? $this->nome_pdf="PDF.pdf" : $this->nome_pdf=$nome.".pdf";
    }

    public function PDF(){
    	$this->SetParametri();
   		$this->SetLayout();
   		$this->SetFonts();
   		$this->SetNomePDF();

   		FPDF::AddPage('P');
   		FPDF::SetFont('OPENSANS300', '', '15');
   		FPDF::SetXY($this->ml, $this->mt);
   		FPDF::Cell(0, 5, $this->txt('Prova'));
 
        return FPDF::Output('I', $this->nome_pdf);
    }


    /** 
    	Utility 
    **/

    function GetStringHeight($string, $row_width, $row_height){
    	$string=$this->txt($string);
		$string=explode("\n", $string);
		$rows=count($string);
		
		for($i=0; $i < count($string); $i++){
			$body=explode(" ", $string[$i]);
			for($j=1, $swap=$body[0]; $j < count($body); $j++){
				$swap.=" ".$body[$j];
				if(FPDF::GetStringWidth($swap) > $row_width){
					$rows++;
					$swap="";
					$j--;
				}
				else if(FPDF::GetStringWidth($swap) == $row_width){
					$rows++;
					$swap="";
				}
			}
		}
		return $rows*$row_height;
	}
		
	function GetLastStringWidth($string, $row_width, $row_height){
			$last_rows=$this->GetStringHeight($string, $row_width, $row_height)/$row_height;
			$string=$this->txt($string);
			$string=explode("\n", $string);
			$rows=count($string);			
			for($i=0; $i < count($string); $i++){
				$body=explode(" ", $string[$i]);
				for($j=1, $swap=$body[0]; $j < count($body); $j++){	
					$swap.=" ".$body[$j];
					if(FPDF::GetStringWidth($swap) > $row_width){
						$rows++;
						$swap="";
						$j--;
					}
					else if(FPDF::GetStringWidth($swap) == $row_width){
						$rows++;
						$swap="";
					}
				}
			}
			return FPDF::GetStringWidth($swap);			
	}

	function HeightLeft(){
		return $this->hp-(FPDF::GetY()+$this->mb+$this->hf);
	}

	function txt($txt){
		return iconv('UTF-8', 'windows-1252', $txt);
	}

  
}

