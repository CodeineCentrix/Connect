//CASESES ONLY

case 'Vendor_details':
		include('../View/Vendor_details.php');
		break;
//////SHOW HOME		
	case 'show_home':
		$date_range = $data->get_event_date();
		$sponsors = $data->get_sponsors();
		$vendors = $data->get_vendors();
		$tickets = $data->get_tickets();
		$picture = $data->get_picture();
		include('../View/index.php');
		break;
//////SHOW HOME END

//////ADD VENDOR	
	case 'Add_Vendor':
		$diplay	=null;		
		$VenName = filter_input(INPUT_POST, 'vendor_name');
		$VenDescription = filter_input(INPUT_POST, 'vendor_description');
		$VenFacebook = filter_input(INPUT_POST, 'vendor_facebook');
		$VenTwitter = filter_input(INPUT_POST, 'vendor_twitter');
		$VenInstagram = filter_input(INPUT_POST, 'vendor_instagram');
		$VenWebsite = filter_input(INPUT_POST, 'vendor_website');
		$isSuccessfull = null;
		if(!empty($_FILES['fpVenPicture']['tmp_name'])){
			$image = addslashes($_FILES['fpVenPicture']['tmp_name']);
			$image = file_get_contents($_FILES['fpVenPicture']['tmp_name']);
			$image_size = getimagesize($_FILES['fpVenPicture']['tmp_name']);
			if($image_size == false){
				$isSuccessfull = false;
			}
			else{	
				$diplay = $image;
				$isSuccessfull = true;
			}
		}else{	
			$isSuccessfull = false;
		}

		// Validate inputs
		if($isSuccessfull){ 
		
			$vendor = $data->add_vendor($VenName, $VenDescription, $VenFacebook, $VenTwitter, $VenInstagram, $VenWebsite,$image );
		}

		include('../View/Vendor_details.php');
		break;
//////ADD VENDOR END

//////EDIT VENDOR	
	case 'edit_vendor':
		$venID = filter_input(INPUT_POST, 'venID');
		$venName = filter_input(INPUT_POST, 'venName');
		$venDescription = filter_input(INPUT_POST, 'venDescription');
		$venFacebook = filter_input(INPUT_POST, 'venFacebook');
		$venTwitter = filter_input(INPUT_POST, 'venTwitter');
		$venInstagram = filter_input(INPUT_POST, 'venInstagram');
		$venWebsite = filter_input(INPUT_POST, 'venWebsite');
		$venPicture = filter_input(INPUT_POST, 'hdImage');
		$isSuccessfull = null;
		$dataimg;
		// Validate input 	
		
		if(!empty($_FILES['fpVenPicture']['tmp_name'])){
			$image = addslashes($_FILES['fpVenPicture']['tmp_name']);
			$image = file_get_contents($_FILES['fpVenPicture']['tmp_name']);
			$image_size = getimagesize($_FILES['fpVenPicture']['tmp_name']);
			if($image_size == false){
				$isSuccessfull = false;
			}
			else{	
				$dataimg = $image;
				$isSuccessfull = true;
			}
		}
		elseif(isset($venPicture )){
			$dataimg = base64_decode($venPicture);
			$isSuccessfull = true;
		}
		else{
		
		}
		
		if($isSuccessfull){
			$isSuccessfull = $data->edit_vendor($venID, $venName, $venDescription, $venFacebook, $venTwitter, $venInstagram, $venWebsite,$dataimg);
		}
		$vendors = $data->get_vendors();
		$vendor = $data->get_vendor_by_id($venID);
		include '../View/Edit_Vendor.php';
		
		break;
	case 'edit_vendor_get':
		$venID = filter_input(INPUT_GET, 'vendorID');
		$venName = filter_input(INPUT_GET, 'venName');
		$venDescription = filter_input(INPUT_GET, 'venDescription');
		$venFacebook = filter_input(INPUT_POST, 'venFacebook');
		$venTwitter = filter_input(INPUT_POST, 'venTwitter');
		$venInstagram = filter_input(INPUT_POST, 'venInstagram');
		$venWebsite = filter_input(INPUT_POST, 'venWebsite');
		$venPicture = filter_input(INPUT_POST, 'hdImage');
		$isSuccessfull = null;
		$dataimg;
		// Validate input 	
		if(!isset($_FILES['image']))
		{
			$isSuccessfull = false;
		}
		elseif(!empty($_FILES['fpVenPicture']['tmp_name'])){
			include "crash_here";
			$image = addslashes($_FILES['fpVenPicture']['tmp_name']);
			$image = file_get_contents($_FILES['fpVenPicture']['tmp_name']);
			$image_size = getimagesize($_FILES['fpVenPicture']['tmp_name']);
			if($image_size == false){
				$isSuccessfull = false;
			}
			else{	
				$dataimg = $image;
				$isSuccessfull = true;
			}
		}
		else{
			$isSuccessfull = false;
		}
		
		if($isSuccessfull){
			$isSuccessfull = $data->edit_vendor($venID, $venName, $venDescription, $venFacebook, $venTwitter, $venInstagram, $venWebsite,$dataimg);
		}
		$vendors = $data->get_vendors();
		$vendor = $data->get_vendor_by_id($venID);
		include '../View/Edit_Vendor.php';
		
		break;

