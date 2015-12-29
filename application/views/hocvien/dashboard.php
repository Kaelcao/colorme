<style>
    .actionBar .btn-default {
        display: none;
    }

    .cauhoi {
        color: #c50000;
    }
</style>
<div class="row">
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>Survey 1 và nộp bài tập giữa kì </h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <!-- Smart Wizard -->

                <div id="wizard" class="form_wizard wizard_horizontal">
                    <ul class="wizard_steps">
                        <li>
                            <a href="#step-1">
                                <span class="step_no">1</span>
                                <span class="step_descr">
                                    Bước 1<br/>
                                    <small>Hoàn thành survey #1</small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-2">
                                <span class="step_no">2</span>
                                <span class="step_descr">
                                    Bước 2<br/>
                                    <small>Nộp bài tập giữa kì</small>
                                </span>
                            </a>
                        </li>


                    </ul>
                    <div id="step-1">
                        <?php
                        if ($complete_survey_one) {
                            echo "<div><h2 class='text-center'><i class='fa fa-check fa-4x'></i>Bạn đã hoàn thành survey, bấm <strong>next</strong> để nộp hoặc chỉnh sửa link bài giữa kì</h2> </div>";
                        } else {
                            echo
                            "
                                <form role=\"form\">
                            <div class=\"form-group\">
                                <label for=\"clb\" class='cauhoi'>Bạn có đang tham gia nhóm/ CLB nào mà có hoạt động thiết kế nào
                                    không?*</label>
                                <input required type=\"text\" class=\"form-control\" id=\"clb\" name=\"clb\">
                            </div>
                            <div class=\"form-group\">
                                <label for=\"hailong\" class='cauhoi'>Bạn thấy hài lòng thế nào với kiến thức mình học được tới hiện tại?
                                    *</label>
                                <div id=\"stars-existing\" class=\"starrr lead\" data-rating='4'></div>
                                Cảm ơn bạn đã dành tặng <span id=\"count-existing\">4</span> sao cho chất lượng đào tạo của colorME
                            </div>
                            <div class=\"form-group\">
                                <label for=\"yeutochon\" class='cauhoi'>Yếu tố nào khiến bạn chọn colorME mà không chọn nơi khác?
                                    *</label>
                                
                                        <div class=\"checkbox\">
                                            <label><input name=\"yeutochon\" type=\"checkbox\" id=\"yeutochon\" value=\"colorME có thầy giỏi\">colorME có thầy giỏi</label>
                                        </div>
                                        <div class=\"checkbox\">
                                            <label><input name=\"yeutochon\" type=\"checkbox\" id=\"yeutochon\" value=\"colorME giá rẻ quá\">colorME giá rẻ quá</label>
                                        </div>
                                        <div class=\"checkbox\">
                                            <label><input name=\"yeutochon\" type=\"checkbox\" id=\"yeutochon\" value=\"colorME ngay gần chỗ mình học/ làm/ ở\">
                                                colorME ngay gần chỗ mình học/ làm/ ở</label>
                                        </div>
                                        <div class=\"checkbox\">
                                            <label><input name=\"yeutochon\" type=\"checkbox\" id=\"yeutochon\" value=\"Mình được biết nội dung khóa học rất hay\">
                                                Mình được biết nội dung khóa học rất hay</label>
                                        </div>
                                        <div class=\"checkbox\">
                                            <label><input name=\"yeutochon\" id=\"yeutochon\" type=\"checkbox\" value=\"Bạn mình cứ lôi kéo học cùng. Thôi thì học cho biết.\">
                                                Bạn mình cứ lôi kéo học cùng. Thôi thì học cho biết.</label>
                                        </div>
                                        <label>Yếu tố khác
                                        <input name=\"yeutochon\" id=\"yeutochonkhac\" type=\"text\" class=\"form-control\" value=\"\"/> 
                                        </label>
                                        
                            </div>
                            <div class=\"form-group\">
                                <label for=\"noikhac\" class='cauhoi'>Bạn có biết những nơi nào cũng dạy thiết kế như colorME không?
                                    *</label>
                                <input required type=\"text\" class=\"form-control\" id=\"noikhac\" name=\"noikhac\">
                            </div>
                            <div class=\"form-group\">
                                <label for=\"lydo\" class='cauhoi'>Tại sao bạn muốn học thiết kế Photoshop cơ bản? *</label>
                                
                                <div class=\"checkbox\">
                                       <label><input name=\"lydo\" id=\"lydo\" type=\"checkbox\" value=\"Để thiết kế slides, phục vụ thuyết trình\">Để thiết kế slides, phục vụ
                                           thuyết trình</label>
                                   </div>
                                   <div class=\"checkbox\">
                                       <label><input name=\"lydo\" id=\"lydo\" type=\"checkbox\" value=\"Để thiết kế CV\">Để thiết kế CV</label>
                                   </div>
                                   <div class=\"checkbox\">
                                       <label><input name=\"lydo\" id=\"lydo\" type=\"checkbox\" value=\"Để thiết kế các ấn phẩm truyền thông\">
                                           Để thiết kế các ấn phẩm truyền thông</label>
                                   </div>
                                   <div class=\"checkbox\">
                                       <label><input name=\"lydo\" id=\"lydo\" type=\"checkbox\" value=\"Để chỉnh sửa ảnh\">
                                           Để chỉnh sửa ảnh</label>
                                   </div>
                                   <div class=\"checkbox\">
                                       <label><input name=\"lydo\" id=\"lydo\" type=\"checkbox\" value=\"Để thiết kế website\">
                                           Để thiết kế website</label>
                                   </div>
                                   <label>
                                   Lý do khác <input name=\"lydo\" id=\"lydokhac\" type=\"text\" class=\"form-control\" value=\"\"/>
                                   </label>
                                   
                           </div>

                            <div class=\"form-group\">
                                <label for=\"dogood\" class='cauhoi'>Và,theo bạn chúng mình đã làm tốt điều gì? *</label>
                                <textarea name=\"dogood\" id=\"dogood\" required class=\"form-control\" rows=\"3\"></textarea>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"improve\" class='cauhoi'>Bạn thấy chúng mình nên cải thiện điều gì? *</label>
                                <textarea name=\"improve\" id=\"improve\" required class=\"form-control\" rows=\"3\"></textarea>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"workshop\" class='cauhoi'>Nếu colorME tổ chức workshop, chủ đề bạn mong muốn là gì?
                                    *</label>
                                <textarea name=\"workshop\" id=\"workshop\" required class=\"form-control\"
                                          rows=\"3\"></textarea>
                            </div>

                            <div class=\"form-group\">
                                <label for=\"chiase\" class='cauhoi'>Và còn gì nữa bạn muốn chia sẻ với colorME không ạ? *</label>
                                <textarea name=\"chiase\" id=\"chiase\" required class=\"form-control\" rows=\"3\"
                                          required></textarea>
                            </div>

                            <button type=\"button\" id=\"submit\" class=\"btn btn-default\">Submit</button>
                        </form>
                                ";
                        }
                        ?>


                    </div>
                    <div id="step-2">
                        <form id="uploadbaigiuaki" method="post" action="<?php echo base_url('hocvien/home/nop_baigiuaki') ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="baigiuaki">Upload bài giữa kì - Kích thước tối đa 5 Mb </label>
                                <input name="userfile" id="userfile" required class="form-control" rows="3"
                                       type="file"/>
                            </div>

                            <input type="submit" id="submitBaiGiuaki" name="submit" value="submit"
                                   class="btn btn-default"/>

                        </form>
                        <div id="message-nopbai" class="text-center">
                        <?php
                        if (!empty($linkbaigiuaki)){
                            echo "<div><img src='$linkbaigiuaki' style='width: 75%;'/></div>";
                        }
                        ?>
                        </div>
                    </div>


                </div>
                <!-- End SmartWizard Content -->
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>Liên kết thường dùng </h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <ul class="list-unstyled msg_list">
                    <li>
                        <a href="http://www.freepik.com/index.php?goto=2&searchform=1&k=brand">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span>Mockup Brand Cuối kì</span>

                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="http://issuu.com/colorme5/docs/ebookcolorme">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span> Ebook colorME:</span>

                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.logodesignlove.com/brand-identity-style-guides">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span> Brand Guideline:</span>

                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="http://nobacks.com/">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span> Hình png</span>

                            </span>

                        </a>
                    </li>
                    <li>
                        <a href="http://imgur.com/">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span> Đăng ảnh</span>

                            </span>
                        </a>
                    </li>


                    <li>
                        <a href="http://generator.lorem-ipsum.info/">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span>Dumb Text</span>

                            </span>
                        </a>
                    </li>


                    <li>
                        <a href="http://nobacks.com/">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span> Hình png</span>

                            </span>

                        </a>
                    </li>

                    <li>
                        <a href="http://issuu.com/colorme5/docs/noiquylophoc">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span> Nội quy lớp học:</span>

                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="http://issuu.com/colorme5/docs/colormeqna">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span>Câu hỏi thường gặp:</span>

                            </span>

                        </a>
                    </li>


                    <li>
                        <a href="https://www.youtube.com/channel/UCfdIZQjVEgvN6l18Vtda22A">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span> Kênh Youtube:</span>

                            </span>

                        </a>
                    </li>


                    <li>
                        <a href="https://unsplash.com/">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span> Ảnh đẹp:</span>

                            </span>

                        </a>
                    </li>


                    <li>
                        <a href="https://www.dropbox.com/sh/eimnnuqy22mpr6e/AADc7V8Tljs1cs4Zn0edBhWMa?dl=0">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span> Font chữ Việt Hóa:</span>

                            </span>

                        </a>
                    </li>


                    <li>
                        <a href="https://snorpey.github.io/triangulation/">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span> Triangulation</span>

                            </span>

                        </a>
                    </li>

                    <li>
                        <a href="http://all-free-download.com/photoshop-patterns/">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span>Pattern</span>

                            </span>

                        </a>
                    </li>


                    <li>
                        <a href="https://color.adobe.com/">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span>Adobe Kuler</span>

                            </span>

                        </a>
                    </li>

                    <li>
                        <a href="https://www.pinterest.com">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span>Pinterest</span>

                            </span>

                        </a>
                    </li>

                    <li>
                        <a href="https://www.behance.net">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span>Behance</span>

                            </span>

                        </a>
                    </li>


                    <li>
                        <a href="https://www.dropbox.com/s/y1pbqsdb39omazg/ebookcolorME%20Update%201.pdf?dl=0">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span>Bản mềm Ebook</span>

                            </span>

                        </a>
                    </li>


                    <li>
                        <a href="https://kahoot.it/">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span>Link kiểm tra</span>

                            </span>

                        </a>
                    </li>


                    <li>
                        <a href="http://icons8.com">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span>Icon</span>

                            </span>

                        </a>
                    </li>


                    <li>
                        <a href="https://drive.google.com/folderview?id=0B7kQtQkaHS-_SHVGdFU0MEdWOVE">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span>Retouch Photo</span>

                            </span>

                        </a>
                    </li>


                    <li>
                        <a href="http://bezier.method.ac/">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span>Practice Pentool</span>

                            </span>

                        </a>
                    </li>


                    <li>
                        <a href="http://issuu.com/colorme5/docs/final_project">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span>Yêu cầu Final Project</span>

                            </span>

                        </a>
                    </li>


                    <li>
                        <a href="https://www.facebook.com/media/set/?set=a.978714995529859.1073741852.868843516517008&type=3">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span>Vi dụ về BTCK</span>

                            </span>

                        </a>
                    </li>


                    <li>
                        <a href="https://www.youtube.com/channel/UCbu-Lu9mfKXHpDzLrneJmUg">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span>Luyện tập Blend</span>

                            </span>

                        </a>
                    </li>


                    <li>
                        <a href="https://drive.google.com/file/d/0BwtqXrCS45beNVJPaWpDdjBiUk0/view?usp=sharing">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span>Mockup Final Project</span>

                            </span>

                        </a>
                    </li>

                    <li>
                        <a href="http://www.freepik.com/index.php?goto=2&searchform=1&k=mockup">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span>Mockup</span>

                            </span>

                        </a>
                    </li>


                    <li>
                        <a href="https://drive.google.com/folderview?id=0B4GsgkPORyKKY0RDV0VDSGJqaFU&usp=sharing">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span>CV Template</span>

                            </span>

                        </a>
                    </li>

                    <li>
                        <a href="https://carbonmade.com">
                            <span class="image">
                                <img src="images/logo.jpg" alt="img"/>
                            </span>
                            <span>
                                <span>Portfolio</span>

                            </span>

                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
