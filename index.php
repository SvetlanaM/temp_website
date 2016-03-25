<?php
  defined( '_JEXEC' ) or die;
  // variables
  $app = JFactory::getApplication();
  $menu = $app->getMenu();
	JHtml::_('behavior.modal');
  $doc = JFactory::getDocument();
  $params = &$app->getParams();
  $pageclass = $params->get('pageclass_sfx');
  $tpath = $this->baseurl.'/templates/'.$this->template;

  $this->setGenerator(null);

  // load sheets and scripts
  $doc->addStyleSheet($tpath.'/css/template.css.php?v=1.0.0');
  $doc->addScript($tpath.'/js/modernizr.js'); // <- this script must be in the head

  unset($doc->_scripts[$this->baseurl.'/media/system/js/core.js']);
?>

<!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->
  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->
    <head>



      <jdoc:include type="head" />
        <script type="text/javascript" src="<?php echo $tpath.'/js/template.js.php'; ?>"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" /> <!-- mobile viewport -->
      	<link rel="stylesheet" href="../templates/greycircle/css/reset.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $tpath; ?>/css/template.css.php?v=1.0.0" type="text/css" >


        <link rel="shortcut icon" href="" sizes="16x16"/>
      <link rel="stylesheet" href="../templates/greycircle/css/sveta.css" >
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


        <!--[if lte IE 8]>
          <style>
            {behavior:url(<?php echo $tpath; ?>/js/PIE.htc);}
          </style>
        <![endif]-->

      <script>
      jQuery(document).ready(function(){
        jQuery( "<div class='i-i'><img src='https://trello-attachments.s3.amazonaws.com/54b8ff42b5f46a60ad33f838/37x37/30d2bd1c88b1d698971f15303b9e8aad/user-icon.png' /></div>" ).insertBefore( ".input-small" );

        jQuery( "<div class='i-p'><img src='https://trello-attachments.s3.amazonaws.com/54b8ff42b5f46a60ad33f838/31x38/6fd3c44e5b4b4b81d1b5b4e113b64612/lock-icon.png' /></div>" ).insertBefore( "input[type='password']" );

        jQuery( "<div class='i-form1'><img src='https://trello-attachments.s3.amazonaws.com/54b8ff42b5f46a60ad33f838/37x37/30d2bd1c88b1d698971f15303b9e8aad/user-icon.png'/></div>" ).insertBefore( "input#1" );

        jQuery( "<div class='i-form2'><img src='https://trello-attachments.s3.amazonaws.com/54b8ff42b5f46a60ad33f838/37x29/1887a56e3f27b6a39f20ac489a29f0bb/email-icon.png'/></div>" ).insertBefore( ".controls .row-fluid .email" );

        jQuery( "<div class='i-form3'><img src='https://trello-attachments.s3.amazonaws.com/54b8ff42b5f46a60ad33f838/31x28/787dbe05eb9de99833ab8accff1b9bcc/message-icon.png'/></div>" ).insertBefore( "textarea#4" );
      });

      </script>
    </head>

    <body class="base">


      <!-- START -->
      <div id="overall">

        <!-- START HEADER 1 - kontaktne udaje -->


        <!-- START BODY -->
        <div id="main">
          <div class="inmain">
            <jdoc:include type="message" />
			<div class="header-wraper">
          <div class="container">
            <!-- brané z templatedetails dle position -->
            <jdoc:include type="modules" name="header" />
            <ul class="list-inline pull-right header-kontakt">
              <li class="mail">
                <?php $article = JControllerLegacy::getInstance('Content')->getModel('Article')->getItem(10); echo $article->introtext; ?>
              </li> <!--mění se getitem(10) - číslice je ID článku v Joomla-->
              <li class="mobil">
                <?php $article = JControllerLegacy::getInstance('Content')->getModel('Article')->getItem(11); echo $article->introtext; ?>
              </li>
            </ul>
          </div>
        </div>
        <!-- ./ END HEADER 1 -->

        <!-- START MENU - odklad: class="header navbar-fixed-top"-->
        <header id="header" >
          <div class="container ">




            <nav class="main-nav" role="navigation">

              <div class="navbar-header text-center">
                <a href="/"><img src="/images/logo-GC.png" alt="Grey Circle" class="hidden-lg hidden-md" style="width: 90px"></a>   <!--nahrazení obrazového loga ze středu a přesun na kraj-->
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                  <span class="icon-bar-wrapper">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </span><!--//icon-bar-wrapper-->
                </button><!--//nav-toggle-->
              </div><!--//navbar-header-->

              <div id="navbar-collapse" class="navbar-collapse collapse  text-center">
                <?php
					$user =& JFactory::getUser();
					if ($user->id) {
                      echo '<jdoc:include type="modules" name="menu" /><br />';
                      $user->username;

  					  echo '<jdoc:include type="modules" name="menu-user" /> ';
                      echo '<div class="username">' . $user->username . '</div>';
                      $userToken = JSession::getFormToken();
                      echo '<div><a href="index.php?option=com_users&task=user.logout&' . $userToken . '=1" class="logout">Odhlásit</a></div>';
                    }
					else {

                      echo '<nav class="left-menu">
                      			<div class="menu-box">
                      			<jdoc:include type="modules" name="menu" />
                                </div>
                           <!--obsah modálního okna-->     <div id="leftcolumn"><div class="logo-b"><img src="https://trello-attachments.s3.amazonaws.com/5585ac604e4d95cb6a64c0a7/96x84/2cfc7267f5564cc3c39bea8607bc3815/logo.png" class="logo-i" /></div><jdoc:include type="modules" name="login" /></div>
                           <!--otevření modálního okna-->     <a href="#leftcolumn" class="modal modaltest">Pro akcionáře</a>


                            </nav>
                        ';
					}
				?>
              </div>    <!-- zobrazení jména uživatele -->

            </nav><!--//main-nav-->
          </div><!--//container-->
        </header>

        <!-- END MENU -->

            <!-- START SLIDER -->
            <div class="slider">
              <div class="container-fluid">
                <div class="row row-slider">
                  <jdoc:include type="modules" name="slider" />

                  <!--name se bere podle struktury v templateDetails.xml-->
                </div>
              </div>
            </div>
            <!-- END SLIDER -->

            <!-- START CONTENT -->
            <?php
              $app = JFactory::getApplication();
              $menu = $app->getMenu();
              if ($menu->getActive() == $menu->getDefault()) {
                echo '

                <div id="company-wraper">
                  <div class="container">
                    <div class="row">
                      <div class="col-xs-12 col-md-5 col-lg-5">
                        <jdoc:include type="modules" name="firma" />
                      </div>

                      <div class="col-xs-12 col-md-5 col-lg-5 col-md-offset-1 col-lg-offset-1 certifikat">
                        <jdoc:include type="modules" name="certifikat" />
                      </div>
                    </div>
                  </div>
                </div>

                <div class="banner-wraper">
                  <div class="container">
                    <div class="row banner text-center">
                      <div class="col-xs-6 col-md-6 col-lg-6 col-xs-offset-1 col-md-offset-1 col-lg-offset-1">
                        <jdoc:include type="modules" name="banner-logo" />
                      </div>

                      <div class="col-xs-4 col-md-4 col-lg-4 col-md-offset-1 col-xs-offset- 1 col-lg-offset-1 text-left banner-url">
                        <jdoc:include type="modules" name="banner" />
                      </div>
                    </div>
                  </div>
                </div>

                <div class="video-wraper" id="videa">
                  <div class="container">
                    <div class="row">
                      <div class="col-xs-12 col-md-12 col-lg-12">
                        <jdoc:include type="modules" name="video" />
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-12 col-md-4 col-lg-4 video1">
                        <jdoc:include type="modules" name="video1" />
                      </div>
                      <div class="col-xs-12 col-md-4 col-lg-4 video2">
                        <jdoc:include type="modules" name="video2" />
                      </div>
                      <div class="col-xs-12 col-md-4 col-lg-4 video3">
                        <jdoc:include type="modules" name="video3" />
                      </div>
                    </div>
                  </div>
                </div>

               ';

              } else {
                echo '

                  <div class="container zpravy">
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 info-uvod">
                        <jdoc:include type="modules" name="uvod" />
                      </div>
                      <div class="col-xs-12 col-sm-12 info-obsah">
                        <jdoc:include type="modules" name="clanky" />
                      </div>
                    </div>
                  </div>
                  ';
              }
            ?>
          </div>
          <!-- END MAIN -->
        </div>
        <!-- END INMAIN -->

        <!-- START FOOTER -->
        <div id="footer">
          <div class="infooter">
            <div class="footer-wraper">
              <div class="container footer-top">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="row">
                      <div class="col-xs-12 col-md-12 col-lg-12">
                        <h3 class="kontakt-header">Kontakt a kontaktní formulář</h3>
                      </div>
                    </div>

                    <div class="row footer-box">
                      <div class="col-sm-4 col-xs-12 col-md-3 col-lg-2">
                        <jdoc:include type="modules" name="kontakt" />
                      </div>
                      <div class="col-sm-8 col-xs-8 col-md-3 col-lg-2">
                        <jdoc:include type="modules" name="telefon" />
                      </div>
                      <div class="col-sm-12 col-xs-12 col-md-5 col-lg-4 col-md-offset-1 col-lg-offset-4 fakturace">
                        <jdoc:include type="modules" name="fakturace" />
                      </div>
                    </div>
                  </div>
                </div>

                <section id="kontakt-form">
                  <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 ">
                      <jdoc:include type="modules" name="formular" />
                    </div>
                  </div>
                </section>

                <div class="bottom-footer-wrapper">
                  <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                      <jdoc:include type="modules" name="footer" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END FOOTER -->
      </div>
      <!-- END WEB -->



    </body>
  </html>
