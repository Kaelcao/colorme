<?php
foreach ($bai_tap_hoc_viens as $bai_tap_hoc_vien) {
    ?>
    <div class="x_content">
        <img src="<?php echo base_url($bai_tap_hoc_vien['source']); ?>" style="width:100%"/>
        <h2><?php echo $bai_tap_hoc_vien['fullname'] ?></h2>
        <p>Thời gian nộp: <?php echo $bai_tap_hoc_vien['date'] ?></p>
        <p>Lớp <?php echo $bai_tap_hoc_vien['gen'] . "." . $bai_tap_hoc_vien['name'] ?></p>
    </div>
    <?php
}
?>