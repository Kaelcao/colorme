<?php

/**
 * Created by PhpStorm.
 * User: caoan
 * Date: 11/20/2015
 * Time: 6:54 AM
 */
class CM_String
{
    private $CI;

    public function  __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('quanlylophoc/lophoc');
    }

    public function random($length = 10, $char = FALSE)
    {
        if ($char == FALSE) $s = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwyz0123456789!@#$%^&*()';
        else $s = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwyz0123456789';
        mt_srand((double)microtime() * 1000000);
        $salt = '';
        for ($i = 0; $i < $length; $i++) {
            $salt = $salt . substr($s, (mt_rand() % (strlen($s))), 1);
        }
        return $salt;
    }

    public function encrypt_password($username = '', $password = '', $salt = '')
    {
        return md5($salt . md5($salt . $password . $username . $salt) . $salt);
    }

    public function ecrypt_token($token)
    {
        return md5($token);
    }

    public function allow_post($param, $allow)
    {
        $temp = NULL;
        if (isset($param) && count($param) && isset($allow) && count($allow)) {
            foreach ($param as $key => $val) {
                if (in_array($key, $allow) == TRUE) {
                    $temp[$key] = $val;
                }
            }
            return $temp;
        }
        return $param;
    }

    public function php_redirect($url = '')
    {
        header('Location: ' . base_url($url));
        die;
    }

    public function js_redirect($alert, $url)
    {

        die("<script>alert('$alert');window.location='" . base_url($url) . "';</script>");
    }

    public function encrypt_cookie($cookie)
    {
        return $this->random(10) . base64_encode($cookie);
    }

    // lay so nguoi dang ki nhung khoa moi nhat
    public function songuoidangkymoi()
    {
        $courses = $this->CI->db->get("course")->result();
        $songuoidangky = 0;
        $lastestgen = $this->CI->lophoc->get_newest_gen();
        $songuoidangky += $this->CI->db->from('regis')->join('class', 'cm_class.id=cm_regis.classid')->where(array('cm_class.gen' => $lastestgen))->count_all_results();
        return $songuoidangky;
    }

    public function decrypt_cookie($cookie)
    {
        return base64_decode(substr($cookie, 10));
    }


    public function send_email($student, $class, $leadname)
    {
        error_reporting(E_ERROR);
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'colorme.idea@gmail.com',
            'smtp_pass' => 'thanghungkhi',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $this->CI->load->library('email');
        $this->CI->email->set_newline("\r\n");
        $this->CI->email->from('colorme.idea@gmail.com', 'Trường học thiết kế colorME');
        $this->CI->email->to($student['email']);
        $this->CI->email->cc('trangdo95@gmail.com');
        $this->CI->email->bcc('colorme.idea@gmail.com');

        $this->CI->email->subject('Xác nhận đăng kí thành công');
        $message =
            "
Chào bạn. colorME đã nhận được form đăng kí từ bạn.
Trong 24h tới, chúng mình sẽ chủ động liện hệ với bạn để trò chuyện và giải đáp các thắc mắc của bạn về khóa học sắp tới.

Chúc bạn một ngày tốt lành!
Thân ái, colorME

Dấu thời gian :
1. Họ và tên : " . $student['fullname'] . "
2. Bạn là Adam hay Eva? : " . $student['gender'] . "
3. Ngày sinh : " . $student['dob'] . "
4. Email của bạn? : " . $student['email'] . "
5. Số điện thoại : " . $student['phone'] . "
6. Địa chỉ hiện tại : " . $student['address'] . "
7. Bạn đang là? : " . $student['position'] . "
8. Nơi bạn đang học/làm : " . $student['workplace'] . "
9. Link facebook của bạn : " . $student['facebook'] . "
10. Bạn biết đến lớp học qua kênh nào? : " . $student['howknow'] . "
11. Lớp bạn muốn đăng kí? : " . $class['name'] . "
12. Buổi học " . $class["name"] . " mà bạn muốn tham gia : " . $class['studyday'] . "
13. Tên nhóm trưởng của bạn : " . $leadname . "

            ";
        $this->CI->email->message($message);

        $this->CI->email->send();

//        echo $this->CI->email->print_debugger();
    }
    public function get_current_time(){
        return gmdate('Y-m-d H:i:s', time() + 7 * 3600);
    }

    public function send_email_noptien($student, $class)
    {
        error_reporting(E_ERROR);
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'colorme.idea@gmail.com',
            'smtp_pass' => 'thanghungkhi',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $this->CI->load->library('email');
        $this->CI->email->set_newline("\r\n");
        $this->CI->email->from('colorme.idea@gmail.com', 'Trường học thiết kế colorME');
        $this->CI->email->to($student['email']);
        $this->CI->email->cc('thanghungkhi@gmail.com');
        $this->CI->email->bcc('colorme.idea@gmail.com');

        $this->CI->email->subject('Xác nhận đã nộp tiền học');
        $message =
            "
Chào bạn " . $student['fullname'] . ",

colorME xin xác nhận bạn đã đóng " . $student['tiennop'] . " vào lúc " . $student['paidtime'] . "

Chúc mừng các bạn đã chính thức gia nhập vào đại gia đình colorMEans.
Các bạn có nhớ buổi hẹn hò đầu tiên của chúng ta không?

1.Thông tin buổi hẹn như sau:
- LỚP: " . $class['number'] . "." . $class['classname'] . "
- Địa điểm: Tầng 5, số 175 Chùa Láng, Đống Đa, Hà Nội.
- Thời gian học: " . $class['studyday'] . "
- Ngày khai giảng: " . $class['startdate'] . "
- Số buổi học: " . $class['duration'] . "
- Giảng viên: " . $class['lecturername'] . "
- Trợ giảng: " . $class['taname'] . "
Timeline lớp học: " . $class['linktimeline'] . "
Lưu ý khi tham gia lớp học: " . $class['linknoiquy'] . "

2. Cần mang gì đến buổi hẹn?
Mỗi bạn chuẩn bị một laptop cho riêng mình.
Về phần mềm thiết kế, các bạn tải phần mềm tại:
Phầm mềm cho Windows:
" . $class['linkphanmemwindow'] . "
Phầm mềm cho Mac:
" . $class['linkphanmemmac'] . "
(Giảng viên sẽ cài phần mềm cho bạn vào buổi đầu tiên, bạn chỉ cần tải về trước thôi, lưu ý chỉ tải bản Windows nếu bạn dùng Windows Laptop, chỉ tải bản Mac nếu bạn dùng Macbook)

Các bạn nhớ đến sớm 30 phút ở buổi đầu tiên để chúng mình giúp các bạn cài đặt nhé.
Và quan trọng nhất đó chính là con người bạn với tinh thần “Stay hungry-Stay foolish” (Đói khát – Điên dại) để học những điều thú vị nhất về thiết kế!


3. Bí kíp để có mối quan hệ lâu dài với thiết kế
Các bạn hãy join vào fb group của lớp học để trao đổi kinh nghiệm về thiết kế. Đây cũng là
nơi để các bạn trưng bày các sản phẩm thiết kế (Bài tập về nhà) mà chắc chắn có người
chiêm ngưỡng và góp ý cho bạn.
Link: facebook.com/groups/colorME" . $class['number'] . "." . $class['classname'] . "

4. Tài khoản của bạn
Đây là thông tin về tài khoản đăng nhập của bạn, giảng viên sẽ hướng dẫn bạn dùng hệ thống của colorME trong buổi đầu tiên nhé :))

