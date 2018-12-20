<?php
include('template/header.php');

?>


  <!-- NAV -->

  <section class="anim">
    <span class="open" onclick="openNavbar()">&#9776;</span>
    <div id="navbar" class="overlay">
      <a onclick="closeNavbar()" class="close" style="padding:0; float:left; color:white;">&#9932;</a>
      <div class="overlay-content">
        <a onclick="closeNavbar()" href="index.php">Home</a>
        <a onclick="closeNavbar()" href="#portfolio">Portfolio</a>
        <a onclick="closeNavbar()" href="#about">À Propose</a>
        <a onclick="closeNavbar()" href="#about">Contact</a>
      </div>
    </div>
    <div id="disc" class="title"><span>Balen Akoi</span>
      <span>développeur Web</span>
    </div>
    <a href="#portfolio">
      <svg class="arrows">
        <path class="a1" d="M0 0 L30 32 L60 0"></path>
        <path class="a2" d="M0 20 L30 52 L60 20"></path>
        <path class="a3" d="M0 40 L30 72 L60 40"></path>
      </svg>
    </a>
  </section>

  <!-- Portfolio -->
  <div id="cards" style="background:#f7f7f7;">
    <section class="content-section" id="portfolio">
      <div class="container" style="width:100%;">
        <div class="content-section-heading text-center">
          <h2 class="mb-5" style="color:#ff751a;">PORTFOLIO</h2>
        </div>
        <div class="row m-0 pb-4">
        <?php foreach ($productions as $production) { ?>
            
              <div class="col-lg-6 pb-4">
                <a class="portfolio-item" href="<?php echo $production->getLink(); ?>" target="_blank">
                  <span class="caption">
                    <span class="caption-content">
                      <h2><?php echo $production->getName(); ?></h2>
                      <p class="info"><?php echo $production->getDescription(); ?></p>
                    </span>
                  </span>
                  <img class="img-fluid" src="<?php echo $production->getImages(); ?>" alt="coach sportif logo" style="height:324px; width:500px;">
                </a>
              </div>
            
              <?php 
            } ?>
            </div>
        </div>
      </div>
    </section>
  </div>


  <!-- about  -->
  <div class="row stm-font">
    <div class="about col-md-6">
      <h2 id="about" class="mb-5">À PROPOS DE MOI </h2>
      <img class="img-responsive pull-left" src="../assets/img/balen.jpeg" alt="Profile Photo" style="width: 140px; margin: 5px 30px 10px 0;" />
      <p class="about">Hey, je m'appelle Balen, j'ai un diplôme en Mathématiques Scientifiques (Université de
        Sulaimaniyah - Kurdistan Irak).Je suis tombé amoureux du monde de la programmation et je suis actuellement en
        formation intensive en codage. Si vous voulez en savoir plus sur mes œuvres, il suffit de consulter mes
        projets.</p>
      <h2 class=" stm-font compétences">Compétences</h2>
      <p> HTML, CSS, JavaScript, Bootstrap, PHP, SQL</p>
      <a class="buttoncv p-1" href="BALEN.CV.pdf" download="BALEN.CV.pdf">Télécharger mon CV</a>

    </div>
    <div class="cont col-md-6">
      <h2 class="text-center mb-5" id="contact">CONTACT</h2>
      <h4 class="text-center text-white">Si vous souhaitez entrer en contact,laissez votre message. :)</h4>
      <form action="about.php" method="POST">
        <div class="form-group">
          <input class="form-control" type="text" name="name" placeholder="Prenom *" required />
        </div>
        <div class="form-group">
          <input class="form-control" type="text" name="email" placeholder="Email *" required />
        </div>
        <div class="form-group">
          <textarea class="form-control" name="message" placeholder="Message *" required></textarea>
        </div>
        <input class="btn btn-primary pull-right btn-block btn-lg bg-dark" type="submit" value="Envoyer">
      </form>
    </div> <!-- .col-md-6 -->
  </div>
  <!--.row alighn -->

  <!-- FOOTER -->
  <?php
  include('template/footer.php');
  ?>
