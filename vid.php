<?php /* Template Name: videos */ 


get_header(); ?>
<script>
$(function()
{
$("div.vids img").click(function()
{
$video = $(this).attr("data-url");

$("#video_div").empty().html($video);

});
});
</script>
<div style="width: 830px; margin: auto">
<div>
<img src="<?php bloginfo('template_directory'); ?>/images/Headers/Header- Videos.png" />
</div>
<div class="breadcrumps">
<a href="<?php echo get_site_url(); ?>">HOME</a> >  <a href="<?php echo get_site_url(); ?>/videos">Videos</a>

</div>
<div id="video_div" style="text-align: center;margin: auto;display: block">
<?php
query_posts( 'post_type=videos&posts_per_page=1');

while (have_posts()) : the_post();
?>

<?php echo $post->youtube_url;?>

<?php
endwhile;
?>
<BR/>
  <div style="margin: auto;width: 600px">

<?php
query_posts( 'post_type=videos');
 
while (have_posts()) : the_post();

$str = end(explode('embed/', $post->youtube_url));
$result =  substr($str, 0, strpos($str, '"'));
?>
<div class="vids" style="float: left;margin: 20px;">
<img data-url='<?php echo $post->youtube_url;?>' src="http://img.youtube.com/vi/<?php echo $result;?>/1.jpg" />
</div>
<?php
endwhile;


?>
<?php //echo do_shortcode('[Youtube_Channel_Gallery feed="user" user="egzordinary" feedorder="desc" videowidth="500" ratio="16x9" theme="light" color="white" quality="small" autoplay="1" rel="1" showinfo="1" maxitems="9" thumbwidth="90" thumbratio="16x9" thumbcolumns="3" title="1" description="1" thumbnail_alignment="left" descriptionwordsnumber="10" link_window="0"]');



?>

</div>
</div>







<?php get_footer(); ?>