//////EDIT VENDOR END







///ADMIN MODEL

public function add_vendor($venName, $venDescription, $venFacebook, $venTwitter, $venInstagram, $venWebsite,$venPicture)
{
	
	$query = 'CALL uspAddVendors(:venName, :venDescription,:venFacebook, :venTwitter, :venInstagram, :venWebsite,:venPicture)';
	$params = array(
	':venName'=>$venName,
	':venDescription'=>$venDescription,
	':venFacebook'=>$venFacebook, 
	':venTwitter'=>$venTwitter, 
	':venInstagram'=>$venInstagram,
	':venWebsite'=>$venWebsite,	
	':venPicture'=>$venPicture);
	return DBHelper::Execute($query, $params); 
}

public function edit_vendor($ven_ID, $venName, $venDescription, $venFacebook, $venTwitter, $venInstagram, $venWebsite,$venPicture)
{
	
	$query = 'CALL uspUpdateVendor(:venID,:venName, :venDescription,:venFacebook, :venTwitter, :venInstagram, :venWebsite,:venPicture)';
	$params = array(
	':venID'=>$ven_ID,
	':venName'=>$venName,
	':venDescription'=>$venDescription,
	':venFacebook'=>$venFacebook, 
	':venTwitter'=>$venTwitter, 
	':venInstagram'=>$venInstagram,
	':venWebsite'=>$venWebsite,	
	':venPicture'=>$venPicture);
    return DBHelper::Execute($query, $params);
}
	public function edit_vendors()
	{
		$ven_ID = '3';
		$venName = 'BooBeast';
		$venDescription = 'Selling Bae boo';
		$venFacebook = null;
		$venTwitter = null; 
		$venInstagram = null; 
		$venWebsite = null;
		$venPicture = null;
		
		$query = 'CALL uspUpdateVendor(:venID,:venName, :venDescription,:venFacebook, :venTwitter, :venInstagram, :venWebsite,:venPicture)';
		$params = array(
		':venID'=>$ven_ID,
		':venName'=>$venName,
		':venDescription'=>$venDescription,
		':venFacebook'=>$venFacebook, 
		':venTwitter'=>$venTwitter, 
		':venInstagram'=>$venInstagram,
		':venWebsite'=>$venWebsite,	
		':venPicture'=>$venPicture);
		return DBHelper::Execute($query, $params);
	}
	public function add_picture($galPic,$galDesc, $galDate)
	{ 
		$query = 'CALL uspAddPicture(:galPic,:galDate,:galDescription)';
		$params = array(
		':galPic'=>$galPic,
		':galDate'=>$galDate,
		':galDescription'=>$galDesc		
		);
		return DBHelper::Execute($query, $params);
	}

  






