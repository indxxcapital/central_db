<?php

include("db_config.php");
function read_factor($date)
{
global $conn;
global $path;
	//echo date("ymd");
	
	
$exchanges=array("AE_DIFX_AJ",
"AE_XADS_AJ",
"AE_XDFM_AJ",
"AM_XARM_AJ",
"AR_XBUE_AJ",
"AT_XWBO_AJ",
"AU_SIMV_AJ",
"AU_XASX_AJ",
"AU_XNEC_AJ",
"AZ_BSEX_AJ",
"BA_XBLB_AJ",
"BB_XBAB_AJ",
"BD_XCHG_AJ",
"BD_XDHA_AJ",
"BE_XBRU_AJ",
"BG_XBUL_AJ",
"BH_XBAH_AJ",
"BM_XBDA_AJ",
"BO_XBOL_AJ",
"BR_BVMF_AJ",
"BS_XBAA_AJ",
"BT_RSEB_AJ",
"BW_XBOT_AJ",
"CA_XCNQ_AJ",
"CA_XTSE_AJ",
"CA_XTSX_AJ",
"CH_XBRN_AJ",
"CH_XQMH_AJ",
"CH_XSWX_AJ",
"CI_XBRV_AJ",
"CL_XBCL_AJ",
"CL_XSGO_AJ",
"CM_XDSX_AJ",
"CN_XSHE_AJ",
"CN_XSHG_AJ",
"CO_XBOG_AJ",
"CR_XBNV_AJ",
"CV_XBVC_AJ",
"CY_XCYS_AJ",
"CZ_XPRA_AJ",
"DE_XBER_AJ",
"DE_XDUS_AJ",
"DE_XETR_AJ",
"DE_XFRA_AJ",
"DE_XHAM_AJ",
"DE_XHAN_AJ",
"DE_XMUN_AJ",
"DE_XSTU_AJ",
"DK_XCSE_AJ",
"DZ_XALG_AJ",
"EC_XGUA_AJ",
"EC_XQUI_AJ",
"EE_XTAL_AJ",
"EG_XCAI_AJ",
"ES_MABX_AJ",
"ES_XMAD_AJ",
"ES_XMCE_AJ",
"ES_XNAF_AJ",
"FI_XHEL_AJ",
"FJ_XSPS_AJ",
"FR_XPAR_AJ",
"GB_XLON_AJ",
"GE_XGSE_AJ",
"GG_XCIE_AJ",
"GH_XGHA_AJ",
"GR_ASEX_AJ",
"GT_XGTG_AJ",
"HK_XHKG_AJ",
"HR_XZAG_AJ",
"HU_XBUD_AJ",
"ID_XIDX_AJ",
"IE_XDUB_AJ",
"IL_XTAE_AJ",
"IN_XBOM_AJ",
"IN_XNSE_AJ",
"IQ_XIQS_AJ",
"IR_XTEH_AJ",
"IS_XICE_AJ",
"IT_MTAA_AJ",
"IT_SEDX_AJ",
"JM_XJAM_AJ",
"JO_XAMM_AJ",
"JP_XJPX_AJ",
"JP_XNGO_AJ",
"KE_XNAI_AJ",
"KG_XKSE_AJ",
"KH_XCSX_AJ",
"KR_XKON_AJ",
"KR_XKOS_AJ",
"KR_XKRX_AJ",
"KW_XKUW_AJ",
"KY_XCAY_AJ",
"KZ_XKAZ_AJ",
"LA_XLAO_AJ",
"LB_XBEY_AJ",
"LK_XCOL_AJ",
"LT_XLIT_AJ",
"LU_XLUX_AJ",
"LV_XRIS_AJ",
"LY_XLSM_AJ",
"MA_XCAS_AJ",
"ME_XMNX_AJ",
"MK_XMAE_AJ",
"MN_XULA_AJ",
"MT_XMAL_AJ",
"MU_XMAU_AJ",
"MV_MALX_AJ",
"MW_XMSW_AJ",
"MX_XMEX_AJ",
"MY_XKLS_AJ",
"NA_XNAM_AJ",
"NG_XNSA_AJ",
"NL_XAMS_AJ",
"NO_NOTC_AJ",
"NO_XOAS_AJ",
"NO_XOSL_AJ",
"NP_XNEP_AJ",
"NZ_XNZE_AJ",
"OM_XMUS_AJ",
"PA_XPTY_AJ",
"PE_XLIM_AJ",
"PH_XPHS_AJ",
"PK_XKAR_AJ",
"PL_XWAR_AJ",
"PS_XPAE_AJ",
"PT_XLIS_AJ",
"PY_XVPA_AJ",
"QA_DSMD_AJ",
"RO_XBSE_AJ",
"RS_XBEL_AJ",
"RU_MISX_AJ",
"RU_XPIC_AJ",
"RW_RSEX_AJ",
"SA_XSAU_AJ",
"SC_TRPX_AJ",
"SD_XKHA_AJ",
"SE_XSAT_AJ",
"SE_XSTO_AJ",
"SG_XSES_AJ",
"SI_XLJU_AJ",
"SK_XBRA_AJ",
"SV_XSVA_AJ",
"SY_XDSE_AJ",
"SZ_XSWA_AJ",
"TH_XBKK_AJ",
"TN_XTUN_AJ",
"TR_XIST_AJ",
"TT_XTRN_AJ",
"TW_ROCO_AJ",
"TW_XTAI_AJ",
"TZ_XDAR_AJ",
"UA_PFTS_AJ",
"UA_UKEX_AJ",
"UG_XUGA_AJ",
"US_ARCX_AJ",
"US_OTCB_AJ",
"US_TRCE_AJ",
"US_USCOMP_AJ",
"US_XASE_AJ",
"US_XCHI_AJ",
"US_XCIS_AJ",
"US_XNAS_AJ",
"US_XNYS_AJ",
"US_XOTC_AJ",
"UY_XMNT_AJ",
"VE_XCAR_AJ",
"VN_HSTC_AJ",
"VN_XSTC_AJ",
"ZA_XJSE_AJ",
"ZM_XLUS_AJ",
"ZW_XZIM_AJ"
);



$factorArray=array();
$factorArray['DVD_CASH']="CP_ADJ";
$factorArray['SPIN']="CP_ADJ";
$factorArray['DVD_STOCK']="CP_ADJ";
$factorArray['STOCK_SPLT']="CP_ADJ";
$factorArray['RIGHTS_OFFER']="CP_ADJ";


foreach($exchanges as $exchange)
{
  $file=$path."prices/".$exchange.date("ymd",strtotime($date)).".txt";
//echo "<br>";
if(file_exists($file)){
$lines = file($file);

if(!empty($lines))
{foreach($lines as $key=>$line)
	{
		//echo $file;
		if($key>0)
{		
		$data=array();
		$line=str_replace("\r\n","",$line);
		$data=explode("\t",$line);
		$data=explode("\t",$line);
	//print_r($data);
	
	if(!empty($data)){
	
			$temp="select id,action_id,modify_date from corporate_action where action_id='".$data[13]."'";
			$tmp=$conn->query($temp);
	  		if ($tmp->num_rows > 0) {
           // output data of each row
           while($row = $tmp->fetch_assoc()){
	//print_r($row);
		
		if(!empty($row)){
			
	 $temp2="select id from corporate_action_custom where bbg_action_id='".$data[13]."' and corporate_action_id='".$row['id']."' and name='CP_ADJ'";
	//echo "<br>";
			$tmp2=$conn->query($temp2);
	  		if ($tmp2->num_rows > 0) {
				 $sqlfactor="update corporate_action_custom set value='".$data[10]."'  WHERE bbg_action_id='".$data[13]."' and corporate_action_id='".$row['id']."' and name='CP_ADJ'";
					$conn->query($sqlfactor);
		//	echo "<br>";
			
			}else{
							$sqlfactor="insert into corporate_action_custom set value='".$data[10]."'  , bbg_action_id='".$data[13]."' , corporate_action_id='".$row['id']."' , name='CP_ADJ'";
					$conn->query($sqlfactor);
	//echo "<br>";
			
			}
			
			
			
			
			//	$sqldelet="update corporate_action_custom set  WHERE bbg_action_id ='".$data[1]."'";
			//	$conn->query($sqldelet);
		
		
		}
		
		
		
		
		   }}
	}
	
	
	
	
}
	}}

	
	
}







for($i=2;$i<=3;$i++){
	
	
	$file=$path."prices/".$exchange.date("ymd",strtotime($date))."_0".$i.".txt";
//echo "<br>";
if(file_exists($file)){
$lines = file($file);
//echo $file;
//echo "<br>"; 
if(!empty($lines))
{foreach($lines as $key=>$line)
	{
		//echo $file;
		if($key>0)
{		
		$data=array();
		$line=str_replace("\r\n","",$line);
		$data=explode("\t",$line);
		$data=explode("\t",$line);
	//print_r($data);
	
	if(!empty($data)){
	
			$temp="select id,action_id,modify_date from corporate_action where action_id='".$data[13]."'";
			$tmp=$conn->query($temp);
	  		if ($tmp->num_rows > 0) {
           // output data of each row
           while($row = $tmp->fetch_assoc()){
	//print_r($row);
		
		if(!empty($row)){
			
	 $temp2="select id from corporate_action_custom where bbg_action_id='".$data[13]."' and corporate_action_id='".$row['id']."' and name='CP_ADJ'";
	//echo "<br>";
			$tmp2=$conn->query($temp2);
	  		if ($tmp2->num_rows > 0) {
				 $sqlfactor="update corporate_action_custom set value='".$data[10]."'  WHERE bbg_action_id='".$data[13]."' and corporate_action_id='".$row['id']."' and name='CP_ADJ'";
					$conn->query($sqlfactor);
		//	echo "<br>";
			
			}else{
							$sqlfactor="insert into corporate_action_custom set value='".$data[10]."'  , bbg_action_id='".$data[13]."' , corporate_action_id='".$row['id']."' , name='CP_ADJ'";
					$conn->query($sqlfactor);
	//echo "<br>";
			
			}
			
			
			
			
			//	$sqldelet="update corporate_action_custom set  WHERE bbg_action_id ='".$data[1]."'";
			//	$conn->query($sqldelet);
		
		
		}
		
		
		
		
		   }}
	}
	
	
	
	
}
	}}

	
	
}

	
	
}



}


//print_r($exchange);








}


