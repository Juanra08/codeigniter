<?= $this->extend('PublicSection/base_layout')?>

<?= $this->section('title')?>
    Login
<?= $this->endSection()?> 

<?= $this->section('css')?>
<?= $this->endSection()?> 

<?= $this->section('js')?>
<script>
  $('#login').on("submit",function(event){

    event.preventDefault();

    let data = new FormData(this);

    $.ajax({
        url: "<?= route_to('login_ajax') ?>",
            type: "POST",
            data: data,
            processData: false,
            contentType: false, 
            async: true,
            timeout: 100000,
            beforeSend: (xhr) => {},
            success: (response) => {

              $(this).trigger("reset");

              alert("Funciona la peticion");

              console.log(response);
            },
            error:(xhr,status,error) => {
              alert("No va");
            },
            complete: () => {}
    });

  })
</script>

<?= $this->endsection() ?>

<?= $this->section('content')?>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form id="login">
      <input type="text" id="username" class="fadeIn second" name="username" placeholder="username" require>
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password" require>
      <button type="submit" class="fadeIn fourth" >Log In</button>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>

<a href="<?= route_to("home")?>">Ir a publico</a>
<a href="<?= route_to("admin")?>">Ir a privado</a>


<?= $this->endSection()?>