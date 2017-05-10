<?
	$class_navbar = 'navbar-site';
	$prefix_navbar = 'navbar__';

?>
 <nav class="navbar <?=$class_navbar;?>">
 	<div class="container <?=$prefix_navbar;?>container">
 		<div class="row <?=$prefix_navbar;?>row">
 			<div class="cols <?=$prefix_navbar;?>col-header"> 				
				<div class="<?=$prefix_navbar;?>header">
					<div class="row <?=$prefix_navbar;?>row-header ">
						<div class="cols <?=$prefix_navbar;?>col-hamburger">
							<div class="<?=$prefix_navbar;?>hamburger">
								<button class="<?=$prefix_navbar;?>hamburger-btn hamburger hamburger--arrow" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-expanded="false" data-toggle-nav=".navbar-site" data-body="html" data-collapse-nav=".navbar__collapse">
									<span class="hamburger-box">
										<span class="hamburger-inner"></span>
									</span>
								</button>
							</div>
						</div>
						<div class="cols <?=$prefix_navbar;?>col-brand">
							<a class="<?=$prefix_navbar;?>brand" href="/">
								<span class="_logo"><svg class="icon-svg icon-logotip" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#logotip"></use></svg></span>
								<span class="_name"><?=getContact('name');?></span>
								<span class="_phone"><?=getContact('phone1');?></span>
							</a>
						</div>
					</div>
				</div>
 			</div>
 			<div class="cols <?=$prefix_navbar;?>col-collapse">
				<div class="<?=$prefix_navbar;?>collapse" >
					<div class="<?=$prefix_navbar;?>collapse-inner">	
						<ul class="<?=$prefix_navbar;?>nav">		 	
							<li class="<?=$prefix_navbar;?>nav-item">
								<a href="<?=l(1);?>">" class="<?=$prefix_navbar;?>nav-link"><?=nav(1);?></a>
							</li>		 	
							<li class="<?=$prefix_navbar;?>nav-item">
								<a href="<?=l(2);?>">" class="<?=$prefix_navbar;?>nav-link"><?=nav(2);?></a>
							</li>
							<li class="<?=$prefix_navbar;?>nav-item dropdown">
								<a href="#" class="<?=$prefix_navbar;?>nav-link dropdown-toggle" data-toggle="dropdown">
									<span class="_icon"><svg class="icon-svg icon-arrow-down" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#arrow-down"></use></svg></span>
									Каталог товаров</a>
								<ul class="<?=$prefix_navbar;?>dropdown dropdown-menu">
									<li class="<?=$prefix_navbar;?>dropdown-item">
										<a href="<?=l(3);?>">" class="<?=$prefix_navbar;?>dropdown-link"><?=nav(3);?></a>
									</li>
									<li class="<?=$prefix_navbar;?>dropdown-item">
										<a href="<?=l(4);?>">" class="<?=$prefix_navbar;?>dropdown-link"><?=nav(4);?></a>
									</li>
								</ul>
									 	
							<li class="<?=$prefix_navbar;?>nav-item">
								<a href="<?=l(5);?>">" class="<?=$prefix_navbar;?>nav-link"><?=nav(5);?></a>
							</li>	 	
							<li class="<?=$prefix_navbar;?>nav-item">
								<a href="<?=l(6);?>">" class="<?=$prefix_navbar;?>nav-link"><?=nav(6);?></a>
							</li>	 	
							<li class="<?=$prefix_navbar;?>nav-item">
								<a href="<?=l(7);?>">" class="<?=$prefix_navbar;?>nav-link"><?=nav(7);?></a>
							</li>
						</ul>
						<form class="<?=$prefix_navbar;?>form" role="search" action="#">
							<div class="<?=$prefix_navbar;?>form-group">
								<div class="<?=$prefix_navbar;?>form-item">
									<input type="text" class="<?=$prefix_navbar;?>form-control form-control" placeholder="Поиск по сайту">
								</div>
								<span class="<?=$prefix_navbar;?>form-btn-group">
									<button type="submit" class="btn-site <?=$prefix_navbar;?>form-btn _search">
										<span><svg class="icon-svg icon-search" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#search"></use></svg></span>
									</button>
									<button type="reset" class="btn-site <?=$prefix_navbar;?>form-btn _reset">
											<span><svg class="icon-svg icon-cancel" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#cancel"></use></svg></span>
									</button>
								</span>
							</div>
						</form>
					</div>
				</div>
 			</div>
 			<div class="cols <?=$prefix_navbar;?>col-basket">
 				<a href="/basket.html" class="btn-site <?=$prefix_navbar;?>basket"> 
					<span class="_icon"><svg class="icon-svg icon-basket" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#basket"></use></svg></span>
					<span class="_count">4</span>			
 				</a>
 			</div>
 		</div>
 	</div>
</nav>