<?= $this->extend('PublicSection/base_layout')?>

<?= $this->section('title')?>
    Login
<?= $this->endSection()?> 

<?= $this->section('css')?>
<?= $this->endSection()?> 

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
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
      <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
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