Tên đăng nhập: " . $student['realid'] . "
Mật khẩu: " . $student['email'] . "

Hẹn gặp các bạn vào " . $class['startdate'] . " nhé!

Thân mến,
colorME team.

colorME Design School
A: No. 175, Chua Lang St, Dong Da, Hanoi.
F: https://www.facebook.com/ColorME.Hanoi
E: colorme.idea@gmail.com
M: + (84) 127 207 3296
            ";
        $this->CI->email->message($message);

        $this->CI->email->send();

//        echo $this->CI->email->print_debugger();
    }

    public function send_email_kichhoat($student, $class)
    {
        error_reporting(E_ERROR);
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'colorme.idea@gmail.com',
            'smtp_pass' => 'thanghungkhi',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $this->CI->load->library('email');
        $this->CI->email->set_newline("\r\n");
        $this->CI->email->from('colorme.idea@gmail.com', 'Trường học thiết kế colorME');
        $this->CI->email->to($student['email']);
        $this->CI->email->cc('thanghungkhi@gmail.com');
        $this->CI->email->bcc('colorme.idea@gmail.com');

        $this->CI->email->subject('Đã đến lúc đi học thiết kế rồi!');
        $message =
            "
Chào bạn " . $student['fullname'] . ",

Chúc mừng các bạn đã chính thức gia nhập vào đại gia đình colorMEans.
Các bạn có nhớ buổi hẹn hò đầu tiên của chúng ta không?

1.Thông tin buổi hẹn như sau:
- LỚP: " . $class['number'] . "." . $class['classname'] . "
- Địa điểm: Tầng 5, số 175 Chùa Láng, Đống Đa, Hà Nội.
- Thời gian học: " . $class['studyday'] . "
- Ngày khai giảng: " . $class['startdate'] . "
- Số buổi học: " . $class['duration'] . "
- Giảng viên: " . $class['lecturername'] . "
- Trợ giảng: " . $class['taname'] . "
Timeline lớp học: " . $class['linktimeline'] . "
Lưu ý khi tham gia lớp học: " . $class['linknoiquy'] . "

2. Cần mang gì đến buổi hẹn?
Mỗi bạn chuẩn bị một laptop cho riêng mình.
Về phần mềm thiết kế, các bạn tải phần mềm tại:
Phầm mềm cho Windows:
" . $class['linkphanmemwindow'] . "
Phầm mềm cho Mac:
" . $class['linkphanmemmac'] . "
(Giảng viên sẽ cài phần mềm cho bạn vào buổi đầu tiên, bạn chỉ cần tải về trước thôi, lưu ý chỉ tải bản Windows nếu bạn dùng Windows Laptop, chỉ tải bản Mac nếu bạn dùng Macbook)

Các bạn nhớ đến sớm 30 phút ở buổi đầu tiên để chúng mình giúp các bạn cài đặt nhé.
Và quan trọng nhất đó chính là con người bạn với tinh thần “Stay hungry-Stay foolish” (Đói khát – Điên dại) để học những điều thú vị nhất về thiết kế!


3. Bí kíp để có mối quan hệ lâu dài với thiết kế
Các bạn hãy join vào fb group của lớp học để trao đổi kinh nghiệm về thiết kế. Đây cũng là
nơi để các bạn trưng bày các sản phẩm thiết kế (Bài tập về nhà) mà chắc chắn có người
chiêm ngưỡng và góp ý cho bạn.
Link: facebook.com/groups/colorME" . $class['number'] . "." . $class['classname'] . "

4. Tài khoản của bạn
Đây là thông tin về tài khoản đăng nhập của bạn, giảng viên sẽ hướng dẫn bạn dùng hệ thống của colorME trong buổi đầu tiên nhé :))

Tên đăng nhập: " . $student['realid'] . "
Mật khẩu: " . $student['email'] . "

Hẹn gặp các bạn vào " . $class['startdate'] . " nhé!

Thân mến,
colorME team.

colorME Design School
A: No. 175, Chua Lang St, Dong Da, Hanoi.
F: https://www.facebook.com/ColorME.Hanoi
E: colorme.idea@gmail.com
M: + (84) 127 207 3296
            ";
        $this->CI->email->message($message);
//        echo $message;

        $this->CI->email->send();

//        echo $this->CI->email->print_debugger();
    }

}