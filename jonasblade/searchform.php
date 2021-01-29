<?php // Search Form ?>

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
  <div class="input-group">
    <input type="text" class="searchfield form-control" placeholder="Search" value="" name="s" id="s" aria-describedby="searchsubmit" />
    <div class="input-group-append">
      <button class="btn btn-solid black" type="submit" id="searchsubmit"><i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
  </div>
</form>