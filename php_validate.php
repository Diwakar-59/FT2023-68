<?php
/**
 * This class is responsible for all the PHP validation. 
 */

class validate
{
  public $fname_error = '';
  public $lname_error = '';
  public $gender_error = '';
  public $email_error = '';
  public $phone_error = '';
  public $fname = '';
  public $lname = '';
  public $gender = '';

  /**
   * @param [str] $data - The parameter is the data entered by the user.
   * This function is for removing the extra spaces, slashes and special characters from the data entered.
   * @return string
   */
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  /**
   * @param [str] $text - This is the first name entered by the user.
   * This function validates the first name entered by the user.
   * @return void
   */
  function validate_First_Name($text) {
    if (empty($text)) {
      $this->fname_error = "First Name is required";
    } 
    else {
      $fname = $this->test_input($text);
      if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
        $this->fname_error = "Only letters and white space allowed";
      }
    }
  }
    /**
   * @param [str] $text - This is the last name entered by the user.
   * This function validates the last name entered by the user.
   * @return void
   */
  function validate_Last_Name($text) {
    if (empty($text)) {
      $this->lname_error = "Last name is required";
    } 
    else {
      $lname = $this->test_input($text);
      if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
        $this->lname_error = "Only letters and white space allowed";
      }
    }
  }
    /**
   * @param [str] $text - This is the phone number entered by the user.
   * This function validates the phone number entered by the user.
   * @return void
   */
  function validate_Phone($text) {
    if (empty($text)) {
      $this->phone_error = "Phone number is required";
    } 
    else {
      $phone = $this->test_input($text);
      if (!preg_match("/^(\+91)[0-9]{10}$/", $phone)) {
        $this->phone_error = "Enter a valid mobile number with country code";
      }
    }
  }
    /**
   * @param [str] $text - This is the email entered by the user.
   * This function validates the email entered by the user.
   * @return void
   */
  function validate_Email($text) {
    if (empty($text)) {
      $this->email_error = "Email is required";
    } else {
      $email = $this->test_input($text);
      if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)) {
        $this->email_error = "Enter a valid email";
      }
    }
  }
    /**
   * @param [str] $text - This is the first name entered by the user.
   * This function validates the email entered by the user via API..
   * @return void
   */
  // 
  function validateEmail() {
    $email = $_POST['email'];
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.apilayer.com/email_verification/check?email=$email",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: text/plain",
        "apikey: Y5r66DpVyLcVDcntuj5yNVPdBKxzpor6"
      ),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET"
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $obj = json_decode($response);
    if ($obj->format_valid == TRUE && $obj->smtp_check == TRUE) {
      return TRUE;
    } 
    else {
      return FALSE;
    }
  }
}
?>
