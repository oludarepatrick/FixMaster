<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use App\Models\Service;
use App\Models\Category;

class PageController extends Controller
{
    public function services(){

        $categories = Service::ActiveServices()->get();

        $services = Service::select('id', 'name')
        ->where('id', '!=', 1)
        ->where('is_active', '1')
        ->orderBy('name', 'ASC')
        ->with(['categories'    =>  function($query){
            return $query->select('id', 'name', 'url', 'image', 'service_id');
        }])
        ->has('categories')->get();

        $data = [
            'services'      =>  $services,
            'categories'    =>  $categories,
        ];

        return view('page.services', $data);
    }

    public function contactUs(){

        return view('page.contact');
    }

    public function sendContactMail(Request $request){

        //Validate contact form has values
        $this->validateContactUsRequest();

        $name = $request->name;
        $email = $request->email;
        $category = $request->category;
        $message = $request->message;

        // Load Composer's autoloader
        require '../vendor/autoload.php';

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();  
            $mail->CharSet = 'utf-8';                                         // Send using SMTP
            $mail->Host       = 'mail.ninthbinary.com';               // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'test@ninthbinary.com';                     // SMTP username
            $mail->Password   = 'testingpassword24';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            // $mail->SMTPSecure = env('MAIL_ENCRYPTION');         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 26;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom($email, $name);
            $mail->addAddress('info@fixmaster.com.ng');     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $name.' sent a '.$category.' message';
            $mail->Body    = $message;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $mail->clearAddresses();
            // echo 'Message has been sent';

            return redirect()->route('page.contact')->with('success', 'Message has been sent');

        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

            return back()->with('error', "Message could not be sent. Mailer Error: {$mail->ErrorInfo}")->withInput();
        }

        return back()->withInput();
    }

    /**
     * Validate user input fields
     */
    private function validateContactUsRequest(){
        return request()->validate([
            'name'      =>   'required',
            'email'     =>   'required',
            'category'  =>   'required',
            'message'   =>   'required',
        ]);
    }

    public function serviceDetails($url){

        $urlExists = Category::where('url', $url)->first();

        if(!empty($urlExists)){

            $data = [
                'service' =>  $urlExists,
            ];

            return view('page.service_details', $data);
        }else{
            return back();
        }
    }

    public function searchCategories(Request $request){
        if($request->ajax()){

            $query = $request->get('query');
            $query2 = $request->get('query');
            $type = $request->type;

            if($type == 'Name'){
                $services = Category::select('id', 'name', 'url', 'image', 'service_id')
                ->where('name', 'LIKE', '%'.$query.'%')
                ->orWhere('description', 'LIKE', '%'.$query.'%')
                ->get();

            }

            if($type == 'ID'){

                $services = Category::select('id', 'name', 'url', 'image', 'service_id')
                ->where('service_id', $query)
                ->with(['service'    =>  function($query){
                    return $query->select('name', 'id');
                }])->get();

                if(count($services) == 0){
                    $query = Service::where('id', $query2)->first()->name;
                }
            }

            $data = [
                'services'  =>  $services,
                'query'     =>  $query,
                'type'      =>  $type,
            ];

            return view('page._service_search', $data);
        }

    }
}
