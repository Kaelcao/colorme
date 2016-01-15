<div class="container">
    <div class="row">
        <div class="col s12 m6 push-m3">
            <?php
            foreach ($posts as $post) {
                $date = rebuild_date('l, jS F, Y - H:i:s', strtotime($post['date']));
                ?>
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img src="<?php echo base_url($post['source']) ?>">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><a target="_blank" href="<?php echo $post['facebook'] ?>"><?php echo $post['fullname']; ?></a><i
                                class="material-icons right">more_vert</i></span>
                        <p><?php echo $date ?></p>
<!--                        <p><a href="#">This is a link</a></p>-->
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><?php echo $post['fullname']; ?><i
                                class="material-icons right">close</i></span>
                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

    </div>

</div>