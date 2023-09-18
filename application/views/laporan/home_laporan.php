<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title ?></title>
</head>
<body>
<base href="<?php echo base_url() ?>" />
<!-- center>
  
  <hr />

</center> -->
<style type="text/css">
  .logo{
    width: 90px;
    float: left;
    padding: 20px;
    border: 1px solid black;
    border: 
  }

  .box{
    width: 815px;
    float: left;
    height: 144px;
    text-align: center;
    border: 1px solid black;
  }

  .content{
    text-align: center;
  }

  .a{
    width: auto;
    height: auto;
    float: left;
  }

  .b{
    width: 1090px;
    height: auto;

    }

  table, tr, th, td {
    border-collapse: collapse; /*untuk membuat garis table tipis*/
    
     font-family: Courier;
   
    font-size: 15px;
  }


  th{
    background-color:#A7C942;
    
  }

  th, td{
    padding: 10px;
  }
  
  tr:nth-child(odd){
    background-color:#EAF2D3;
  }

  tr:nth-child(even){
    background-color:#D0DFA5; 
  }

  tr:hover{
    background-color:#ffffff;
    cursor: pointer; 
  }

  .cetak{
    background: green;
    color: white;
  }

  body{
     font-family: Courier;
  }

</style>

<div class="a">
  <div class="logo">
    <img src="assets/img/logo_bnpp.png" width="99px">
  </div>
  <div class="box">
    <h2>
      <b><?php echo $this->config->item('hak_cipta'); ?> <?php echo $this->config->item('kota'); ?></b> <br />
        <?php echo $this->config->item('kecamatan') ?>
    </h2>
      <?php echo $this->config->item('jalan') ?>
  </div>
  <div class="logo">
    <img src="assets/img/logo_bnpp.png" width="99px">
  </div>
</div>
<div class="b">
  <?php $this->load->view($content); ?>
</div>
</body>

</html>