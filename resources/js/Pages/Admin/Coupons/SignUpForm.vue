<template>
    <body>

<form class="container">
    <div class="row">
        <div class="col-sm-12">
           <!-- <img src="../assets/logo.png"  id="logo">-->
        </div>
    </div>
    <div class="row">
        <h1 id="signup">Sign Up</h1>
    </div>

<div class="row">

    <div class="col-sm-12">
        <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="col-sm-12">
        <label for="firstName" class="form-label">First Name:</label>
    <input type="text" class="form-control" id="firstName" placeholder="Enter Your First Name" name="firstName">
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="col-sm-12">
        <label for="firstName" class="form-label">First Name:</label>
    <input type="text" class="form-control" id="firstName" placeholder="Enter Your First Name" name="firstName">
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="col-sm-12">
        <label for="firstName" class="form-label">First Name:</label>
    <input type="text" class="form-control" id="firstName" placeholder="Enter Your First Name" name="firstName">
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="col-sm-12">
        <label for="firstName" class="form-label">First Name:</label>
    <input type="text" class="form-control" id="firstName" placeholder="Enter Your First Name" name="firstName">
    </div>
</div>
</form>
</body>
</template>

<script>
export default {
  name: 'HelloWorld',
  props: {

  }
}
</script>

<style scoped>
*{
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
#signup
{
    padding:0px ;
}
.container{
    padding: 50px;
    width: 40%;
    box-shadow: 5px 5px 5px 0px black;
    background-color:white;
    border-radius: 25px;

}
label{
    float: left;
}
.row{
padding: 5px;
}
body{
    background-color: #3B646B;

    padding: 20px;
    width: 100%;
    height: 100%;
}
img{
    width: 100px;
    height: 120px;


  }
</style>
