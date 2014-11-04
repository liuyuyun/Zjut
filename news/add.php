<?php
    global $options;
    foreach($options as $value){
        if(get_settings($value["id"])===FALSE){
            $$value["id"]=$value["std"];
        }else{
            $$value["id"]=get_settings($value["id"]);
        }
    }
?>
<div class="ad">
    <div class="ad_left">
        <div class="slides_container">
            <?php $recentPosts=new WP_Query(); $recentPosts->query("cat=$ev_slide&showposts=$ev_slide_num");?>
            <?php if($recentPosts->have_posts()): while($recentPosts->have_posts()): $recentPosts->the_post();?>
                <div class="slide">
                    <a title="<?php the_title();?>" href="<?php the_permalink();?>"><img alt="<?php the_title();?>" src="<?php bloginfo("template_url");?>/timthumb.php?src=<?php echo catch_that_image();?>&w=360&h=440&zc=1" /></a>
                    <div class="caption"><?php the_title();?></div>
                </div>
            <?php endwhile;?>
            <?php else:?>
            <?php endif;?>
        </div>
    </div>
    <div class="ad_right">
        <?php $recentPosts=new WP_Query(); $recentPosts->query("showposts=1&cat=0");?>
        <?php if($recentPosts->have_posts()): $recentPosts->the_post();?>
            <a title="<?php the_title();?>" href="<?php the_permalink();?>"><img alt="<?php the_title();?>" src="<?php bloginfo("template_url");?>/timthumb.php?src=<?php echo catch_that_image();?>&w=570&h=440&zc=1" /></a>
            <div class="excerpt">
                <h1>今日更新：<a title="<?php the_title();?>" href="<?php the_permalink();?>"><?php the_title();?></a></h1>
                <p><?php echo mb_strimwidth(strip_tags(apply_filters("the_content", $post->post_content)), 0, 240,"...");?></p>
            </div>

        <?php else:?>
        <?php endif;?>
    </div>
</div>