function read_data_from_edi($file){
global $conn;
global $path;
	if(file_exists($file))
{

$lines = file($file);
//$data=explode("\t",$lines['2']);
//print_r($data);
//exit;



$skipArray=array("AGM","ANN","BB","CAPRD","CURRD","DRIP","FRANK");
if(!empty($lines))
{foreach($lines as $key=>$line)
	{
		$data=array();
		$line=str_replace("\r\n","",$line);
		$data=explode("\t",$line);
		$data=explode("\t",$line);
		
		if(!in_array($data[0],$skipArray)){
		if($key>1&& $key<(count($lines)-1))
		{
			
			//print_r($data);
			//exit;
			///			print_r($data);
			//exit;

//print_r($data);
//exit;		

$spl=0;

			if($data[0]=="DIV" && $data[68]!="" && $data[72]=="" && $data[74]=="")
			{
				//echo "Yes".$data[27];
				$data[0]="STOCK_SPLT";
			}
			
			if($data[0]=="RCAP"){
			$data[0]="DVD_CASH";
			$spl=1;
			}
            if($data[0]=="DIV")
			$data[0]="DVD_CASH";
            		
 			if($data[0]=="BON")
			$data[0]="DVD_STOCK";
			if($data[0]=="ICC")
			$data[0]="CHG_ID";
			if($data[0]=="RTS")
			$data[0]="RIGHTS_OFFER";
			if($data[0]=="BR")
			$data[0]="RIGHTS_OFFER";
			if($data[0]=="ENT")
			$data[0]="RIGHTS_OFFER";
			if($data[0]=="ISCHG")
			$data[0]="CHG_NAME";
			if($data[0]=="LCC")
			$data[0]="CHG_TKR";
			if($data[0]=="DMRGR")
			$data[0]="SPIN";
		
			if($data[0]=="ARR")
			$data[0]="SPIN";
			if($data[0]=="DIST")
			$data[0]="SPIN";
			if($data[0]=="SD")
			$data[0]="STOCK_SPLT";
			if($data[0]=="CONSD")
			$data[0]="STOCK_SPLT";
			if($data[0]=="LCC")
			$data[0]="CHG_TKR";
			if($data[0]=="TKOVR")
			$data[0]="ACQUIS";
		
			if($data[0]=="MRGR")
			$data[0]="ACQUIS";
		
			if($data[0]=="D")
			$data[0]="DELIST";
			
			
		
			if($data[0]=="STOCK_SPLT")
			{//print_r($data);
			//exit;
			}
			
			
			
			$temp="select id,action_id,modify_date from corporate_action where action_id='".$data[1]."'";
			$tmp=$conn->query($temp);
	  		if ($tmp->num_rows > 0) {
           // output data of each row
           while($row = $tmp->fetch_assoc()){
			   
			  //print_r($row);
			if(date("Y-m-d",strtotime($row['modify_date']))!=date("Y-m-d",strtotime($data[8]))){
				
				 
//delete for $data[4] on corporate_action_custom
				$sqldelet="DELETE FROM corporate_action_custom WHERE bbg_action_id ='".$data[1]."'";
				//$conn->query($sqldelet);
				 $sqlupdate="UPDATE corporate_action SET ticker='".$data[27]." Equity', dataprovider='EDI',name='".$data[14]."',corporate_action='".$data[0]."',record_date='".date("Y-m-d",strtotime($data[9]))."',ex_date='".date("Y-m-d",strtotime($data[38]))."',modify_date='".date("Y-m-d",strtotime($data[8]))."',identifier_name='ISIN',identifier='".$data[12]."',symbol='".$data[35]."',country_code='".$data[15]."',currency='".$data[70]."' where action_id='".$data[1]."'";
		
		if ($conn->query($sqlupdate) ==TRUE) {
					 //echo "updated!"; 
	
	
	
	$sql1 = "INSERT INTO corporate_action_custom(bbg_action_id,corporate_action_id,name,value)
       VALUES";				  
				  $id=$row['id'];
				  
	 if($data[0]=="DVD_CASH" && $data[70])
	{	 

if(checkdata($id,$data[1],"CP_DVD_CRNCY")){
		UpdateData($id,$data[1],"CP_DVD_CRNCY",$data[70]);
		
		
	}else{
		InsertData($id,$data[1],"CP_DVD_CRNCY",$data[70]);
	   
	}
			}elseif($data[0]=="RIGHTS_OFFER" && $data[70]){
		
		
		if(checkdata($id,$data[1],"CP_CRNCY")){
		UpdateData($id,$data[1],"CP_CRNCY",$data[70]);
		
		
	}else{
		InsertData($id,$data[1],"CP_CRNCY",$data[70]);
	   
	}
		
		
		
		
		
		
		if($data[67] && $data[68])
		{
		
		
		
		
		if(checkdata($id,$data[1],"CP_RATIO")){
		UpdateData($id,$data[1],"CP_RATIO",$data[68]/$data[67]);
		
		
	}else{
		InsertData($id,$data[1],"CP_RATIO",$data[68]/$data[67]);
	   
	}
		
		
		
		
		
		}
		
		
		}
			elseif($data[0]=="DVD_STOCK")
			{	






if(checkdata($id,$data[1],"CP_AMT")){
		UpdateData($id,$data[1],"CP_AMT",$data[67]);
		
		
	}else{
		InsertData($id,$data[1],"CP_AMT",$data[67]);
	   
	}
		
		
		
		





			
		
			}elseif($data[0]="STOCK_SPLT" && $data[68] && $data[67])
		{
		
		
		if(checkdata($id,$data[1],"CP_AMT")){
		UpdateData($id,$data[1],"CP_AMT",$data[68]/$data[67]);
		
		
	}else{
		InsertData($id,$data[1],"CP_AMT",$data[68]/$data[67]);
	   
	}
		
		
		
		
		
		
		}if($spl)
			if(checkdata($id,$data[1],"CP_DVD_TYP")){
		UpdateData($id,$data[1],"CP_DVD_TYP","1001");
		
		
	}else{
		InsertData($id,$data[1],"CP_DVD_TYP","1001");
	   
	}
		
		
for($i=37;$i<=60;$i=$i+2)
{
if($data[$i+1] &&  $data[$i])
{	
$name=mysqli_real_escape_string($conn,$data[$i]);
	$value=mysqli_real_escape_string($conn,$data[$i+1]);

		if(checkdata($id,$data[1],$name)){
		
		UpdateData($id,$data[1],$name,$value);
		
	}else{
		InsertData($id,$data[1],$name,$value);
	   
	}

}
}



for($i=71;$i<=122;$i=$i+2)
{
if($data[$i+1] &&  $data[$i])
{	


$name=$data[$i];
	$value=mysqli_real_escape_string($conn,$data[$i+1]);


	if($name=="GrossDividend")
	$name="CP_GROSS_AMT";
	if($name=="CashBak")
	$name="CP_GROSS_AMT";
	
	if($name=="NetDividend")
	$name="CP_NET_AMT";
	
	if($name=="OldIsin")
	$name="CP_OLD_ISIN";
	if($name=="NewIsin")
	$name="CP_NEW_ISIN";
	if($name=="NewUscode")
	$name="CP_NEW_CUSIP";
	if($name=="OldUscode")
	$name="CP_OLD_CUSIP";
	if($name=="IssOldName")
	$name="CP_OLD_NAME";
	if($name=="IssNewName")
	$name="CP_NEW_NAME";
	if($name=="IssNewName")
	$name="CP_NEW_NAME";
if($name=="IssuePrice")
	$name="CP_PX";
if($name=="Marker")
	$name="CP_DVD_TYP";
if($value=="SPL" && $name=="CP_DVD_TYP")
	$value="1001";
elseif($name=="CP_DVD_TYP")
	$value="1000";

	
		if(checkdata($id,$data[1],$name)){
		UpdateData($id,$data[1],$name,$value);
		
		
	}else{
		InsertData($id,$data[1],$name,$value);
	   
	}
}
}


 			  
		 	  
				  }
			}else{
				echo "skip me";
			}
			
			
			
			}
			}else{
			
			
			 $sql = "INSERT INTO corporate_action(ticker,action_id,dataprovider,name,corporate_action,record_date,ex_date,modify_date,identifier_name,identifier,symbol,country_code,currency)
       VALUES ('".$data[27]." Equity','".$data[1]."','EDI','".mysqli_real_escape_string($conn,$data[14])."','".$data[0]."','".date("Y-m-d",strtotime($data[9]))."','".date("Y-m-d",strtotime($data[38]))."','".date("Y-m-d",strtotime($data[8]))."','ISIN','".$data[12]."','".$data[35]."','".$data[15]."','".$data[70]."')";
if ($conn->query($sql) === TRUE) {
 $id=$conn->insert_id;
	$sql1 = "INSERT INTO corporate_action_custom(bbg_action_id,corporate_action_id,name,value)
       VALUES";				  

	   
	if($data[0]=="DVD_CASH" && $data[70])
	{	 

	if(checkdata($id,$data[1],"CP_DVD_CRNCY")){
		UpdateData($id,$data[1],"CP_DVD_CRNCY",$data[70]);
		
		
	}else{
		InsertData($id,$data[1],"CP_DVD_CRNCY",$data[70]);
	   
	}
		}elseif($data[0]=="RIGHTS_OFFER" && $data[70]){
			
			
			
			if(checkdata($id,$data[1],"CP_CRNCY")){
		UpdateData($id,$data[1],"CP_CRNCY",$data[70]);
		
		
	}else{
		InsertData($id,$data[1],"CP_CRNCY",$data[70]);
	   
	}
			
		
		
		
		if($data[67] && $data[68])
		{
		
		
		
		if(checkdata($id,$data[1],"CP_RATIO")){
		UpdateData($id,$data[1],"CP_RATIO",$data[68]/$data[67]);
		
		
	}else{
		InsertData($id,$data[1],"CP_RATIO",$data[68]/$data[67]);
	   
	}
		
		
		}
		
		
		}
		elseif($data[0]=="DVD_STOCK")
			{	


if(checkdata($id,$data[1],"CP_AMT")){
		UpdateData($id,$data[1],"CP_AMT",$data[67]);
		
		
	}else{
		InsertData($id,$data[1],"CP_AMT",$data[67]);
	   
	}
		

			
			}elseif($data[0]="STOCK_SPLT" && $data[68] && $data[67])
		{
			
			
			
			if(checkdata($id,$data[1],"CP_AMT")){
		UpdateData($id,$data[1],"CP_AMT",$data[68]/$data[67]);
		
		
	}else{
		InsertData($id,$data[1],"CP_AMT",$data[68]/$data[67]);
	   
	}
			
		
		
		
		}

if($spl)
			if(checkdata($id,$data[1],"CP_DVD_TYP")){
		UpdateData($id,$data[1],"CP_DVD_TYP","1001");
		
		
	}else{
		InsertData($id,$data[1],"CP_DVD_TYP","1001");
	   
	}
for($i=37;$i<=60;$i=$i+2)
{
if($data[$i+1] &&  $data[$i])
{	
$name=mysqli_real_escape_string($conn,$data[$i]);
	$value=mysqli_real_escape_string($conn,$data[$i+1]);

	
			if(checkdata($id,$data[1],$name)){
		UpdateData($id,$data[1],$name,$value);
		
			}else{
		InsertData($id,$data[1],$name,$value);
	   
	}
			
		


}
}

for($i=71;$i<=122;$i=$i+2)
{
if($data[$i+1]&& $data[$i])
{
	
	
	
	
		$name=$data[$i];
	$value=mysqli_real_escape_string($conn,$data[$i+1]);
	
	if($name=="GrossDividend")
	$name="CP_GROSS_AMT";
if($name=="CashBak")
	$name="CP_GROSS_AMT";
	if($name=="NetDividend")
	$name="CP_NET_AMT";
	
	if($name=="OldIsin")
	$name="CP_OLD_ISIN";
	if($name=="NewIsin")
	$name="CP_NEW_ISIN";
	if($name=="NewUscode")
	$name="CP_NEW_CUSIP";
	if($name=="OldUscode")
	$name="CP_OLD_CUSIP";
	if($name=="IssOldName")
	$name="CP_OLD_NAME";
	if($name=="IssNewName")
	$name="CP_NEW_NAME";
if($name=="IssuePrice")
	$name="CP_PX";
if($name=="Marker")
	$name="CP_DVD_TYP";
if($value=="SPL" && $name=="CP_DVD_TYP")
	$value="1001";
elseif($name=="CP_DVD_TYP")
	$value="1000";

			if(checkdata($id,$data[1],$name)){
		UpdateData($id,$data[1],$name,$value);
		
			}else{
		InsertData($id,$data[1],$name,$value);
	   
	}
	
	
	
		//
			
}
}



 
//echo "finish\n";
  echo "New record created successfully"."\n";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
} 
			}
//

 

			
		}
			}
	}
	}
}
	}

