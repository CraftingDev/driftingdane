<?php

class P extends Base

{
    public function __construct()
    {
        // Inherents from base constructor
        parent::__construct();
    }

    public function index() {

        $data = [

            'title' => 'Home',
            'siteName' => $this->site->site_name,
            'siteDesc' => $this->site->site_desc,
            'siteWelcome' => $this->site->site_welcome,
            'siteImg' => $this->site->site_logo,
            'ogImg' => '/all_img/img/share-home.jpg',
            'slider' => $this->slider
        ];

        $this->standardIndex($data);
    }

    public function webVersion() {

        $content = $this->pageModel->getNews();

        $data = [

            'title' => $content->ns_title,
            'siteName' => $this->site->site_name,
            'siteDesc' => $this->site->site_desc,
            'siteImg' => $this->site->site_logo,
            'ogImg' => '/all_img/img/logo.png',
            'content' => $content->ns_msg,
        ];

        $this->standardHeader($data);
        $this->view('p/webVersion', $data);

    }

    public function about(){

        $data = [
            'title' => 'About Us',
            'siteName' => $this->site->site_name,
            'siteDesc' => $this->site->site_about,
            'siteImg' => $this->site->site_logo,
            'ogImg' => '/all_img/img/share-about.jpg',
            'siteAbout' => $this->site->site_about,
            'creator' => $this->site->site_contact_name
        ];

        $this->standardAbout($data);
    }


    public function contact()
    {

        $data = [

            'title' => 'Contact',
            'siteImg' => $this->site->site_logo,
            'ogImg' => '/all_img/img/share-contact.jpg',
            'siteName' => $this->site->site_name,
            'siteDesc' => $this->site->site_desc,
            'creator' => $this->site->site_contact_name,
            'mail' => $this->site->site_contact_mail,
            'addr' => $this->site->site_contact_add,
            'phone' => $this->site->site_contact_num,
            'info' => $this->site->site_contact_info,
            'about' => $this->site->site_about,
            'social' => $this->socials
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Create the post values from form
            $data = [

                'ctName' => trim($_POST['ctName']),
                'ctEmail' => trim($_POST['ctEmail']),
                'ctMsg' => trim($_POST['ctMsg']),
                'ctName_err' => '',
                'ctEmail_err' => '',
                'ctMsg_err' => '',

                'title' => 'Contact',
                'siteImg' => $this->site->site_logo,
                'ogImg' => 'share-contact.jpg',
                'siteName' => $this->site->site_name,
                'siteDesc' => $this->site->site_desc,
                'creator' => $this->site->site_contact_name,
                'mail' => $this->site->site_contact_mail,
                'addr' => $this->site->site_contact_add,
                'phone' => $this->site->site_contact_num,
                'info' => $this->site->site_contact_info,
                'about' => $this->site->site_about,
                'social' => $this->socials

            ];

            $clean =
                array(
                    'ctName' => FILTER_SANITIZE_STRING,
                    'ctMsg' => FILTER_SANITIZE_STRING,
                    'ctEmail' => FILTER_SANITIZE_EMAIL,
                );

            $_POST = filter_input_array(INPUT_POST, $clean);


            if (preg_match('/http|www/i', $data['ctMsg'])) {
                $data['ctMsg_err'] = 'Links are not allowed';
            }
            if (empty($data['ctName'])) {
                $data['ctName_err'] = 'Please enter name';
            }
            if (empty($data['ctEmail'])) {
                $data['ctEmail_err'] = 'Please enter email';
            }
            if (!filter_var($data['ctEmail'], FILTER_VALIDATE_EMAIL)) {
                $data['ctEmail_err'] = 'Email does not validate';
            }
            if (empty($data['ctMsg'])) {
                $data['ctMsg_err'] = 'Please say what is on your mind';
            }

            if (empty($data['ctName_err']) and empty($data['ctEmail_err']) and empty($data['ctMsg_err'])) {
                // Validate form
                $this->pageModel->contact_mail($data);

                flash('contact_message', 'Success! your mail was sent. Thanks.');
                redirect('p/contact');
                exit();
                // Send mail
            } else {

                $this->standardHeader();
                $this->standardNav();
                flash_error('contact_error', 'Please correct the error(s)');
                $this->view('p/contact', $data);
                $this->standardFooter();
                /// Show the view
            }
        } else {
            // Load our view
            $this->standardContact($data);
        }
    }


