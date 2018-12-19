# Goats: Goat Organize Application Tracking System

### If you want to test this project: 
1. Create database 'mgmf'
2. Open command prompt and go to the root directory of this project and execute this:

	php index.php migrate latest


## 2018.11.24 - Faker and Carbon (Add via Composer) ./application/config/config.php

```php
include_once 'vendor/autoload.php';
```
Example using carbon:

```php
Carbon\Carbon::now();
```
## 2018.11.25 - Add a hover effect on sidebar

```css
.sidebar ul li div.collapse a.nav-link:hover {
  background-color: #6c757d !important;
  color: #fff !important;
}

.sidebar ul li div.collapse a.nav-link:hover span.fa {
  color: #fff !important;
}
```


## Added Custom Form Validation
```php
	//Check the input value is a valid account type
	//just add this 'account_type' to the form_validation
	public function account_type($str){
		
		if($str == 'admin' || $str == 'employee' || $str == 'superuser') return true;
		return false;

	}

	//Check the input value contains alpha characters and space//just add this 'alpha_spaces' to the form_validation
	public function alpha_spaces($str)
	{
		return (bool) preg_match('/^[A-Z ]+$/i', $str);
	}

	//Use to check if the email address is registered before the user can forgot password
	//just add this 'is_exist[user_account.Email]' to the form_validation
	public function is_exist($str, $field)
	{
		
		sscanf($field, '%[^.].%[^.]', $table, $field);
		
		if(isset($this->CI->db)){

			return ($this->CI->db->limit(1)->get_where($table, array($field => $str))->num_rows() === 0 ? FALSE : TRUE);

		}

		return FALSE;
	}


	//Use to check if the Ear tag ID for Dam exist
	//just add this 'is_dam_exist[goat_profile.eartag_id]' to the form_validation
	public function is_dam_exist($str, $field)
	{
		
		sscanf($field, '%[^.].%[^.]', $table, $field);
		
		if(isset($this->CI->db)){

			//If the eartag ID is not exist return FALSE, otherwise TRUE
			return ($this->CI->db->limit(1)->get_where($table, array($field => $str,"gender" => "female"))->num_rows() === 0 ? FALSE : TRUE);

		}

		return FALSE;
	}	

	//Use to check if the Ear tag ID for Sire exist
	//just add this 'is_sire_exist[goat_profile.eartag_id]' to the form_validation
	public function is_sire_exist($str, $field)
	{
		
		sscanf($field, '%[^.].%[^.]', $table, $field);
		
		if(isset($this->CI->db)){
			//If the eartag ID is not exist return FALSE, otherwise TRUE
			return ($this->CI->db->limit(1)->get_where($table, array($field => $str,"gender" => "male"))->num_rows() === 0 ? FALSE : TRUE);

		}

		return FALSE;
	}	




```

## 2018.12.2 Add enable/disable function for is_castrated

```javascript

	$(document).ready(function () {
		$('#gender').change(function () {
			
			if($(this).val() == 'male'){
				
				$("#is_castrated").prop("disabled",false);

			}else{

				$("#is_castrated").prop("checked",false);
				$("#is_castrated").prop("disabled",true);

			}
		})
	});

```

## 2018.12.10 Add date validation for breeding
### Prevent users to enter dates ahead the current date. 
```php

	public function check_date($date){

		$dx = new DateTime();
		$d = strtotime($date);

		if($d > $dx->getTimestamp()){
			return false;
		}

		return true;
	}
	

```

#### Prevent access if the system date and time is not synchronize and the input is a future date