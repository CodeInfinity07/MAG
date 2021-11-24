<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  CinetPay\CinetPay ;
use App\Models\User;


class CinetController extends Controller
{
    public function payment(Request $request, $id){
      $apiKey = "14232706895f4bbe437dc474.83362488" ; // Please enter your apiKey
      $site_id = "624902" ; // Please enter your siteId
      $id_transaction = CinetPay :: generateTransId (); // Payment ID
      $description_of_payment = sprintf ( 'My ref product% s' , $id_transaction); // Description of Payment
      $date_transaction = date('Y-m-d H:i:s'); // Payment date in your system
      $amount_to_payer = 20849.50; // Amount to Pay: minimum is 100 francs on CinetPay
      $currency = 'XOF' ; // Amount to Pay: minimum is 100 francs on CinetPay
      $identifier_du_payeur = $id; // Put here some information that will allow you to uniquely identify the payer
      $formName = "goCinetPay" ; // name of the CinetPay form
      $notify_url = '/payment_notify/'.$id;
      $return_url = '';
      $cancel_url = '';
      $btnType = 2 ; // 1-5xwxxw
      $btnSize = 'large' ;// 'small' to reduce the size of the button, 'large' for a medium size or 'larger' for a larger size

      // Configure the CinetPay basket and display the form
      $cp = new  CinetPay ( $site_id , $apiKey );
      try {
           $cp->setTransId ( $id_transaction )
              ->setDesignation ( $description_of_payment )
              ->setTransDate($date_transaction)
              ->setAmount ( $amount_to_payer )
              ->setCurrency($currency)
              ->setDebug (true) // Set to true, if you want to activate debug mode on cinetpay in order to display all the variables sent to CinetPay
              ->setCustom ( $identifier_du_payeur ) // optional
              ->setNotifyUrl ($notify_url) // optional
              ->setReturnUrl ($return_url) // optional
              ->setCancelUrl ($cancel_url) // optional
              ->displayPayButton ($formName, $btnType, $btnSize);
      } catch (Exception $e) {
          print_r($e->getMessage());
      }

    }

    public function notify(Request $request, $id){
      $id_transaction = $request->cpm_trans_id;
      if (!empty($id_transaction)) {
           try {
               $apiKey = "14232706895f4bbe437dc474.83362488" ; // Please enter your apiKey
               $site_id = "624902" ; // Please enter your siteId

               $cp = new CinetPay($site_id, $apiKey);

              // Reprise exacte des bonnes données chez CinetPay
              $cp->setTransId($id_transaction)->getPayStatus();
              $paymentData = [
                  "cpm_site_id" => $cp->_cpm_site_id,
                  "signature" => $cp->_signature,
                  "cpm_amount" => $cp->_cpm_amount,
                  "cpm_trans_id" => $cp->_cpm_trans_id,
                  "cpm_custom" => $cp->_cpm_custom,
                  "cpm_currency" => $cp->_cpm_currency,
                  "cpm_payid" => $cp->_cpm_payid,
                  "cpm_payment_date" => $cp->_cpm_payment_date,
                  "cpm_payment_time" => $cp->_cpm_payment_time,
                  "cpm_error_message" => $cp->_cpm_error_message,
                  "payment_method" => $cp->_payment_method,
                  "cpm_phone_prefixe" => $cp->_cpm_phone_prefixe,
                  "cel_phone_num" => $cp->_cel_phone_num,
                  "cpm_ipn_ack" => $cp->_cpm_ipn_ack,
                  "created_at" => $cp->_created_at,
                  "updated_at" => $cp->_updated_at,
                  "cpm_result" => $cp->_cpm_result,
                  "cpm_trans_status" => $cp->_cpm_trans_status,
                  "cpm_designation" => $cp->_cpm_designation,
                  "buyer_name" => $cp->_buyer_name,
              ];
              // Retrieve the row of the transaction in your database

              // Check the status of the order processing

              // If the payment is good then do not process this transaction anymore: die ();

              // We check that the amount paid to CinetPay corresponds to our amount in the database for this transaction

              // We check that the payment is valid
              if ( $cp -> isValidPayment ()) {
                   $user = User::where('id',$id)->first();
                   $user->account_type = 'premium';
                   $user->save();
                   return redirect('/dashboard_new');
              } else {
                   print_r('Failed, your payment failed due to:'.$cp-> _cpm_error_message);
              }
          } catch (Exception  $e ) {
               // An error has occurred
              echo  "Error:" . $e -> getMessage ();
          }
      } else {
           // redirect to the home page
          die ();
      }
    }
}
