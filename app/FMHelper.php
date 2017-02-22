<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 20/02/17
 * Time: 10:06 AM
 */

namespace App;



use Illuminate\Database\Eloquent\Model;
use App\Fmroorder;



/**
 * App\FMHelper
 *
 * @mixin \Eloquent
 */
class FMHelper extends \Eloquent
{

    /**
     * Uses a curl session, assumed to be global $ch, already initialized.
     * It will use post_fields, call cUrl and output the results
     * @param mixed $post_fields
     */
    function getIt($post_fields) {
        global $ch;
        # var_dump($post_fields);
        # set fields in the POST
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query($post_fields) );
        # echo http_build_query($post_fields);
        # Send request.
        $result = curl_exec($ch);
        echo $result;

        //505 = duplicate unique number
    }


    /**
     *
     */
    function sendNewOrder(Fmroorder $ddda){

        $data = '';
        $req_identifier = '';
        $ddda->toJson();

        $order = Fmroorder::findOrFail(1);

       // FMROOrder::findOrFail(1)->

        #$req_identifier = 'pj_other_72ks!c9'; // for pro-jet customer DO NOT USE UNTIL APPROVED
        $req_identifier = 'psoft_test'; // for test environment
        $url='http://107.22.170.54/EXTgateway/Gateway.php';

        //$order->

        // $order->$CustomerContactPhoneNumber = "514-317-9317";




        echo "debug, json data" . $data;
        $ch = curl_init( $url );
        curl_setopt($ch, CURLOPT_POST, 1);
#set proper doc type
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('application/x-www-form-urlencoded; charset=UTF-8'));
# Return response instead of printing.
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

# add order example
        $fields = array( 'requestIdentifier' => $req_identifier,
            'jsonData'=> $data,
            'addRoOrder'=>'true',
        );
        getIt($fields);
    }

}