 <?php 
    	$learning = ot_get_option('start_learning_images');
     ?>
    <section class="learning">
        <div class="container">
            <div class="start_learning">
                <img class="thread pos-rel"
                     src="<?php echo $learning[1]['learning_image']; ?>">
                <img class="learn_img pos-rel"
                     src="<?php echo $learning[0]['learning_image']; ?>">

                <div class="img_group">

                    <img class="dekstop_icon"
                         src="<?php echo $learning[2]['learning_image']; ?>">
                    <div class="bees ">
                        <img class="sub1 wow pulse"
                             src="<?php echo $learning[3]['learning_image']; ?>">
                    </div>
                    <div class="bees">
                        <img class="sub2 wow pulse"
                             src="<?php echo $learning[4]['learning_image']; ?>">
                    </div>
                    <div class="bees">
                        <img class="sub3 wow pulse"
                             src="<?php echo $learning[5]['learning_image']; ?>">
                    </div>
                    <div class="bees">
                        <img class="sub4 wow pulse"
                             src="<?php echo $learning[6]['learning_image']; ?>">
                    </div>
                    <div class="bees">
                        <img class="sub5 wow pulse"
                             src="<?php echo $learning[7]['learning_image']; ?>">
                    </div>
                    <div class="bees">
                        <img class="sub6 wow pulse"
                             src="<?php echo $learning[8]['learning_image']; ?>">
                    </div>
                </div>
            </div>
            <h2>Maths, Science, Computers, History, Art, Ecomnomics </h2>
            <p>and more online classes</p>
            <a href="<?php echo site_url(); ?>/?s" class="btn learn">Start Learning Now</a>
        </div>
    </section>