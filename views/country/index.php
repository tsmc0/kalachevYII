<?php

$_indicatorsPool = "";
$_itemsPool = "";
$i = 0;

foreach($animals as $c){
    $ca = 'Неизвестно';

    foreach ($coun as $cad){
        if (is_null($c['country_id'])) return;
        if ($c['country_id'] == $cad['id']) $ca = $cad['name'];
    }

    if ($i == 0) {
        $_indicatorsPool .= "<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide ".$i."'></button>";
        $_itemsPool .= "<div class='carousel-item active'>
      <img src='img/".$c['img']."' class='d-block w-100' alt='...'>
      <div class='carousel-caption d-none d-md-block'>
        <h5 style = 'color:white;'>".$c['name']."</h5>
        <p style = 'color:whitesmoke;'>".$ca."</p>
      </div>
    </div>";
    } else {
        $_indicatorsPool .= "<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='".$i."' aria-label='Slide ".$i."'></button>";
        $_itemsPool .= "
        <div class='carousel-item'>
      <img src='img/".$c['img']."' class='d-block w-100' alt='...'>
      <div class='carousel-caption d-none d-md-block'>
        <h5 style = 'color:white;'>".$c['name']."</h5>
        <p style = 'color:whitesmoke;'>".$ca."</p>
      </div>
    </div>
        ";
    }

    $i++;

}

echo "<div id='carouselExampleCaptions' class='carousel slide' data-bs-ride='carousel'>
  <div class='carousel-indicators'>
    ".$_indicatorsPool."
  </div>
  <div class='carousel-inner' style = 'max-height: 90vh;'>
    ".$_itemsPool."
  </div>
  <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide='prev'>
    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
    <span class='visually-hidden'>Previous</span>
  </button>
  <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide='next'>
    <span class='carousel-control-next-icon' aria-hidden='true'></span>
    <span class='visually-hidden'>Next</span>
  </button>
</div>";