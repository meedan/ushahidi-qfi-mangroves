<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<title><?php echo $site_name; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel="stylesheet" type="text/css">
	<?php echo $header_block; ?>
		<?php
	// Action::header_scripts - Additional Inline Scripts from Plugins
	Event::run('ushahidi_action.header_scripts');
	?>

	<link href='http://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>
</head>


<?php
  // Add a class to the body tag according to the page URI
  // we're on the home page
  if (count($uri_segments) == 0)
  {
    $body_class = "page-main";
  }
  // 1st tier pages
  elseif (count($uri_segments) == 1)
  {
    $body_class = "page-".$uri_segments[0];
  }
  // 2nd tier pages... ie "/reports/submit"
  elseif (count($uri_segments) >= 2)
  {
    $body_class = "page-".$uri_segments[0]."-".$uri_segments[1];
  };

?>

<body id="page" class="<?php echo $body_class; ?>" />

<?php echo $header_nav; ?>

  <!-- 
  <div id="top-bar">

			<?php echo $languages;?>

			<?php echo $search; ?>

    </div>
  </div>
  -->

	<!-- wrapper -->
	<div class="rapidxwpr floatholder">

		<!-- header -->
		<div id="header">

			<!-- logo -->
			<?php if($banner == NULL){ ?>
			<div id="logo">
				<h1><a href="<?php echo url::site();?>"><?php echo $site_name; ?></a></h1>
				<span><?php echo $site_tagline; ?></span>
			</div>
			<?php }else{ ?>
			<a href="<?php echo url::site();?>"><img src="<?php echo $banner; ?>" alt="<?php echo $site_name; ?>" /></a>
			<?php } ?>
			<!-- / logo -->

			<!-- submit incident -->
			<?php echo $submit_btn; ?>
			<!-- / submit incident -->
				<div class="welcome-logos"><a href="http://qfi.org"><img src="/themes/mangroves/images/qfi-header.png" style="padding-right:10px;" alt="Qatar Foundation International"></a><a href="http://www.conservation.org/"><img src="/themes/mangroves/images/ci-header.png" alt="Conservation International"></a></div>

		</div>
		<!-- / header -->
         <!-- / header item for plugins -->
        <?php
            // Action::header_item - Additional items to be added by plugins
	        Event::run('ushahidi_action.header_item');
        ?>
		<!-- main body -->
		<div id="middle">
			<div class="background layoutleft">
				<div class="welcome-message"> Mapping the Mangroves is a project focused on increasing awareness, promoting conversations, and fostering actions around preservation of the world's mangroves.</div>
				<!-- mainmenu -->
				<div id="mainmenu" class="clearingfix">
					<ul>
						<?php nav::main_tabs($this_page); ?>
					</ul>

				</div>
				<!-- / mainmenu -->