function read_ca_from_edi($date)
{
global $conn;
global $path;
$filedate=date("Ymd",strtotime($date));
 $file=$path.date("Ymd",strtotime($filedate)).'_695.txt';
//echo "<br>";


read_data_from_edi($file);

for($i=1;$i<=3;$i++){
	$file=$path."695i/".date("Ymd",strtotime($filedate)).'_695_'.$i.'.txt';
read_data_from_edi($file);

}

}



function checkdata($id,$bbg_action_id,$name){
	global $conn;
	
 $sqldelet="select * FROM corporate_action_custom WHERE bbg_action_id ='".$bbg_action_id."' and id='".$id."' and name='".$name."'";
				
			//exit;	
				$tmp=$conn->query($sqldelet);
	  		if ($tmp->num_rows > 0) {
				
				return true;
				
			}
	return false;		
	
}

function InsertData($id,$bbg_action_id,$name,$value){
		global $conn;

	 $sqldelet="insert into corporate_action_custom set value='".$value."' , bbg_action_id ='".$bbg_action_id."' , corporate_action_id='".$id."' , name='".$name."'";
	//exit;
	
	$tmp=$conn->query($sqldelet);
	
}
function UpdateData($id,$bbg_action_id,$name,$value){
	global $conn;
	
 $sqldelet="update corporate_action_custom set value='".$value."' WHERE bbg_action_id ='".$bbg_action_id."' and corporate_action_id='".$id."' and name='".$name."'";
	$tmp=$conn->query($sqldelet);
}
function Alert(){
		global $conn;
	$fixedarray=array("DVD_CASH","DVD_STOCK","CHG_ID","RIGHTS_OFFER","CHG_NAME","CHG_TKR","SPIN","STOCK_SPLT","CHG_TKR","DELIST","ACQUIS","AGM","ANN","BB","CAPRD","CURRD","DRIP","FRANK");
	$sqlalert="select distinct(corporate_action) from corporate_action ";
	$db_array=array();
		$tmp=$conn->query($sqlalert);
	  		if ($tmp->num_rows > 0) {
				  while($row = $tmp->fetch_assoc()){
					  $db_array[]=$row['corporate_action'];
					  
				  }
				
			}
			$alert_array=array_diff($db_array,$fixedarray);
			$text='';
			if(!empty($alert_array)){
				foreach($alert_array as $alert)
				{
					$text.=$alert."\n";
					
				}
				
			}
	
	$subject="UnIdentified Corporate Action from EDI";
	if(mail("dbajpai@indxx.com,sgoyal@indxx.com,kaggarwal@indxx.com",$subject,$text))
		echo "mail send";
	
	
	
	
}


?>