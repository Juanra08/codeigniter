<?= $this->extend('PublicSection/base_layout')?>

<?= $this->section('title')?>
    Home
<?= $this->endSection()?> 


<?= $this->section('css')?>
<?= $this->endSection()?> 

<?= $this->section('content')?>

<h1 style="text-align: center;">Festivales</h1>


<div class="container mt-2">
    <h3>Indie</h3>

<!--   <div class="card card-block mb-2">
    <h4 class="card-title">Card 1</h4>
    <p class="card-text">Welcom to bootstrap card styles</p>
    <a href="#" class="btn btn-primary">Submit</a>
  </div>   -->
  <div class="row">
    <div class="col-md-3 col-sm-6">
      <div class="card card-block">
    <img src="https://static.pexels.com/photos/7096/people-woman-coffee-meeting.jpg" alt="Photo of sunset">
        <h5 class="card-title mt-3 mb-3">Sierra Web Development • Owner</h5>
        <p class="card-text">This is a company that builds websites, web apps and e-commerce solutions.</p> 
  </div>
    </div>

    <div class="col-md-3 col-sm-6">
      <div class="card card-block">
    <img src="https://static.pexels.com/photos/7357/startup-photos.jpg" alt="Photo of sunset">
        <h5 class="card-title  mt-3 mb-3">ProVyuh</h5>
        <p class="card-text">This is a company that builds websites, web .</p> 
  </div>
    </div>

    <div class="col-md-3 col-sm-6">
      <div class="card card-block">
    <img src="https://static.pexels.com/photos/262550/pexels-photo-262550.jpeg" alt="Photo of sunset">
        <h5 class="card-title  mt-3 mb-3">ProVyuh</h5>
        <p class="card-text">This is a company that builds websites, web apps and e-commerce solutions.</p> 
  </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="card card-block">
    <img src="https://static.pexels.com/photos/326424/pexels-photo-326424.jpeg" alt="Photo of sunset">
        <h5 class="card-title  mt-3 mb-3">ProVyuh</h5>
        <p class="card-text">This is a company that builds websites, web apps and e-commerce solutions.</p> 
  </div>
    </div>    
  </div>
  
</div>


<div class="container mt-2">
    <h3>Rock</h3>

<!--   <div class="card card-block mb-2">
    <h4 class="card-title">Card 1</h4>
    <p class="card-text">Welcom to bootstrap card styles</p>
    <a href="#" class="btn btn-primary">Submit</a>
  </div>   -->
  <div class="row">
    
   
    <div class="col-md-3 col-sm-6">
      <div class="card card-block">
    <img src="https://static.pexels.com/photos/262550/pexels-photo-262550.jpeg" alt="Photo of sunset">
        <h5 class="card-title  mt-3 mb-3">ProVyuh</h5>
        <p class="card-text">This is a company that builds websites, web apps and e-commerce solutions.</p> 
  </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="card card-block">
    <img src="https://static.pexels.com/photos/326424/pexels-photo-326424.jpeg" alt="Photo of sunset">
        <h5 class="card-title  mt-3 mb-3">ProVyuh</h5>
        <p class="card-text">This is a company that builds websites, web apps and e-commerce solutions.</p> 
  </div>
    </div>    
  </div>
  
</div>

<a href="<?= route_to("login")?>">Cerrar sesion</a>



<?= $this->endSection()?>