    public function subscribe() {

        $data =
            [
                'title' => 'Subscribe to our newsletter',
                'siteDesc' => 'Hello! i am happy you want to read my personal travel stories.',
            ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Send a token for validating user later by email
            $hash = bin2hex(random_bytes(32));
            $data =
                [
                    'title' => 'Subscribe to our newsletter',
                    'siteDesc' => 'Hello! i am happy you want to read my personal travel stories.',
                    'ownerEmail' => $this->site->site_contact_mail,
                    'email' => trim($_POST['subEmail']),
                    'hash' => $hash,
                    'subEmail_err' => ''
                ];
            
            $clean =
                array(
                    'email' => FILTER_SANITIZE_EMAIL,
                );

            $_POST = filter_input_array(INPUT_POST, $clean);

            if(empty($data['email'])) {
                $data['subEmail_err'] = "Please add a valid email";
            }

            if(empty($data['subEmail_err'])) {

                if($this->adminModel->saveEmail($data)) {
                    flash('success', 'Success! Thanks for subscribing');
                    redirect('stories');
                    $this->subscribe_greeting($data);
                } else {
                    echo "Something went wrong.";
                }

            } else {

                // Show errors
                $this->standardHeader($data);
                $this->view('stories', $data);

            }
        }
        // Show default view
        $this->standardHeader($data);
        $this->view('stories', $data);
    }



    public function subscribe_greeting($data)
    {
        $title = "Drifting Dane > Thanks for subscribing.";
        $content = "I im happy and excited about you wanting to read my personal stories.";
        // Create the Transport
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
            ->setUsername('profengbrazil@gmail.com')
            ->setPassword('Professor1976');
        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);
        // Create a message
        $message = (new Swift_Message($title))->setFrom(array('hello@driftingdane.com'))->setTo(array($data['email']))->setBody('
                    <html>
                     <body><table width="600">
                     <tr><td>
                     </td></tr>
                      <h2>' . $title . '</h2>
                       <tr><td style="font-size: 14px;">' . $content . '</td></tr>
                       <tr><td style="font-size: 14px;"><p><a href="https://driftingdane.com/p/unsubscribe">You can always unsubscribe here</a></p></td></tr>
                     </table></body>
                    </html>', "text/html");
        // Add alternative parts with addPart()
        $message->addPart($title, $content, 'text/plain');
        $headers = $message->getHeaders();
        $headers->addTextHeader('List-Unsubscribe', URLROOT. "/p/unsubscribe");
        $mailer->send($message);


    }


    public function unsubscribe()
    {
        $data =
            [
                'title' => 'Unsubscribe',
                'siteName' => $this->site->site_name,
                'siteImg' => $this->site->site_logo,
                'ogImg' => $this->site->site_logo,
            ];


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data =
                [
                    'title' => 'Unsubscribe',
                    'siteImg' => $this->site->site_logo,
                    'ogImg' => $this->site->site_logo,
                    'email' => $_POST['unEmail'],
                    'confirm_email' => $_POST['confirm_email'],
                    'unEmail_err' => '',
                    'confirm_email_err' => ''

                ];

            if(empty($data['email'])){
                $data['unEmail_err'] = "Please add a valid email";
            }
            if(empty($data['confirm_email'])){
                $data['confirm_email_err'] = "Please confirm email";
            } else {
                if ($data['email'] != $data['confirm_email']) {
                    $data['confirm_email_err'] = 'Email do not match';
                }
            }

            $san_email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
            if (filter_var($san_email, FILTER_VALIDATE_EMAIL)) {
                /// if VALID DO NOTHING
            } else {
                $data['unEmail_err'] =  "This email address is considered invalid";
            }

            if(empty($data['unEmail_err']) and empty($data['confirm_email_err'])){

                if ($this->pageModel->unsEmail($san_email)) {
                    flash('resume_message', 'You have been unsubscribed');
                    redirect('p/unsubscribe');
                    exit();
                } else {
                    exit('Something went wrong');
                }
            } else {

                // Show errors
                $this->standardHeader($data);
                $this->view('p/unsubscribe', $data);
            }
        }
        // Show default view
        $this->standardHeader($data);
        $this->view('p/unsubscribe', $data);
    }



    public function error(): string {

        return 'Page not found';
    }


}
