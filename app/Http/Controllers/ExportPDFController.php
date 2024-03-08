<?php

namespace App\Http\Controllers;

use App\Models\VDCClaim;
use Elibyy\TCPDF\TCPDF;

class ExportPDFController extends Controller
{
    public function index($idVdcClaim)
    {

        $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $obj_pdf->SetCreator(PDF_CREATOR);
        
        $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $obj_pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $obj_pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $obj_pdf->SetDefaultMonospacedFont('helvetica');
        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
        $obj_pdf->setPrintHeader(false);
        $obj_pdf->setPrintFooter(false);
        $obj_pdf->SetAutoPageBreak(TRUE, 10);
        $obj_pdf->SetFont('helvetica', '', 6);
        $obj_pdf->AddPage();

        $vdcClaim = VDCClaim::with(['vdcCatalog', 'user', 'unit', 'deptHead'])->findOrFail($idVdcClaim);
        $title = 'VDC Claim ' . $vdcClaim->report_no . '_' . $vdcClaim->vdcCatalog->claim_method;
        $obj_pdf->SetTitle($title);
        // dd($vdcClaim->vdcCatalog->stock_code_vdc_claim);
        // dd($vdcClaim);
        $content = '';

        $content .= '
<center>
<table width="680px" border="0">
  <tr>
    <td width="79%" colspan="2">&nbsp;&nbsp;
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <table width="100%" border="0">
        <tr>
          <td width="12%" align="right"><img src="' . public_path("img/icon_pdf/icon_kodeco.jpg") . '" alt="kodeco" width="83px" height="73px" /></td>
          <td width="71%" align="center"><p><strong><h3>CLAIM OF VALUABLE DAMAGE CORE<br />
            PT.PAMAPERSADA NUSANTARA DISTRICT KIDECO</h3></strong></p></td>
          <td width="17%" align="left"><img src="' . public_path("img/icon_pdf/icon_pama.jpeg") . '" alt="pama" width="70px" height="73px" /></td>
        </tr>
      </table>      <p><br>
        <br>
      </p></td>
    </tr>
  
  <tr>
    <td colspan="2"><table width="100%" border="0">
        
        <tr>
        <td width="12%"><strong>&nbsp;&nbsp;REPORT NO </strong></td>
        <td width="4%"><strong>:</strong></td>
        <td width="20%" ><strong>' . $vdcClaim->report_no . '</strong></td>
        <td width="8%">&nbsp;</td>
        <td width="1%">&nbsp;</td>
        <td width="13%">&nbsp;</td>
        <td width="13%" align="right"><strong>EX WR/MR</strong></td>
        <td width="4%" align="center"><strong>:</strong></td>
        <td width="19%" rowspan="3" align="center" valign="top"><table width="100%" border="1" style="border-color:#000000; border:solid 2px; border-collapse:collapse">
          <tr>
            <td align="center"><strong>' . $vdcClaim->wr_mr . '</strong></td>
                </tr>
          <tr>
            <td align="center"><strong>' . $vdcClaim->ex_po . '</strong></td>
                </tr>
          <tr>
            <td align="center"><strong>' . $vdcClaim->purchase_order . '</strong></td>
                </tr>
        </table></td>
        </tr>
      <tr>
        <td><strong>&nbsp;&nbsp;REPORT DATE </strong></td>
        <td><strong>:</strong></td>
        <td><strong>' . date('l, j F Y', strtotime($vdcClaim->report_date)) . ' </strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right"><strong>EX PO </strong></td>
        <td align="center"><strong>:</strong></td>
        </tr>
      <tr>
      <td><strong>&nbsp;&nbsp;USER </strong></td>
        <td><strong>:</strong></td>
        <td><strong>' . $vdcClaim->depthead->name . '</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right"><strong>NEW PO of CLAIM </strong></td>
        <td align="center"><strong>:</strong></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td><strong>&nbsp;&nbsp;SUPPLIER </strong></td>
        <td><strong>:</strong></td>
        <td style="border:solid #000000 2px" align="center" height="10"><strong>' . $vdcClaim->vdcCatalog->supplier . ' </strong></td>
        <td align="right"><strong>ADDRESS  </strong></td>
        <td align="center"><strong>:</strong></td>
        <td  style="border:solid black 2px" align="center" colspan="4"><strong>' . $vdcClaim->vdcCatalog->supplier_address . ' </strong></td>
        <td colspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="9"><table width="100%" border="0">
          
          <tr>
            <td width="21%"><div align="center">
              <table width="100%" border="1" style="border-color:#000000; border:solid 2px; border-collapse:collapse">
          <tr>
            <td align="center" bgcolor="#FFFF00"><strong>UNIT NAME </strong></td>
          </tr>
          <tr>
            <td style="border:solid #000000 2px"  align="center"><strong>' . $vdcClaim->unit->unit_name . '</strong></td>
          </tr>
        </table>
            </div></td>
            <td width="6%"></td>
            <td width="21%"><div align="center">
              <table width="100%" border="1" style="border-color:#000000; border:solid 2px; border-collapse:collapse">
                <tr>
                  <td align="center" bgcolor="#FFFF00"><strong>MAKER/PRODUCT</strong></td>
                </tr>
                <tr>
                  <td align="center" style="border:solid #000000 2px"><strong>' . $vdcClaim->unit->product_maker . '</strong></td>
                </tr>
              </table>
            </div></td>
            <td width="4%"></td>
            <td width="22%"><div align="center">
              <table width="100%" border="1" style="border-color:#000000; border:solid 2px; border-collapse:collapse">
                <tr>
                  <td align="center" bgcolor="#FFFF00"><strong>UNIT TYPE </strong></td>
                </tr>
                <tr>
                  <td align="center" style="border:solid #000000 2px"><strong>' . $vdcClaim->unit->unit_type . '</strong></td>
                </tr>
              </table>
            </div></td>
            <td width="5%"></td>
            <td width="21%"><div align="center">
              <table width="100%" border="1" style="border-color:#000000; border:solid 2px; border-collapse:collapse">
                <tr>
                  <td align="center" bgcolor="#FFFF00"><strong>CODE NUMBER UNIT </strong></td>
                </tr>
                <tr>
                  <td align="center" style="border:solid #000000 2px"><strong>' . $vdcClaim->unit->unit_code_number . ' </strong></td>
                </tr>
              </table>
            </div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
			<td></td>
          </tr>
          <tr>
            <td><div align="center">
              <table width="100%" border="1" style="border-color:#000000; border:solid 2px; border-collapse:collapse">
                <tr>
                  <td align="center" bgcolor="#FFFF00"><strong>UNIT SERIAL NUMBER </strong></td>
                </tr>
                <tr>
                  <td style="border:solid #000000 2px"  align="center"><strong>' . $vdcClaim->unit->unit_serial_number . '</strong></td>
                </tr>
              </table>
            </div></td>
            <td></td>
			<td><div align="center">
              <table width="100%" border="1" style="border-color:#000000; border:solid 2px; border-collapse:collapse">
                <tr>
                  <td align="center" bgcolor="#FFFF00"><strong>ENGINE MODEL </strong></td>
                </tr>
                <tr>
                  <td align="center" style="border:solid #000000 2px"><strong>' . $vdcClaim->unit->engine_model . '</strong></td>
                </tr>
              </table>
			  </div></td>
			<td></td>
			<td><div align="center">
              <table width="100%" border="1" style="border-color:#000000; border:solid 2px; border-collapse:collapse">
                <tr>
                  <td align="center" bgcolor="#FFFF00"><strong>MNEMONIC</strong></td>
                </tr>
                <tr>
                  <td align="center" style="border:solid #000000 2px"><strong>' . $vdcClaim->unit->engine_mnemonic . '</strong></td>
                </tr>
              </table>
			  </div></td>
			<td></td>
			<td><div align="center">
              <table width="100%" border="1" style="border-color:#000000; border:solid 2px; border-collapse:collapse">
                <tr>
                  <td align="center" bgcolor="#FFFF00"><strong>ENGINE SERIAL NUMBER </strong></td>
                </tr>
                <tr>
                  <td align="center" style="border:solid #000000 2px"><strong>' . $vdcClaim->unit->engine_serial_model . '</strong></td>
                </tr>
              </table>
			  </div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td></td>
            <td>&nbsp;</td>
            <td></td>
            <td>&nbsp;</td>
            <td></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="7"><table width="100%" border="0">
              <tr>
                <td width="15%"><strong>&nbsp;&nbsp;INSTALL DATE </strong></td>
                <td width="3%" align="center"><strong>:</strong></td>
                <td width="11%" rowspan="2"><div align="center">
                  <table width="100%" border="1" style="border-color:#000000; border:solid 2px; border-collapse:collapse">
                    <tr>
                      <td align="center" ><strong>' . $vdcClaim->installation_date . '</strong></td>
                    </tr>
                    <tr>
                      <td style="border:solid #000000 2px"  align="center"><strong>' . $vdcClaim->failure_date . '</strong></td>
                    </tr>
                  </table>
                </div></td>
                <td width="2%" rowspan="2">&nbsp;</td>
                <td width="3%"><strong>HM</strong></td>
                <td width="2%" align="center"><strong>:</strong></td>
                <td width="11%" rowspan="2"><div align="center">
                  <table width="100%" border="1" style="border-color:#000000; border:solid 2px; border-collapse:collapse">
                    <tr>
                      <td align="center" ><strong>' . $vdcClaim->hm_install . '</strong></td>
                    </tr>
                    <tr>
                      <td style="border:solid #000000 2px"  align="center"><strong>' . $vdcClaim->hm_failure . '</strong></td>
                    </tr>
                  </table>
                </div></td>
                <td width="7%">&nbsp;</td>
                <td width="17%" align="right" valign="top"><strong>CLAIM FOR </strong></td>
                <td width="2%" align="center" valign="top"><strong>:</strong></td>
                <td width="27%"  rowspan="3" valign="top">
                  <table width="100%" height="100%" border="1" style="border-color:#000000; border:solid 2px; border-collapse:collapse">
                    <tr>
                      <td align="center"  height="100%" ><strong>' . $vdcClaim->vdcCatalog->claim_method . '</strong></td>
                    </tr>
                  </table>                
                  <p>&nbsp;</p></td>
              </tr>
              <tr>
                <td><strong>&nbsp;&nbsp;FAILURE DATE </strong></td>
                <td align="center"><strong>:</strong></td>
                <td><strong>HM</strong></td>
                <td align="center"><strong>:</strong></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
              
                <tr>
                <td colspan="11">
                    <table width="100%" border="0">
                        <tr>
                            <td width="50%" valign="top">
                                <table width="100%" border="1" style="border-color:#000000; border:solid 1px; border-collapse:collapse">
                                    <tr>
                                        <td style="padding:5px" align="center">
                                            <br>
                                            <p>
                                                <img src="' . public_path($vdcClaim->picture) . '" alt="a" style="width:128px;height:128px;" />
                                            </p>
                                            <p><strong>PICTURE OF THE PART <br></strong></p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width="50%" valign="top">
                                <table width="100%" border="1" style="border-color:#000000; border:solid 1px; border-collapse:collapse">
                                <tr>
                                <td align="center" bgcolor="#CCCCCC" style="padding:10px; height: 20px;">
                                    <div style="display: flex; justify-content: center; align-items: center; height: 100%;">
                                        <strong>NEW PART INFORMATION TO BE CLAIMED</strong>
                                    </div>
                                </td>
                            </tr>
                            
                                    <tr>
                                        <td>
                                            <table width="100%" border="0">
                                                <tr>
                                                    <td width="40%" style="padding:10px">&nbsp;&nbsp;STOCK CODE </td>
                                                    <td width="5%" style="padding:10px">:</td>
                                                    <td width="55%" style="padding:10px"><strong>' . $vdcClaim->vdcCatalog->stock_code_vdc_claim . '</strong></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:10px">&nbsp;&nbsp;PART DESCRIPTION </td>
                                                    <td style="padding:10px">:</td>
                                                    <td style="padding:10px"><strong>' . $vdcClaim->vdcCatalog->item_name . ' </strong></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:10px">&nbsp;&nbsp;MNEMONIC</td>
                                                    <td style="padding:10px">:</td>
                                                    <td style="padding:10px"><strong>' . $vdcClaim->vdcCatalog->mnemonic . '</strong></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:10px">&nbsp;&nbsp;PART NUMBER </td>
                                                    <td style="padding:10px">:</td>
                                                    <td style="padding:10px"><strong>' . $vdcClaim->vdcCatalog->part_number . '</strong></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" style="padding:10px;" height="100%">
                                            <strong>Analysis Damage Core (by PAMA)</strong><br>
                                            <strong>' . $vdcClaim->failure_info . '</strong>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
			   <tr>
			     <td colspan="11" align="center">&nbsp;</td>
			     </tr>
			   <tr>
                <td colspan="11" align="center"><br />
                  Analysis Damage Core (by SUPPLIER) : </td>
              </tr>
			   <tr>
			     <td colspan="11">
				 <table width="100%" border="1" style="border-color:#000000; border:solid 2px; border-collapse:collapse">
                   <tr>
                     <td height="50px" align="center"><strong><br>' . $vdcClaim->remarks . ' </strong></td>
                   </tr>
                 </table></td>
			     </tr>
			   <tr>
			     <td colspan="11" align="center" ><br><p>VALUABLE DAMAGE CORE SENT TO SUPPLIER</p>
			       <table width="100%" border="1" style="border-color:#000000; border:solid 1px; border-collapse:collapse">
                     <tr>
                       <td width="4%" align="center">No</td>
                       <td width="15%" align="center">Part Number </td>
                       <td width="24%" align="center">Part Description </td>
                       <td width="5%" align="center">Qty</td>
                       <td width="18%" align="center">Price</td>
                       <td width="19%" align="center">Price Total </td>
                       <td width="15%" align="center">Remarks</td>
                     </tr>
                     <tr>
                       <td align="center">1</td>
                       <td align="center">' . $vdcClaim->vdcCatalog->part_number . '</td>
                       <td align="center">' . $vdcClaim->vdcCatalog->item_name . ' </td>
                       <td align="center">1</td>
                       <td style=" padding:5px">&nbsp;&nbsp;Rp ' . number_format($vdcClaim->vdcCatalog->price_damage_core, 2) . '</td>
                       <td style=" padding:5px">&nbsp;&nbsp;Rp ' . number_format($vdcClaim->vdcCatalog->price_total, 2) . ' </td>
                       <td align="center">SENT TO SUPPLIER </td>
                     </tr>
                     <tr>
                       <td align="center">&nbsp;</td>
                       <td align="center">&nbsp;</td>
                       <td align="center">&nbsp;</td>
                       <td align="center">&nbsp;</td>
                       <td style=" padding:5px">&nbsp;</td>
                       <td style=" padding:5px">&nbsp;</td>
                       <td align="center">&nbsp;</td>
                     </tr>
                     <tr>
                       <td align="center">&nbsp;</td>
                       <td align="center">&nbsp;</td>
                       <td align="center">&nbsp;</td>
                       <td align="center">&nbsp;</td>
                       <td style=" padding:5px">&nbsp;</td>
                       <td style=" padding:5px">&nbsp;</td>
                       <td align="center">&nbsp;</td>
                     </tr>
                     <tr>

                       <td align="center">&nbsp;</td>
                       <td align="center">&nbsp;</td>
                       <td align="center">&nbsp;</td>
                       <td align="center">&nbsp;</td>
                       <td style=" padding:5px">&nbsp;</td>
                       <td style=" padding:5px">&nbsp;</td>
                       <td align="center">&nbsp;</td>
                     </tr>
                     <tr>
                       <td align="center">&nbsp;</td>
                       <td align="center">&nbsp;</td>
                       <td align="center">&nbsp;</td>
                       <td align="center">&nbsp;</td>
                       <td style=" padding:5px">&nbsp;</td>
                       <td style=" padding:5px">&nbsp;</td>
                       <td align="center">&nbsp;</td>
                     </tr>
                     <tr>
                       <td colspan="3" align="center">Total</td>
                       <td align="center" bgcolor="#33B3DD">1</td>
                       <td style=" padding:5px" bgcolor="#000000">&nbsp;</td>
                       <td style=" padding:5px" bgcolor="#33B3DD">&nbsp;&nbsp;Rp ' . number_format($vdcClaim->vdcCatalog->price_total, 2) . '  </td>
                       <td align="center" bgcolor="#000000">&nbsp;</td>
                     </tr>
                   </table>			       
			       <p>&nbsp;</p></td>
			     </tr>
			   <tr>
			     <td colspan="11" ><table width="100%" border="1" style="border-color:#000000; border:solid 1px; border-collapse:collapse">
                   <tr>
                     <td colspan="4" align="center"><strong>PROPOSAL STATUS</strong></td>
                     </tr>
                   <tr>
                     <td colspan="2" align="center" width="50%" bgcolor="#C8DFB5"><strong> VENDOR</strong></td>
                     <td colspan="2" align="center" bgcolor="#FEE797"><strong>PAMA</strong></td>
                     </tr>
                   <tr>
                     <td width="25%" align="center" bgcolor="#C8DFB5">ANALYST</td>
                     <td width="25%" align="center" bgcolor="#C8DFB5">REPORT/DELIVERY ORDER </td>
                     <td width="25%" align="center" bgcolor="#FEE797">APPROVAL DEPT HEAD </td>
                     <td width="25%" align="center" bgcolor="#FEE797">PREPARED BY </td>
                   </tr>
                   <tr>
                     <td valign="top"><table width="100%" border="0">
                       <tr>
                         <td align="center"><strong><br>OUTSTANDING</strong></td>
                       </tr>
                       <tr>
                         <td align="center">' . $vdcClaim->qty_vdc_claim - ($vdcClaim->qty_claim_approved + $vdcClaim->qty_claim_rejected) . '</td>
                       </tr>
                       <tr>
                         <td align="center"><strong>APPROVED</strong></td>
                       </tr>
                       <tr>
                         <td align="center">' . $vdcClaim->qty_claim_approved . '</td>
                       </tr>
                       <tr>
                         <td align="center"><strong>REJECTED</strong></td>
                       </tr>
                       <tr>
                         <td align="center">' . $vdcClaim->qty_claim_rejected . '</td>
                       </tr>
                       <tr>
                         <td align="center">&nbsp;</td>
                       </tr>
                       <tr>
                         <td align="center">&nbsp;</td>
                       </tr>
                       <tr>
                         <td align="center"><strong>NAME</strong></td>
                       </tr>
                       <tr>
                         <td align="center">' . $vdcClaim->vdcCatalog->supplier . '</td>
                       </tr>
                       <tr>
                         <td align="center">&nbsp;</td>
                       </tr>
                       <tr>
                         <td align="center">&nbsp;</td>
                       </tr>
                       
                       <tr>
                         <td align="center">&nbsp;</td>
                       </tr>
                       <tr>
                         <td align="center"><strong>DATE</strong></td>
                       </tr>
                       <tr>
                         <td align="center">' . ($vdcClaim->supplier_updated_at !== null ? date('l, j F Y', strtotime($vdcClaim->supplier_updated_at)) : null) . ' </td>
                       </tr>
                       <tr>
                         <td align="center">&nbsp;</td>
                       </tr>
                     </table></td>
                     <td valign="middle" align="center"><BR><BR><img src="' . public_path($vdcClaim->report_delivery) . '" alt="a" width="120px" height="127px" /></td>
                     <td valign="top"><table width="100%" border="0">
                         <tr>
                           <td width="26%" align="center">&nbsp;</td>
                           <td width="8%" align="center">&nbsp;</td>
                           <td width="66%" align="center">&nbsp;</td>
                         </tr>
                         <tr>
                           <td colspan="3" align="center">DEPARTMENT HEAD </td>
                           </tr>
                         <tr>
                           <td align="left">&nbsp;&nbsp;Name</td>
                           <td colspan="2" align="left"><strong>' . $vdcClaim?->deptHead?->name . ' </strong></td>
                           </tr>
                         <tr>
                           <td align="center">&nbsp;</td>
                           <td align="center">&nbsp;</td>
                           <td align="center">&nbsp;</td>
                         </tr>
                         <tr>
                           <td>&nbsp;&nbsp;Sign : </td>
                           <td align="center">&nbsp;</td>
                           <td>&nbsp;</td>
                         </tr>
                         <tr>
                           <td colspan="3" align="center"><p>&nbsp;</p>
                             <p><strong><em>' . ($vdcClaim->approval_depthead === null ? '*Outstanding Dept Head Sign' : ($vdcClaim->approval_depthead === 'approve' ? '*Electronically Signed' : '*Form Reject'))
                             . '</em></strong></p>
                             <p>&nbsp;</p></td>
                           </tr>
                         
                         <tr>
                           <td>&nbsp;</td>
                           <td>&nbsp;</td>
                           <td>&nbsp;</td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>&nbsp;</td>
                           <td>&nbsp;</td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>&nbsp;</td>
                           <td>&nbsp;</td>
                         </tr>
                         
                         <tr>
                           <td>&nbsp;</td>
                           <td>&nbsp;</td>
                           <td>&nbsp;</td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td>&nbsp;</td>
                           <td>&nbsp;</td>
                         </tr>
                         <tr>
                           <td>&nbsp;&nbsp;Date :</td>
                           <td colspan="2">' . ($vdcClaim->depthead_updated_at !== null ? date('l, j F Y', strtotime($vdcClaim->depthead_updated_at)) : null) . '</td>
                           </tr>
                       </table>                       
                       <p>&nbsp;</p></td>
                     <td valign="top"><table width="100%" border="0">
                       <tr>
                         <td width="23%" align="center">&nbsp;</td>
                         <td width="4%" align="center">&nbsp;</td>
                         <td width="73%" align="center">&nbsp;</td>
                       </tr>
                       <tr>
                         <td colspan="3" align="center">Planner/Technical Expert </td>
                       </tr>
                       <tr>
                         <td align="left">&nbsp;&nbsp;Name</td>
                         <td colspan="2" align="left"><strong>' . $vdcClaim->user->name . ' </strong> </td>
                       </tr>
                       <tr>
                         <td align="center">&nbsp;</td>
                         <td align="center">&nbsp;</td>
                         <td align="center">&nbsp;</td>
                       </tr>
                       <tr>
                         <td>&nbsp;&nbsp;Sign : </td>
                         <td align="center">&nbsp;</td>
                         <td>&nbsp;</td>
                       </tr>
                       <tr>
                         <td colspan="3" align="center"><p>&nbsp;</p>
                             <p><strong><em>*Electronicaly Signed</em></strong></p>
                           <p>&nbsp;</p></td>
                       </tr>
                       
                       <tr>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                       </tr>
                       <tr>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                       </tr>
                       <tr>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                       </tr>
                       <tr>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                       </tr>
                       <tr>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                       </tr>
                       <tr>
                         <td>&nbsp;&nbsp;Date :</td>
                         <td colspan="2">' . date('l, j F Y', strtotime($vdcClaim->created_at)) . ' </td>
                       </tr>
                     </table></td>
                   </tr>
                 </table></td>
			     </tr>
            </table></td>
            </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
</table>
</div>
</center>';

        $obj_pdf->writeHTML($content);

        ob_clean();

        $obj_pdf->Output($_SERVER['DOCUMENT_ROOT'] . $title . '.pdf', 'I');
    }
}
