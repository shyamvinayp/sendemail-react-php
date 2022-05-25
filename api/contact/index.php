<?php
/**
 * Including class files
 */
include_once('classes/sendmail.php');
include_once('classes/jokes.php');
include_once('config.php');

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Content-Type');
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);

if( empty($_POST['email']) ) {
    echo json_encode(
        [
           "sent" => false,
           "message" => $SendMailEmptyerrorMessage
        ]
    ); 
    exit();
}


if ($_POST){
    http_response_code(200);
    $recipientsMails = explode(', ', $_POST['email']);
    $count = count($recipientsMails);

    /**
     *  Instantiated Jokes class object to get the Jokes
     */
    $jokes = new Jokes($count);
    $jokes = $jokes->getJokes();

    $i=0;
    usort($recipientsMails,'emailSortByDomain');
    foreach($jokes as $key=> $joke){
        $to = $recipientsMails[$i];
        $recipientName = explode('@', $to)[0];
        $subject = 'Jokes send to - '.$recipientName ;
        $message = $joke->joke;

        // HTML TEMPLATE READ INTO STRING
        $html = file_get_contents("emailTemplate.html");
        //String Replace from email template
        $html = str_replace("{SUBJECT}", $subject, $html);
        $html = str_replace("{USERNAME}", ucfirst($recipientName), $html);
        $html = str_replace("{MESSAGE}", $joke->joke, $html);
        $html = str_replace("{TIME}", date("Y-m-d H:i:s"), $html);

        /**
         * Instantiated Mail Sender class object to send the email to recipients
         */
        $sendEmail = new Sender($adminEmail, $to, $subject, $html);
        $sendEmail->send();

        $i++;
    }

    echo json_encode(array("sent" => true));

} else {
 echo json_encode(
     [
        "sent" => false,
        "message" => $SendMailFailederrorMessage
     ]
 );
}

/**
 * This function is used to sort emails domain wise
 *
 * @param $emails
 * @param $domain
 * @return int
 */
function emailSortByDomain($emails, $domain){
    list($aMailbox,$aDomain) = explode('@',$emails);
    list($bMailbox,$bDomain) = explode('@',$domain);

    if ($aDomain == $bDomain) {
        return ($aMailbox < $bMailbox) ? -1 : 1;
    }
    return ($aDomain < $bDomain) ? -1 : 1;
}