<!-- form wizard -->
<script type="text/javascript" src="public/template/hocvien/js/wizard/jquery.smartWizard.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        // Smart Wizard
        $('#wizard').smartWizard();

        <?php
        if (!$complete_survey_one) {
            echo "$(\".actionBar .btn-success\").addClass('buttonDisabled')";
        }
        ?>


        function onFinishCallback() {
            $('#wizard').smartWizard('showMessage', 'Finish Clicked');
            //alert('Finish Clicked');
        }
        ;


        $("#submit").click(function () {
            var lydo = $("#lydokhac").val();
            $('#lydo:checked').each(function () {
                if (lydo === '') {
                    lydo = lydo + $(this).val();
                } else {
                    lydo = lydo + ',' + $(this).val();
                }
            });

            var yeutochon = $("#yeutochonkhac").val();
            $('#yeutochon:checked').each(function () {
                if (yeutochon === '')
                    yeutochon = yeutochon + $(this).val();
                else
                    yeutochon = yeutochon + ',' + $(this).val();
            });

            var clb = $("#clb").val();
            var hailong = $("#count-existing").html();
            var noikhac = $("#noikhac").val();
            var dogood = $("#dogood").val();
            var improve = $("#improve").val();
            var workshop = $("#workshop").val();
            var chiase = $("#chiase").val();


// Returns successful data submission message when the entered information is stored in database.
            var dataString = 'clb=' + clb + '&hailong=' + hailong + '&noikhac=' + noikhac
                + '&dogood=' + dogood + '&improve=' + improve + '&lydo=' + lydo + '&yeutochon=' + yeutochon
                + '&workshop=' + workshop + '&chiase=' + chiase + '&studentid=' + '<?php echo $user['id']; ?>';
//            alert(dataString);
            if (clb == '' || hailong == '' || noikhac == '' || dogood == '' || improve == '' || workshop == '' || chiase == '' || lydo == '' || yeutochon == '') {
                alert("Please Fill All Fields");
            } else {
                // AJAX Code To Submit Form.
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('hocvien/home/receive_survey') ?>",
                    data: dataString,
                    cache: false,
                    success: function (result) {
                        $("#step-1").html(result);
                        $(".actionBar .btn-success").removeClass('buttonDisabled');
                    }
                });
            }
            return false;

        });
        $("#uploadbaigiuaki").on('submit', function (e) {
            e.preventDefault();
            $("#message-nopbai").html('<img src="public/resources/images/page-loader.gif"/>');
            $.ajax({
                url: "<?php echo base_url('hocvien/home/nop_baigiuaki') ?>", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false
                success: function (data)   // A function to be called if request succeeds
                {
                    $("#message-nopbai").html(data);
                    setTimeout(function () {
                        $(".alert").fadeOut().empty();
                    }, 3000);
                }
            });
        });

//        $("#submitBaiGiuaki").click(function () {
//
//            var baigiuaki = $("#baigiuaki").val();
//// Returns successful data submission message when the entered information is stored in database.
//            var dataString = 'baigiuaki=' + baigiuaki;
////            alert(dataString);
//            if (baigiuaki == '') {
//                alert("Bạn chưa điền link bài giữa kì");
//            } else {
//                // AJAX Code To Submit Form.
//                $.ajax({
//                    type: "POST",
//                    url: "<?php //echo base_url('hocvien/home/nop_baigiuaki') ?>//",
//                    data: dataString,
//                    cache: false,
//                    success: function (result) {
//                        $("#step-2").append(result);
//                    }
//                });
//            }
//            return false;
//
//        });
    });


</script>


